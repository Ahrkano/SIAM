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
            $this->form->setFormTitle('Resultados Ambulatoriais');
            
            // create the form fields
            
            $city_name    = new TDBCombo('tb_data_tb_city_id', 'siam', 'tb_city', 'tb_city_id', 'tb_city_name');
            $year         = new TEntry('year');
            $output_type  = new TRadioGroup('output_type');
            $city_name->enableSearch();

            $this->form->addFields( [new TLabel('Região')], [$city_name] );
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
            
            $this->form->addAction( 'Gerar dados', new TAction(array($this, 'onGenerate')), 'fa:download blue');
            
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

                if ($data->year)
                {
                    $criteria->add(new TFilter('tb_data_year', 'like', $data->year));
                    //$criteria2->add(new TFilter('(SELECT tb_city_name from tb_city WHERE tb_city_id=tb_data_tb_city_id)', 'like', "%{$data->name}%"));
                }

                $data_objs = $repository->load($criteria);
                $format  = $data->output_type;
                
                if ($data_objs)
                {
                     $widths = array(80,40, 190, 120, 190);

                    switch ($format)
                    {
                        case 'html':
                            $table   = new TTableWriterHTML($widths);
                            break;
                        case 'pdf':
                            $table   = new TTableWriterPDF($widths);
                            break;
                        case 'rtf':
                            $table   = new TTableWriterRTF($widths);
                            break;
                        case 'xls':
                            $table   = new TTableWriterXLS($widths);
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

                        $table->addStyle('div',    'Helvetica', '12', 'B', '#ffffff', '#4B5D8E');
                        $table->addStyle('sub',    'Helvetica', '10', 'B', '#ffffff', '#373B45');
                        $table->addStyle('value',  'Helvetica', '10', 'B', '#ffffff', '#617FC3');

                        $table->setHeaderCallback( function($table) {
                            $table->addRow();
                            $table->addCell('Resultados Ambulatoriais', 'center', 'header', 5);
                            $table->addRow();
                        });
                        
        
                        $table->setFooterCallback( function($table) {
                            $table->addRow();
                            $table->addCell(date('Y-m-d h:i:s'), 'center', 'footer', 5);
                        });
                        
                        // controls the background filling
                        $colour= FALSE;

                        // add region info
                        $table->addRow();
                        $table->addCell('Cod.',         'center',   'title');
                        $table->addCell('Ano',       'center',   'title');
                        $table->addCell('Região',       'center',   'title');
                        $table->addCell('População',    'center',   'title');
                        $table->addCell('Nasc.vivos (ano anterior)',   'center',   'title');
                        
                        // data rows
                        
                        foreach ($data_objs as $data_obj)
                        {
                            // load params
                            $formula = new Formula($data_obj->tb_data_pop, $data_obj->tb_data_born);

                            $style = $colour ? 'datap' : 'datai';
                            $table->addRow();
                            $table->addCell($data_obj->tb_data_tb_city_id,     'center', $style);
                            $table->addCell($data_obj->tb_data_year,           'center', $style);
                            $table->addCell($data_obj->tb_city->tb_city_name,  'center',   $style);
                            $table->addCell($data_obj->tb_data_pop,            'center',   $style);
                            $table->addCell($data_obj->tb_data_born,           'center', $style);

                            // SECTION 1 VALUES

                            $table->addRow();
                            $table->addCell('Atenção à gravidez, parto e puerperio', 'center', 'div', 5);

                            $table->addRow();
                            $table->addCell('Parâmetros populacionais da rede de atenção materno-infantil', 'center', 'sub', 5);
                            $formula->section_1_A($table, 'value', $style, 4);

                            $table->addRow();
                            $table->addCell('Parâmetros assistenciais da rede de atenção materno-infantil', 'center', 'sub', 5);
                            $table->addRow();
                            $table->addCell('População-alvo: todas as gestantes', 'center', 'sub', 5);
                            $formula->section_1_B($table, 'value', $style, 4);

                            $table->addRow();
                            $table->addCell('População-alvo: gestantes de alto risco', 'center', 'sub', 5);
                            $formula->section_1_C($table, 'value', $style, 4);

                            $table->addRow();
                            $table->addCell('População-alvo: crianças de 0 a 12 meses', 'center', 'sub', 5);
                            $formula->section_1_D($table, 'value', $style, 4);

                            $table->addRow();
                            $table->addCell('População-alvo: crianças de 12 a 24 meses', 'center', 'sub', 5);
                            $formula->section_1_E($table, 'value', $style, 4);

                            $table->addRow();
                            $table->addCell('Leitos', 'center', 'sub', 5);
                            $formula->section_1_F($table, 'value', $style, 4);
                          
                            // SECTION 2 VALUES   

                            $table->addRow();
                            $table->addCell('Atenção às pessoas com doenças crônicas não transmissíveis', 'center', 'div', 5);
                            $table->addRow();
                            $table->addCell('Doenças Crônicas Renocardiovasculares', 'center', 'div', 5);

                            $table->addRow();
                            $table->addCell('Diabetes Mellitus', 'center', 'sub', 5);
                            $table->addRow();
                            $table->addCell('População-alvo: 18 anos e mais', 'center', 'sub', 5);

                            $table->addRow();
                            $table->addCell('RISCO', 'center', 'sub', 2);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 2);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 1);
                            $formula->section_2_1_A($table, 'value', $style, 2);

                            //$widths2 = array(100,300, 55, 55, 55, 55);
                            /*
                            $table->addRow();
                            $table->addCell('Exame/Procedimento', 'left', 'sub', $size);
                            $table->addCell('Procedimento - sigtap', 'left', 'sub', $size);
                            $table->addCell('Parâmetro - Extrato de risco', 'left', 'sub', $size);
                            $table->addRow();
                            $table->addCell('', 'left', 'sub', $size);
                            $table->addCell('Baixo', 'left', 'sub', $size);
                            $table->addCell('Médio', 'left', 'sub', $size);
                            $table->addCell('Alto', 'left', 'sub', $size);
                            $table->addCell('Muito Alto', 'left', 'sub', $size);
                            $formula->section_2_1_B($table, 'value', $style, 2);

                            $table->addRow();
                            $table->addCell('RISCO', 'center', 'sub', 2);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 2);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 1);
                            $formula->section_2_2_A($table, 'value', $style, 2);

                            $table->addRow();
                            $table->addCell('Exame/Procedimento', 'left', 'sub', $size);
                            $table->addCell('Procedimento - sigtap', 'left', 'sub', $size);
                            $table->addCell('Parâmetro', 'left', 'sub', $size);
                            $formula->section_2_2_B($table, 'value', $style, 2);

                            $table->addRow();
                            $table->addCell('Insuficiência Cardíaca', 'center', 'sub', 5);
                            $table->addRow();
                            $table->addCell('População-alvo: 55 anos e mais', 'center', 'sub', 5);
                            $table->addRow();
                            $table->addCell('Categoria', 'center', 'sub', 2);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 2);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 1);
                            $formula->section_2_3_A($table, 'value', $style, 2);

                            $table->addRow();
                            $table->addCell('Exame/Procedimento', 'left', 'sub', $size);
                            $table->addCell('Procedimento - sigtap', 'left', 'sub', $size);
                            $table->addCell('Parâmetro', 'left', 'sub', $size);
                            $formula->section_2_3_B($table, 'value', $style, 2);

                            $table->addRow();
                            $table->addCell('Exame/Procedimento', 'left', 'sub', $size);
                            $table->addCell('Procedimento - sigtap', 'left', 'sub', $size);
                            $table->addCell('Parâmetro', 'left', 'sub', $size);
                            $formula->section_2_3_C($table, 'value', $style, 2);


                            */
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

