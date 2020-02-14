<?php
/**
 * PopulationFormView Registration
 *
 * @version    1.0
 * @package    siam
 * @author     Alexandre
 */
class PopulationFormView extends TPage
{
    private $form; // form
    
    /**
     * Class constructor
     * Creates the page and the registration form
     */
    function __construct()
    {
        parent::__construct();
        
        // creates the form
        $this->form = new BootstrapFormBuilder('form_data');
        $this->form->setClientValidation(true);
        $this->form->setFormTitle(_t('Registro'));
        
        // create the form fields
        $id             = new TEntry('tb_data_id');
        $population     = new TEntry('tb_data_pop');
        $prev_born      = new TEntry('tb_data_born');
        $year           = new TEntry('tb_data_year');
        $tb_data_tb_set_id = new TDBCombo('tb_data_tb_set_id', 'siam', 'tb_set', 'tb_set_id', 'tb_set_name');
        $id->setEditable(FALSE);
        
        // add the form fields
        $this->form->addFields( [new TLabel('ID')],    [$id] );
        $this->form->addFields( [new TLabel('População', 'red')],  [$population] );
        $this->form->addFields( [new TLabel('Nascidos vivos', 'red')],  [$prev_born] );
        $this->form->addFields( [new TLabel('Ano', 'red')], [$year] );
        $this->form->addFields( [new TLabel('Município', 'red')], [$tb_data_tb_set_id] );
        
        $population->addValidation('População', new TRequiredValidator);
        $tb_data_tb_set_id->addValidation('Município', new TRequiredValidator);
        
        // define the form action
        $this->form->addAction('Save', new TAction([$this, 'onSave']), 'fa:save green');
        $this->form->addActionLink('Clear',  new TAction([$this, 'onClear']), 'fa:eraser red');
        $this->form->addActionLink('Listing',  new TAction(['CompleteDataGridView', 'onReload']), 'fa:table blue');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($this->form);

        parent::add($vbox);
    }

    /**
     * method onSave()
     * Executed whenever the user clicks at the save button
     */
    function onSave()
    {
        try
        {
            // open a transaction with database 'siam'
            TTransaction::open('siam');
            
            $this->form->validate(); // run form validation
            
            $data = $this->form->getData(); // get form data as array
            
            $object = new TB_data;  // create an empty object
            $object->fromArray( (array) $data); // load the object with data
            $object->store(); // save the object
            
            // fill the form with the active record data
            $this->form->setData($object);
            
            TTransaction::close();  // close the transaction
            
            // shows the success message
            new TMessage('info', 'Record saved');
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }
    
    /**
     * Clear form
     */
    public function onClear()
    {
        $this->form->clear( TRUE );
    }
    
    /**
     * method onEdit()
     * Executed whenever the user clicks at the edit button da datagrid
     */
    function onEdit($param)
    {
        try
        {
            if (isset($param['id']))
            {
                $key = $param['id'];  // get the parameter
                TTransaction::open('siam');   // open a transaction with database 'samples'
                $object = new TB_data($key);        // instantiates object City
                $this->form->setData($object);   // fill the form with the active record data
                TTransaction::close();           // close the transaction
            }
            else
            {
                $this->form->clear( true );
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }
}