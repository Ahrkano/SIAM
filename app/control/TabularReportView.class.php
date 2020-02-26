<?php
    /**
     * Tabular report View
     *
     * @version    1.0
     * @package    siam
     * @subpackage tutor
     * @author     Alexandre Pontes
     */
    class TabularReportView extends TPage
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
            $this->form = new BootstrapFormBuilder('form_Customer_report');
            $this->form->setFormTitle('Resultados');
            
            // create the form fields
            
            $city_name  = new TDBCombo('tb_data_tb_city_id', 'siam', 'tb_city', 'tb_city_id', 'tb_city_name');
            $year         = new TEntry('year');
            $output_type  = new TRadioGroup('output_type');
            
            $this->form->addFields( [new TLabel('Município')], [$city_name] );
            $this->form->addFields( [new TLabel('Ano')],     [$year] );
            $this->form->addFields( [new TLabel('Saída')],   [$output_type] );
            
            // define field properties
            $year->setSize( '80%' );
            $city_name->setSize( '80%' );
            $output_type->setUseButton();
            $year->setMinLength(1);
            $options = ['html' =>'HTML', 'pdf' =>'PDF', 'rtf' =>'RTF', 'xls' =>'XLS'];
            $output_type->addItems($options);
            $output_type->setValue('pdf');
            $output_type->setLayout('horizontal');
            
            $this->form->addAction( 'Generate', new TAction(array($this, 'onGenerate')), 'fa:download blue');
            
            // wrap the page content using vertical box
            $vbox = new TVBox;
            $vbox->style = 'width: 100%';
            $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
            $vbox->add($this->form);
            
            parent::add($vbox);
        }
        /**
         * method onGenerate()
         * Executed whenever the user clicks at the generate button
         */
        function onGenerate()
        {
            try
            {
                // open a transaction with database 'samples'
                TTransaction::open('siam');
                
                // get the form data into
                $data = $this->form->getData();
                
                $repository = new TRepository('TB_data');
                $criteria   = new TCriteria;
                $name       = new TEntry('name');

                if ($data->name)
                {
                    $criteria->add(new TFilter('city_name', '=', $data->name));
                }
               
                $customers = $repository->load($criteria);
                $format  = $data->output_type;
                
                if ($customers)
                {
                    $widths = array(40, 200, 120, 80, 80, 80);
                    
                    switch ($format)
                    {
                        case 'html':
                            $table = new TTableWriterHTML($widths);
                            break;
                        case 'pdf':
                            $table = new TTableWriterPDF($widths);
                            break;
                        case 'rtf':
                            $table = new TTableWriterRTF($widths);
                            break;
                        case 'xls':
                            $table = new TTableWriterXLS($widths);
                            break;
                    }
                    
                    if (!empty($table))
                    {
                        // create the document styles
                        $table->addStyle('header', 'Helvetica', '16', 'B', '#ffffff', '#4B5D8E');
                        $table->addStyle('title',  'Helvetica', '10', 'B', '#ffffff', '#617FC3');
                        $table->addStyle('datap',  'Helvetica', '10', '',  '#000000', '#E3E3E3', 'LR');
                        $table->addStyle('datai',  'Helvetica', '10', '',  '#000000', '#ffffff', 'LR');
                        $table->addStyle('footer', 'Helvetica', '10', '',  '#2B2B2B', '#B4CAFF');
                        
                        $table->setHeaderCallback( function($table) {
                            $table->addRow();
                            $table->addCell('Sales by customer', 'center', 'header', 6);
                            
                            $table->addRow();
                            $table->addCell('Code',      'center', 'title');
                            $table->addCell('Município',      'left',   'title');
                            $table->addCell('População',     'left',   'title');
                            $table->addCell('Nasc.vivos', 'center', 'title');
                        });
                        
                        $table->setFooterCallback( function($table) {
                            $table->addRow();
                            $table->addCell(date('Y-m-d h:i:s'), 'center', 'footer', 6);
                        });
                        
                        // controls the background filling
                        $colour= FALSE;
                        
                        // data rows
                        foreach ($customers as $customer)
                        {
                            $style = $colour ? 'datap' : 'datai';
                            $table->addRow();
                            $table->addCell($customer->tb_data_id,             'center', $style);
                            $table->addCell($customer->tb_city->tb_city_name,           'left',   $style);
                            $table->addCell($customer->tb_data_pop,          'left',   $style);
                            $table->addCell($customer->tb_data_born,      'center', $style);
                            
                            $colour = !$colour;
                        }
                        
                        $output = "app/output/tabular.{$format}";
                        
                        // stores the file
                        if (!file_exists($output) OR is_writable($output))
                        {
                            $table->save($output);
                            parent::openFile($output);
                        }
                        else
                        {
                            throw new Exception(_t('Permission denied') . ': ' . $output);
                        }
                        
                        // shows the success message
                        new TMessage('info', 'Report generated. Please, enable popups in the browser.');
                    }
                }
                else
                {
                    new TMessage('error', 'No records found');
                }
        
                // fill the form with the active record data
                $this->form->setData($data);
                
                // close the transaction
                TTransaction::close();
            }
            catch (Exception $e) // in case of exception
            {
                new TMessage('error', $e->getMessage());
                TTransaction::rollback();
            }
        }
    }

