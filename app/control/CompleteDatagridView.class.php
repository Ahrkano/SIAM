<?php
    /**
     * CompleteDataGridView Listing
     *
     * @version    1.0
     * @package    siam
     * @author     Alexandre Pontes

     */
    class CompleteDataGridView extends TPage
{
    private $form, $datagrid, $pageNavigation, $loaded;
    
    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_search_City');
        $this->form->setFormTitle('Visualização');
        
        $name         = new TEntry('name');
        $this->form->addFields( [new TLabel('Busca:')], [$name] );   
        
        
        $this->form->addAction('Buscar', new TAction([$this, 'onSearch']), 'fa:search blue');
        $this->form->addActionLink('Novo',  new TAction(['PopulationFormView', 'onClear']), 'fa:plus-circle green');

        // keep the form filled with the search data
        $name->setValue( TSession::getValue( 'City_name' ) );
        
        // creates a DataGrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        $this->datagrid->width = '100%';
        
        // creates the datagrid columns
        $col_id     = new TDataGridColumn('tb_data_id', 'Id', 'right', '10%');
        $col_year   = new TDataGridColumn('tb_data_year', 'Ano', 'center', '30%');
        $col_city   = new TDataGridColumn('tb_city->tb_city_name', 'Região', 'center', '30%');
        $col_pop    = new TDataGridColumn('tb_data_pop', 'População', 'center', '60%');
        $col_born   = new TDataGridColumn('tb_data_born', 'Nascidos vivos', 'center', '30%');
        
        // assign the ordering actions
        $col_id->setAction(new TAction([$this, 'onReload']), ['order' => 'tb_data_id']);
        $col_year->setAction(new TAction([$this, 'onReload']), ['order' => 'tb_data_year']);

        // add the columns to the DataGrid
        $this->datagrid->addColumn($col_id);
        $this->datagrid->addColumn($col_city);
        $this->datagrid->addColumn($col_year);
        $this->datagrid->addColumn($col_pop);
        $this->datagrid->addColumn($col_born);
        
        $action1 = new TDataGridAction(['PopulationFormView', 'onEdit'],   ['key' => '{tb_data_id}'] );
        $action2 = new TDataGridAction([$this, 'onDelete'],   ['key' => '{tb_data_id}'] );
        
        $this->datagrid->addAction($action1, 'Editar',   'far:edit blue');
        $this->datagrid->addAction($action2, 'Deletar', 'far:trash-alt red');
        
        // create the datagrid model
        $this->datagrid->createModel();
        
        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->setAction(new TAction([$this, 'onReload']));
        
        // creates the page structure using a table
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__ ));
        $vbox->add($this->form); // add a row to the form
        $vbox->add(TPanelGroup::pack('', $this->datagrid, $this->pageNavigation)); // add a row for page navigation
        
        // add the table inside the page
        parent::add($vbox);
    }
    
    /**
     * method onSearch()
     * Register the filter in the session when the user performs a search
     */
    function onSearch()
    {
        // get the search form data
        $data = $this->form->getData();

        TSession::setValue('City_filter', NULL);
        
        // check if the user has filled the form
        if (isset($data->name))
        {
            // creates a filter using what the user has typed
            //$filter = new TFilter('tb_data_tb_city_id->tb_city_name', 'like', "%{$data->name}%");
            $filter = new TFilter('(SELECT tb_city_name from tb_city WHERE tb_city_id=tb_data_tb_city_id)', 'like', "%{$data->name}%");
            
            // stores the filter in the session
            TSession::setValue('City_filter', $filter);
            TSession::setValue('City_name',   $data->name);
            
            // fill the form with data again
            $this->form->setData($data);
        }
        
        $param = array();
        $param['offset']    =0;
        $param['first_page']=1;
        $this->onReload($param);
    }
    
    /**
     * method onReload()
     * Load the datagrid with the database objects
     */
    function onReload($param = NULL)
    {
        try
        {
            // open a transaction with database 'siam'

            TTransaction::open('siam');
            
            // creates a repository for TB_data
            $repository = new TRepository('TB_data');
            $limit = 10;
            
            // creates a criteria
            $criteria = new TCriteria;
            
            // default order
            if (empty($param['order']))
            {
                $param['order'] = 'tb_data_id';
                $param['direction'] = 'asc';
            }
            
            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $limit);
            
            if (TSession::getValue('City_filter'))
            {
                // add the filter stored in the session to the criteria
                $criteria->add(TSession::getValue('City_filter'));
            }
            
            // load the objects according to criteria
            $objects = $repository->load($criteria);
            
            $this->datagrid->clear();
            if ($objects)
            {
                // iterate the collection of active records
                foreach ($objects as $object)
                {
                    // add the object inside the datagrid
                    $this->datagrid->addItem($object);
                }
            }
            
            // reset the criteria for record count
            $criteria->resetProperties();
            $count = $repository->count($criteria);
            
            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($limit); // limit
            
            // close the transaction
            TTransaction::close();
            $this->loaded = true;
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * Ask before deletion
     */
    public static function onDelete($param)
    {
        // define the delete action
        $action = new TAction(array(__CLASS__, 'Delete'));
        $action->setParameters($param); // pass the key parameter ahead
        
        // shows a dialog to the user
        new TQuestion(AdiantiCoreTranslator::translate('Do you really want to delete ?'), $action);
    }
    
    /**
     * Delete a record
     */
    public static function Delete($param)
    {
        try
        {
            $key=$param['key']; // get the parameter $key
            TTransaction::open('siam'); // open a transaction with database
            $object = new TB_data($key, FALSE); // instantiates the Active Record
            $object->delete(); // deletes the object from the database
            TTransaction::close(); // close the transaction
            
            $pos_action = new TAction([__CLASS__, 'onReload']);
            new TMessage('info', AdiantiCoreTranslator::translate('Record deleted'), $pos_action); // success message
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * method show()
     * Shows the page
     */
    function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded)
        {
            $this->onReload( func_get_arg(0) );
        }
        parent::show();
    }
}

