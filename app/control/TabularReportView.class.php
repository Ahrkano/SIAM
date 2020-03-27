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

            $this->form->addFields( [new TLabel('Área')],    [$city_name] );
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
                    $criteria->add(new TFilter('tb_data_year', 'like', $data->year), TExpression::OR_OPERATOR);
                }
/*
                if ($data->city_name)
                {
                    $criteria->add(new TFilter('(SELECT tb_city_name from tb_city WHERE tb_city_id=tb_data_tb_city_id)', 'like', "%{$data->city_name}%"), TExpression::OR_OPERATOR);
                }
*/
                $data_objs = $repository->load($criteria);
                $format  = $data->output_type;
                
                if ($data_objs)
                {
                    $widths = array(    10,10,10,10,10,10,10,10,10,10,
                                        10,10,10,10,10,10,10,10,10,10,
                                        10,10,10,10,10,10,10,10,10,10,
                                        10,10,10,10,10,10,10,10,10,10,
                                        10,10,10,10,10,10,10,10,10,10,
                                        10,10,10,10,10,10,10,10,10,10,
                                        10,10   );
                    $num_col = 62;

                    // tam (80, 40, 180, 90, 110, 60, 60)


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
                        $table->addStyle('leg',    'Helvetica', '9',  'B', '#ffffff', '#7F848F');


                        $table->setHeaderCallback( function($table) {
                            $table->addRow();
                            $table->addCell('Resultados Ambulatoriais', 'center', 'header', 62);
                            $table->addRow();
                        });
                        
        
                        $table->setFooterCallback( function($table) {
                            $table->addRow();
                            $table->addCell(date('Y-m-d h:i:s'), 'center', 'footer', 62);
                        });
                        
                        // controls the background filling
                        $colour= FALSE;

                        // add region info
                        $table->addRow();
                        $table->addCell('Cod.',         'center',   'title', 8);
                        $table->addCell('Ano',          'center',   'title', 4);
                        $table->addCell('Localidade',   'center',   'title', 26);
                        $table->addCell('População',    'center',   'title', 12);
                        $table->addCell('Nasc.vivos',   'center',   'title', 12);
                        
                        // data rows
                        
                        foreach ($data_objs as $data_obj)
                        {
                            // load params
                            $formula = new Formula($data_obj->tb_data_pop, $data_obj->tb_data_born);

                            $style = $colour ? 'datap' : 'datai';
                            $table->addRow();
                            $table->addCell($data_obj->tb_data_tb_city_id,     'center',    $style, 8);
                            $table->addCell($data_obj->tb_data_year,           'center',    $style, 4);
                            $table->addCell($data_obj->tb_city->tb_city_name,  'center',    $style, 26);
                            $table->addCell($data_obj->tb_data_pop,            'center',    $style, 12);
                            $table->addCell($data_obj->tb_data_born,           'center',    $style, 12);

                            // SECTION 1 VALUES

                            $table->addRow();
                            $table->addCell('Atenção à gravidez, parto e puerperio', 'center', 'div', $num_col);
                            $table->addRow();
                            $table->addCell('Parâmetros populacionais da rede de atenção materno-infantil', 'center', 'sub', $num_col);
                            $formula->section_1_A($table, 'value', $style, $num_col);
                          
                            $table->addRow();
                            $table->addCell('Parâmetros assistenciais da rede de atenção materno-infantil', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('População-alvo: todas as gestantes', 'center', 'sub', $num_col);
                            $formula->section_1_B($table, 'value', $style, ($num_col));
                            
                            $table->addRow();
                            $table->addCell('População-alvo: gestantes de alto risco', 'center', 'sub', $num_col);
                            $formula->section_1_C($table, 'value', $style, ($num_col));
 
                            $table->addRow();
                            $table->addCell('População-alvo: crianças de 0 a 12 meses', 'center', 'sub', $num_col);
                            $formula->section_1_D($table, 'value', $style, ($num_col));

                            $table->addRow();
                            $table->addCell('População-alvo: crianças de 12 a 24 meses', 'center', 'sub', $num_col);
                            $formula->section_1_E($table, 'value', $style, ($num_col));
 
                            $table->addRow();
                            $table->addCell('Leitos', 'center', 'sub', $num_col);
                            $formula->section_1_F($table, 'value', $style, ($num_col));
                          
                            // SECTION 2 VALUES   

                            $table->addRow();
                            $table->addCell('Atenção às pessoas com doenças crônicas não transmissíveis', 'center', 'div', $num_col);
                            $table->addRow();
                            $table->addCell('Doenças Crônicas Renocardiovasculares', 'center', 'div', $num_col);
                            $table->addRow();
                            $table->addCell('Diabetes Mellitus', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('População-alvo: 18 anos e mais', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('Parâmetros de prevalência total e por estrato de risco com relação à Diabetes Mellitus', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('RISCO', 'center', 'sub', 12);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 38);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_1_A($table, 'value', $style, 6);
                           
                            $table->addRow();
                            $table->addCell('Parâmetros para diagnóstico e acompanhamento do Diabetes Mellitus', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Exame/Procedimento', 'center', 'sub', 12);
                            $table->addCell('Procedimento - sigtap', 'center', 'sub', 26);
                            $table->addCell('Extrato de risco', 'center', 'sub', 24);
                            $table->addRow();
                            $table->addCell('', 'left', 'sub', 38);
                            $table->addCell('Baixo', 'left', 'sub', 6);
                            $table->addCell('Médio', 'left', 'sub', 6);
                            $table->addCell('Alto', 'left', 'sub', 6);
                            $table->addCell('Muito Alto', 'left', 'sub', 6);
                            $formula->section_2_1_B($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('População-alvo: 18 anos e mais', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('Estimativa de casos de hipertensão', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('RISCO', 'center', 'sub', 12);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 38);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_2_A($table, 'value', $style, 6);
 
                            $table->addRow();
                            $table->addCell('População-alvo: 18 anos e mais', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('Parâmetros para exames laboratoriais, oftalmológicos e de diagnóstico em cardiologia', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Exame/Procedimento', 'center', 'sub', 12);
                            $table->addCell('Procedimento - sigtap', 'center', 'sub', 38);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_2_B($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Insuficiência Cardíaca', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('População-alvo: 55 anos e mais', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('Estimativa de casos para programação da assistência à insuficiência cardíaca', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Categoria', 'center', 'sub', 18);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 32);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_3_A($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Parâmetros para diagnóstico e estadiamento da Insuficiência Cardíaca - IC', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Exame/Procedimento', 'center', 'sub', 18);
                            $table->addCell('Procedimento - sigtap', 'center', 'sub', 32);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_3_B($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Parâmetros para acompanhamento de pacientes com IC de origem não isquemica ou valvar ou de causa', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Exame/Procedimento', 'center', 'sub', 18);
                            $table->addCell('Procedimento - sigtap', 'center', 'sub', 32);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_3_C($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Parâmetros para acompanhamento de pacientes com IC de origem isquemica ou valvar ou de causa', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Exame/Procedimento', 'center', 'sub', 18);
                            $table->addCell('Procedimento - sigtap', 'center', 'sub', 32);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_3_D($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Aneurisma de Aorta Abdominal (AAA)', 'center', 'div', $num_col);
                            $table->addRow();
                            $table->addCell('População-alvo: Homem de 65 a 74 anos', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('Estimatimativa de casos de programação da assistência ao AAA', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Categoria', 'center', 'sub', 32);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 20);
                            $table->addCell('Parâmetro', 'center', 'sub', 10);
                            $formula->section_2_4_A($table, 'value', 'sub', $style, 6);

                            $table->addRow();
                            $table->addCell('Parâmetros propostos para acompanhamento de pacientes com AAA', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Exame/Procedimento', 'center', 'sub', 14);
                            $table->addCell('Procedimento - sigtap', 'center', 'sub', 38);
                            $table->addCell('Parâmetro', 'center', 'sub', 10);
                            $formula->section_2_4_B($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Ataque Isquêmico Transitório (AIT)', 'center', 'div', $num_col);
                            $table->addRow();
                            $table->addCell('População-alvo: 35 anos ou mais', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('Estimatimativa de casos para programação da assistência ao AIT', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Categoria', 'center', 'sub', 30);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 22);
                            $table->addCell('Parâmetro', 'center', 'sub', 10);
                            $formula->section_2_5_A($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Parâmetros propostos para acompanhamento de pacientes com AIT/ Necessidade de procedimento', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Exame/Procedimanto', 'center', 'sub', 18);
                            $table->addCell('Procedimento sigtap', 'center', 'sub', 32);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_5_B($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Acidente Vascular Encefálico (AVE)', 'center', 'div', $num_col);
                            $table->addRow();
                            $table->addCell('População-alvo: 45 anos ou mais', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('Estimatimativa de casos para programação da assistência ao AVE', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Categoria', 'center', 'sub', 20);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 30);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_6_A($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Parâmetros propostos para acompanhamento de pacientes com AVE/ Necessidade de procedimento', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Categoria', 'center', 'sub', 18);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 32);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_6_B($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Doença Arterial Coronariana (DAC)', 'center', 'div', $num_col);
                            $table->addRow();
                            $table->addCell('População-alvo: 45 anos ou mais', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('Estimatimativa de casos para programação da assistência à DAC', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Categoria', 'center', 'sub', 18);
                            $table->addCell('Parâmetro de prevalência', 'center', 'sub', 32);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_7_A($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Parâmetros propostos para acompanhamento de pacientes com DAC (ICO) - primeiro atendimento', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Exame/Procedimanto', 'center', 'sub', 18);
                            $table->addCell('Procedimento sigtap', 'center', 'sub', 32);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_7_B($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Parâmetros propostos para acompanhamento de pacientes com DAC (ICO) - acompanhamento', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Exame/Procedimanto', 'center', 'sub', 18);
                            $table->addCell('Procedimento sigtap', 'center', 'sub', 32);
                            $table->addCell('Parâmetro', 'center', 'sub', 12);
                            $formula->section_2_7_C($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Doença Renal Cronica (DRC)', 'center', 'div', $num_col);
                            $table->addRow();
                            $table->addCell('População-alvo: 20 anos ou mais', 'center', 'sub', $num_col);
                            $table->addRow();
                            $table->addCell('Parâmetros propostos para estimar a prevalência de pacientes com DRC', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Estratos', 'center', 'sub', 6);
                            $table->addCell('Descrição simplificada', 'center', 'sub', 29);
                            $table->addCell('Parâmetro', 'center', 'sub', 21);
                            $table->addCell('Parâmetro', 'center', 'sub', 6);
                            $formula->section_2_8_A($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Estimatimativa de casos para programação da assistência à paciente em diálise - Estágio 5 da DRC', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Categoria', 'center', 'sub', 30);
                            $table->addCell('Parâmetro', 'center', 'sub', 22);
                            $table->addCell('Parâmetro', 'center', 'sub', 10);
                            $formula->section_2_8_B($table, 'value', $style, 6);

                            $table->addRow();
                            $table->addCell('Parâmetros propostos para acompanhamento de pacientes com DRC - Estágio/Necessidade de proced.', 'center', 'leg', $num_col);
                            $table->addRow();
                            $table->addCell('Exam./Proced.',    'center', 'sub', 8);
                            $table->addCell('Procedimento - sigtap', 'center', 'sub', 39);
                            $table->addCell('DRC',  'center', 'sub', 3);
                            $table->addCell('I',    'center', 'sub', 3);
                            $table->addCell('II',   'center', 'sub', 3);
                            $table->addCell('III',  'center', 'sub', 3);
                            $table->addCell('IV',   'center', 'sub', 3);
                            $formula->section_2_8_C($table, 'value', $style, 6);



  /*                          */
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

