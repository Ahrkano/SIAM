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
        $this->form->setFormTitle('Registro de Dados');
        
        // create the form fields
        $id                 = new TEntry('tb_data_id');
        $population         = new TEntry('tb_data_pop');
        $prev_born          = new TEntry('tb_data_born');
        $year               = new TEntry('tb_data_year');
        $tb_data_tb_city_id = new TDBCombo('tb_data_tb_city_id', 'siam', 'tb_city', 'tb_city_id', 'tb_city_name');
        $hep_vulne          = new TEntry('tb_data_hep_vulne');
        $hepB_sem           = new TEntry('tb_data_hepB_sem');
        $hepB_com           = new TEntry('tb_data_hepB_com');
        $hepC_pop           = new TEntry('tb_data_hepC_pop');
        $hepC_sem           = new TEntry('tb_data_hepC_sem');
        $hepC_com           = new TEntry('tb_data_hepC_com');
        $hans_pop           = new TEntry('tb_data_hans_pop');
        $hans_pauci         = new TEntry('tb_data_hans_pauci');
        $hans_multi         = new TEntry('tb_data_hans_multi');
        $hans_prev          = new TEntry('tb_data_hans_prev');
        $id->setEditable(FALSE);

        // add the form fields
        $this->form->addFields( [new TLabel('ID')],    [$id] );
        $this->form->addFields( [new TLabel('População', 'blue')],  [$population] );
        $this->form->addFields( [new TLabel('Nascidos vivos no ano anterior', 'blue')],  [$prev_born] );
        $this->form->addFields( [new TLabel('Ano', 'blue')], [$year] );
        $this->form->addFields( [new TLabel('Área', 'blue')], [$tb_data_tb_city_id] );
        $this->form->addFields( [new TLabel('Pessoas Vulneráveis (Hepatite viral)', 'red')], [$hep_vulne] );
        $this->form->addFields( [new TLabel('Portadores de Hepatite B crônica sem cirrose', 'red')], [$hepB_sem] );
        $this->form->addFields( [new TLabel('Portadores de Hepatite B crônica com cirrose', 'red')], [$hepB_com] );
        $this->form->addFields( [new TLabel('Portadores de Hepatite C', 'red')], [$hepC_pop] );
        $this->form->addFields( [new TLabel('Portadores de Hepatite C crônica sem cirrose', 'red')], [$hepC_sem] );
        $this->form->addFields( [new TLabel('Portadores de Hepatite C crônica com cirrose', 'red')], [$hepC_com] );
        $this->form->addFields( [new TLabel('Casos de Hanseníase', 'red')], [$hans_pop] );
        $this->form->addFields( [new TLabel('Casos de Hanseníase (Paucibacilares)', 'red')], [$hans_pauci] );
        $this->form->addFields( [new TLabel('Casos de Hanseníase (Multibacilares)', 'red')], [$hans_multi] );
        $this->form->addFields( [new TLabel('Casos de Hanseníase (Prevalência)', 'red')], [$hans_prev ] );
        
        $population->addValidation('População', new TRequiredValidator);
        $tb_data_tb_city_id->addValidation('Município', new TRequiredValidator);
        
        // define the form action
        $this->form->addAction('Salvar', new TAction([$this, 'onSave']), 'fa:save green');
        $this->form->addActionLink('Limpar',  new TAction([$this, 'onClear']), 'fa:eraser red');
        $this->form->addActionLink('Listar',  new TAction(['CompleteDataGridView', 'onReload']), 'fa:table blue');
        
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
            if (isset($param['tb_data_id']))
            {
                $key = $param['tb_data_id'];  // get the parameter
                TTransaction::open('siam');   // open a transaction with database 'siam'
                $object = new TB_data($key);        // instantiates object TB_data
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