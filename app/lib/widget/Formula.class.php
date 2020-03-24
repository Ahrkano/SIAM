<?php
    /**
     * Formula functions
     *
     * @version    1.0
     * @author     Alexandre Pontes
     */

    class Formula
    {
        public $pop_var;                // populacao total da regiao
        public $born_var;               // nascidos vivos no ano anterior
        public $aux;                    // hold temp values

        // section 1 params
        
        public $total_ges;              // estimativa total de gestantes
        public $grh;                    // gestantes de risco habitual
        public $gar;                    // gestantes de alto risco
        public $total_nasc;             // estimativa do numero total de recem nascidos
        public $total_c_1;              // estimativa do numero total de criancas de 0 a 12 meses
        public $total_c_2;              // estimativa do numero total de criancas de 12 a 24 meses
        public $pop_f_f;                // populacao feminina em idade fertil

        // section 2 params

        public $melitus;                // popuação diabetes melitus
        public $hipert;                 // população hipertensão



          public function __construct($total_population, $total_born)
          {
               $this->pop_var              =  $total_population;
               $this->born_var             =  $total_born;
               // section 1 params
               $this->total_ges            =  $this->pop_var * 1.05;
               $this->grh                  =  $this->total_ges * 0.85;
               $this->gar                  =  $this->total_ges * 0.15;
               $this->total_nasc           =  $this->pop_var * 1.05;
               $this->total_c_1            =  $this->pop_var + ( $this->pop_var * 0.99);
               $this->total_c_2            =  $this->pop_var + ( $this->pop_var * 0.98);
               $this->pop_f_f              =  $this->born_var * 0.33;
               $this->aux                  =  0;
          }
     
 
          public function section_1_A($table, $row_style, $style, $size)
          {
               $table->addRow();   
               $table->addCell( 'Estimativa total de gestantes' ,                              'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges),                                         'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Gestante de risco habitual' ,                                 'left', $row_style, $size-6);
               $table->addCell(ceil($this->grh),                                               'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Gestante de alto risco' ,                                     'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar),                                               'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Estimativa de número total de recem nascidos' ,               'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_nasc),                                        'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Estimativa de número total de crianças de 0 a 12 meses' ,     'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_c_1),                                         'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Estimativa de número total de crianças de 12 a 24 meses' ,    'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_c_2),                                         'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'População feminina em idade fértil' ,                         'left', $row_style, $size-6);
               $table->addCell(ceil($this->pop_f_f),                                           'center', $style, 6);
          }

          public function section_1_B($table, $row_style, $style, $size)
          {
               $table->addRow();   
               $table->addCell( 'Consulta de pré natal (consulta médica)' ,                         'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*3),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Consulta pueperal (Consulta médica)' ,                             'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*1),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Consulta de pré natal (consulta de enfermagem)' ,                  'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*3),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Consulta odontologica na atenção básica' ,                         'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*1),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Atividade Educativa/Orientação em grupo' ,                         'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*4),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Determinação direta e reversa de grupo ABO' ,                      'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*1),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Pesquisa de fator RH' ,                                            'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*1),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Teste ind. de antiglobulina humana Teste Coombs ind. p/ RH neg.',  'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*0.3),                                          'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Análise de caracteres físicos, elementos e sedimentos de urina',   'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*2),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Dosagem de glicose' ,                                              'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*2),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Dosagem proteinúria - fita reagente' ,                             'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*0.3),                                          'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'VDRL p/ detecção de sífilis em gestante' ,                         'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*2),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Hematócrito' ,                                                     'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*2),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Dosagem de hemoglobina' ,                                          'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*2),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Pesquisa de anticorpos IGM Antioxoplasma' ,                        'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*1),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'HBsAg' ,                                                           'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*1),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Pesquisa de Anticorpos Anti-HIV1 + HIV2 (Elisa)' ,                 'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*2),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Eletroforese de hemoglobina' ,                                     'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*1),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Ultrasonografia obstétrica' ,                                      'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*1),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Exame citopatologico cérvico-vaginal/microflora' ,                 'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*1),                                            'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Cultura de bactérias para identificação' ,                         'left', $row_style, $size-6);
               $table->addCell(ceil($this->total_ges*1),                                            'center', $style, 6);
          }

          public function section_1_C($table, $row_style, $style, $size)
          {
               $table->addRow();   
               $table->addCell( 'Consulta médica em atenção especializada' ,                             'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*5),                                                       'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Determinação de curva glicêmica clássica - Teste de tol. à glicose' ,   'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*1),                                                       'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'ECG - Eletrocardiograma' ,                                              'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*0.3),                                                     'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Ultrassonografia obstétrica com Doppler colorido e pulsado' ,           'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*1),                                                       'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Ultrassonografia obstétrica' ,                                          'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*2),                                                       'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Tococardiografia ante-parto' ,                                          'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*1),                                                       'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Contagem de plaquetas' ,                                                'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*0.3),                                                     'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Uréria' ,                                                               'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*1),                                                       'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Dosagem de creatina' ,                                                  'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*1),                                                       'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Dosagem de ácido úrico' ,                                               'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*1),                                                       'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Consulta de profissional de nível superior - Psicossocial' ,            'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*1),                                                       'center', $style, 6);
               $table->addRow();   
               $table->addCell( 'Dosagem de proteínas totais' ,                                          'left', $row_style, $size-6);
               $table->addCell(ceil($this->gar*1),                                                       'center', $style, 6);
          }

          public function section_1_D($table, $row_style, $style, $size)
          {
               $table->addRow();   
               $table->addCell( 'Visita domiciliar por profissional de nível superior' ,                      'left', $row_style, $size-16);
               $table->addCell(ceil($this->total_nasc*1),                                                     'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Consulta médica em atenção especializada (RN > 2500g)' ,                     'left', $row_style, $size-16);
               $table->addCell(ceil($this->total_nasc*0.92*3),                                                'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Consulta de profissional de nivel superior na atenção básica (RN > 2500g)' , 'left', $row_style, $size-16);
               $table->addCell(ceil($this->total_nasc*0.92*4),                                                'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Consulta médica em atenção especializada (RN < 2500g)' ,                     'left', $row_style, $size-16);
               $table->addCell(ceil($this->total_nasc*0.08*7),                                                'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Consulta de profissional de nivel superior na atenção básica (RN < 2500g)' , 'left', $row_style, $size-16);
               $table->addCell(ceil($this->total_nasc*0.08*6),                                                'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Acompanhamento específico do RN egresso de UTI até 24 meses' ,               'left', $row_style, $size-16);
               $table->addCell( 'De acordo com a necessidade',                                                'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Vacinação básica' ,                                                          'left', $row_style, $size-16);
               $table->addCell( 'Ver protocolo de vacinação',                                                 'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Teste do pezinho (até o 7º dia)' ,                                           'left', $row_style, $size-16);
               $table->addCell(ceil($this->total_nasc*1),                                                     'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Teste da orelhinha' ,                                                        'left', $row_style, $size-16);
               $table->addCell(ceil($this->total_nasc*1),                                                     'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Teste do olhinho (4º, 6º, 12º e 25º meses)' ,                                'left', $row_style, $size-16);
               $table->addCell(ceil($this->total_nasc*1),                                                     'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Sulfato ferroso' ,                                                           'left', $row_style, $size-16);
               $table->addCell( 'Profilaxia de 6 a 18 meses',                                                 'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Vitamina A' ,                                                                'left', $row_style, $size-16);
               $table->addCell( 'Em área endêmica',                                                           'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Consulta de profissional de nivel superior na atenção básica (odontológica)','left', $row_style, $size-16);
               $table->addCell(ceil($this->total_c_1*2),                                                      'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Exames (apoio diagnóstico e terapêutico)' ,                                  'left', $row_style, $size-16);
               $table->addCell( 'De acordo com diagnóstico',                                                  'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Consulta médica em atenção especializada' ,                                  'left', $row_style, $size-16);
               $table->addCell( 'De acordo com diagnóstico',                                                  'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Consulta/Atendimento de reabilitação' ,                                      'left', $row_style, $size-16);
               $table->addCell( 'De acordo com diagnóstico',                                                  'center', $style, 16);
               $table->addRow();   
               $table->addCell( 'Atividade educativa/Orientação em grupo na atenção básica' ,                 'left', $row_style, $size-16);
               $table->addCell( '2 a.e/população coberta/ano',                                                'center', $style, 16);
          }

          public function section_1_E($table, $row_style, $style, $size)
          {
               $table->addRow();
               $table->addCell('Consulta médica em atenção básica',                                      'center', $row_style, $size-16);
               $table->addCell(ceil($this->melitus*0.2),                                                 'center', $style, 16);
               $table->addRow();
               $table->addCell('Consulta de profissional de nivel superior na atenção básica',           'center', $row_style, $size-16);
               $table->addCell(ceil($this->melitus*0.2),                                                 'center', $style, 16);
               $table->addRow();
               $table->addCell('Consulta médica em atenção especializada (consulta de especialidades)',  'center', $row_style, $size-16);
               $table->addCell('De acordo com diagnóstico',                                              'center', $style, 16);
               $table->addRow();
               $table->addCell('Atividade educativa/Orientação em grupo na atenção básica',              'center', $row_style, $size-16);
               $table->addCell('1 a.e/população coberta/ano',                                            'center', $style, 16);
               $table->addRow();
               $table->addCell('Vacinação básica',                                                       'center', $row_style, $size-16);
               $table->addCell('De acordo com diagnóstico',                                              'center', $style, 16);
               $table->addRow();
               $table->addCell('Exames',                                                                 'center', $row_style, $size-16);
               $table->addCell('De acordo com diagnóstico',                                              'center', $style, 16);
               $table->addRow();
               $table->addCell('Consulta/Atendimento de reabilitação',                                   'center', $row_style, $size-16);
               $table->addCell('De acordo com diagnóstico',                                              'center', $style, 16);
               $table->addRow();
               $table->addCell('Consulta para acompanhamento de crescimento e desenvolvimento',          'center', $row_style, $size-16);
               $table->addCell('De acordo com diagnóstico',                                              'center', $style, 16);
          }

          public function section_1_F($table, $row_style, $style, $size)
          {
               $this->aux = ($this->total_ges*2.5)/(365*0.7)*1.21;
               
               $table->addRow();
               $table->addCell('Leitos obstétricos',                       'left', $row_style, $size-18);
               $table->addCell(ceil($this->aux),                           'center', $style, 18);
               $table->addRow();
               $table->addCell('Leitos obstétricos (GAR)',                 'left', $row_style, $size-18);
               $table->addCell(ceil($this->aux*0.15),                      'center', $style, 18);
               $table->addRow();
               $table->addCell('UTI adulto (consulta de especialidades)',  'left', $row_style, $size-18);
               $table->addCell(ceil($this->aux*0.02),                      'center', $style, 18);
               $table->addRow();
               $table->addCell('UTI Neonatal',                             'left', $row_style, $size-18);
               $table->addCell('2 leitos p/ cada 1000 nasc. vivos',        'center', $style, 18);
               $table->addRow();
               $table->addCell('UCI Neonatal',                             'left', $row_style, $size-18);
               $table->addCell('3 leitos p/ cada 1000 nasc. vivos',        'center', $style, 18);
               $table->addRow();
               $table->addCell('Leito canguru',                            'left', $row_style, $size-18);
               $table->addCell('1 leito p/ cada 1000 nasc. vivos',         'center', $style, 18);
          }

          public function section_2_1_A($table, $row_style, $style, $size)
          {
               $this->melitus = $this->pop_var*0.7049*0.069;               
               $table->addRow();
               $table->addCell('Baixo',                          'left', $row_style, $size*2);
               $table->addCell('20% dos diabéticos',             'center', $style, $size*6 + 2);
               $table->addCell(ceil($this->melitus*0.2),         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Médio',                          'left', $row_style, $size*2);
               $table->addCell('50% dos diabéticos',             'center', $style, $size*6 + 2);
               $table->addCell(ceil($this->melitus*0.5),         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Alto',                           'left', $row_style, $size*2);
               $table->addCell('25% dos diabéticos',             'center', $style, $size*6 + 2);
               $table->addCell(ceil($this->melitus*0.25),        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Muito alto',                     'left', $row_style, $size*2);
               $table->addCell('5% dos diabéticos',              'center', $style, $size*6 + 2);
               $table->addCell(ceil($this->melitus*0.05),        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Total',                          'left', $row_style, $size*2);
               $table->addCell('6,9% da pop. de 18 anos e mais', 'center', $style, $size*6 + 2);
               $table->addCell(ceil($this->melitus),             'center', $style, $size*2);
          }

          public function section_2_1_B($table, $row_style, $style, $size)
          {
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de glicose',                                           'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*1*0.2),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*2*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*2*0.05),                                    'center', $style, $size);

               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de colesterol total',                                  'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*0.5*0.2),                                   'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.05),                                    'center', $style, $size);

               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de colesterol HDL',                                    'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*0.5*0.2),                                   'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.05),                                    'center', $style, $size);

               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de colesterol LDL',                                    'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*0.5*0.2),                                   'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.05),                                    'center', $style, $size);

               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de colesterol triglicerídios',                         'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*0.5*0.2),                                   'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.05),                                    'center', $style, $size);

               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de hemoglobina glicosada',                             'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*2*0.2),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*2*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*4*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*4*0.05),                                    'center', $style, $size);

               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de creatina',                                          'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*1*0.2),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*2*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*4*0.05),                                    'center', $style, $size);

               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Análise de caracteres fís, elementos e sedimentos da urina',   'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*1*0.2),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*2*0.05),                                    'center', $style, $size);

               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de microalbumina na urina',                            'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*1*0.2),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.05),                                    'center', $style, $size);

               $table->addRow();
               $table->addCell('Oftalmológicos',                                               'left', $row_style, $size*2);
               $table->addCell('Fundoscopia',                                                  'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*1*0.2),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.05),                                    'center', $style, $size);

               $table->addRow();
               $table->addCell('Oftalmológicos',                                               'left', $row_style, $size*2);
               $table->addCell('Retinografia binocular colorida',                              'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*1*0.2),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.05),                                    'center', $style, $size);

               $table->addRow();
               $table->addCell('Oftalmológicos',                                               'left', $row_style, $size*2);
               $table->addCell('Fotocoagulação a laser',                                       'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*0.2*0.2),                                   'center', $style, $size);
               $table->addCell(ceil($this->melitus*0.2*0.5),                                   'center', $style, $size);
               $table->addCell(ceil($this->melitus*0.2*0.25),                                  'center', $style, $size);
               $table->addCell(ceil($this->melitus*0.4*0.05),                                  'center', $style, $size);

               $table->addRow();
               $table->addCell('Diag. em cardiologia',                                         'left', $row_style, $size*2);
               $table->addCell('Eletrocardiograma',                                            'left', $style, $size*4 +2);
               $table->addCell(ceil($this->melitus*1*0.2),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.5),                                     'center', $style, $size);
               $table->addCell(ceil($this->melitus*1*0.25),                                    'center', $style, $size);
               $table->addCell(ceil($this->melitus*2*0.05),                                    'center', $style, $size);
          }

          public function section_2_2_A($table, $row_style, $style, $size)
          {
               $this->hipert = $this->pop_var*0.7049*0.214;               
               $table->addRow();
               $table->addCell('Baixo',                               'left', $row_style, $size*2);
               $table->addCell('40% dos hipertensos',                 'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*0.4),               'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Moderado',                            'left', $row_style, $size*2);
               $table->addCell('35% dos hipertensos',                 'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*0.35),              'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Alto',                                'left', $row_style, $size*2);
               $table->addCell('25% dos hipertensos',                 'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*0.25),              'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Total',                               'left', $row_style, $size*2);
               $table->addCell('21,4% da pop. de 18 anos e mais',     'left', $style, $size*6 +2);
               $table->addCell(ceil($this->melitus),                  'center', $style, $size*2);
          }

          public function section_2_2_B($table, $row_style, $style, $size)
          {
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de glicose',                                           'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*1),                                          'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de colesterol total',                                  'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*1),                                          'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de colesterol HDL',                                    'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*1),                                          'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de colesterol LDL',                                    'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*1),                                          'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de triglicerídios',                                    'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*1),                                          'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de creatina',                                          'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*1),                                          'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Análise de caracteres fís, elementos e sedimentos da urina',   'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*1),                                          'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*2);
               $table->addCell('Dosagem de potássio',                                          'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*1),                                          'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Oftalmológicos',                                               'left', $row_style, $size*2);
               $table->addCell('Fundoscopia',                                                  'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*1),                                          'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diag. em cardiologia',                                      'left', $row_style, $size*2);
               $table->addCell('Eletrocardiograma',                                            'left', $style, $size*6 +2);
               $table->addCell(ceil($this->hipert*1),                                          'center', $style, $size*2);
          }

          public function section_2_3_A($table, $row_style, $style, $size)
          {
               // hold population with 55+ years
               $this->aux = $this->pop_var*0.1512;
               $table->addRow();
               $table->addCell('Casos novos de ICC - Incidência',          'left', $row_style, $size*3);
               $table->addCell('0,87% da população com 55 anos e mais',    'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.087),                     'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Prevalência',                              'left', $row_style, $size*3);
               $table->addCell('2,46% da população com 55 anos e mais',    'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246),                     'center', $style, $size*2);
          }

          public function section_2_3_B($table, $row_style, $style, $size)
          {
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*3);
               $table->addCell('Dosagem de hormônio tireo-estimulante (TSH)',                  'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                                       'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*3);
               $table->addCell('Dosagem de sódio serico',                                      'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                                       'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*3);
               $table->addCell('Análise de caracteres fís, elementos e sedimentos da urina',   'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                                       'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*3);
               $table->addCell('Dosagem de potássio',                                          'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                                       'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*3);
               $table->addCell('Pesquisa de anticorpos IGG Antitrypanosoma cruzi',             'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                                       'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                                  'left', $row_style, $size*3);
               $table->addCell('Pesquisa de Trypanosoma cruzi (por imunofluorescência)',       'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                                       'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Radiodiagnóstico',                                             'left', $row_style, $size*3);
               $table->addCell('Raio X de tórax em 2 incidenciais (PA e perfil)',              'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                                       'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnose em cardiologia',                                      'left', $row_style, $size*3);
               $table->addCell('Eletrocardiograma em repouso',                                 'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                                       'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnose em cardiologia',                                      'left', $row_style, $size*3);
               $table->addCell('Cateterismo cardíaco',                                         'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*0.16),                                    'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnose em cardiologia',                                      'left', $row_style, $size*3);
               $table->addCell('Ecocardiografia transtorácica',                                'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                                       'center', $style, $size*2);
          }

          public function section_2_3_C($table, $row_style, $style, $size)
          {
               $table->addRow();
               $table->addCell('Exames de patologia clínica',              'left', $row_style, $size*3);
               $table->addCell('Dosagem de potássio',                      'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                   'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',              'left', $row_style, $size*3);
               $table->addCell('Dosagem de creatina',                      'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                   'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames em imagem',                         'left', $row_style, $size*3);
               $table->addCell('Ecocardiografia transtorácica',            'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*0.1),                 'center', $style, $size*2);
          }

          public function section_2_3_D($table, $row_style, $style, $size)
          {
               $table->addRow();
               $table->addCell('Exames de patologia clínica',              'left', $row_style, $size*3);
               $table->addCell('Dosagem de potássio',                      'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                   'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',              'left', $row_style, $size*3);
               $table->addCell('Dosagem de creatina',                      'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*1),                   'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames em imagem',                         'left', $row_style, $size*3);
               $table->addCell('Ecocardiografia transtorácica',            'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.246*0.1),                 'center', $style, $size*2);
          }

          public function section_2_4_A($table, $row_style, $sub_style, $style, $size)
          {
               $table->addRow();
               $table->addCell('População alvo: fumantes(10,6%) ou ex-fumantes(56,7%)',   'left', $row_style, $size*5 +2);
               $table->addCell('67,3% dos Homens de 65 a 74 anos',                        'left', $style, $size*3 +2);
               $table->addCell(ceil($this->pop_var*0.0204*0.673),                         'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Riscos',                                                  'center', $sub_style, $size*5 +2);
               $table->addCell('Parâmetros de prevalência',                               'center', $sub_style, $size*3 +2);
               $table->addCell('Parâmetro ',                                              'center', $sub_style, $size +4);

               $table->addRow();
               $table->addCell('Pacientes com aneurismas de 30 a 40 nm',                  'left', $row_style, $size*5 +2);
               $table->addCell('8,83% dos rastreados',                                    'left', $style, $size*3 +2);
               $table->addCell(ceil($this->pop_var*0.0204*0.673*0.0583),                  'center', $style, $size +4);

               $table->addRow();
               $table->addCell('Pacientes com aneurismas de 40 a 54 nm',                  'left', $row_style, $size*5 +2);
               $table->addCell('1,9% dos rastreados',                                     'left', $style, $size*3 +2);
               $table->addCell(ceil($this->pop_var*0.0204*0.673*0.019),                   'center', $style, $size +4);

               $table->addRow();
               $table->addCell('[OBS1] - Aneurisma de 40 a 54mm necessitando reparo cirúrgico a cada 5 anos de "follow-up"', 'left', $row_style, $size*8 +4);
               $table->addCell(ceil($this->pop_var*0.0204*0.673*0.019*0.6),               'center', $style, $size +4);

               $table->addRow();
               $table->addCell('Pacientes com aneurismas > 54 nm',                        'left', $row_style, $size*5 +2);
               $table->addCell('0,27% dos rastreados',                                    'left', $style, $size*3 +2);
               $table->addCell(ceil($this->pop_var*0.0204*0.673*0.0027),                  'center', $style, $size +4);

               $table->addRow();
               $table->addCell('[OBS2] - Pacientes com aneurisma >54mm devem ser encaminhados à cirurgia vascular(100%)', 'left', $row_style, $size*8 +4);
               $table->addCell(ceil($this->pop_var*0.0204*0.673*0.0027*1),                'center', $style, $size +4);

          }

          public function section_2_4_B($table, $row_style, $style, $size)
          {
               $table->addRow();
               $table->addCell('Exames em imagem',                                   'left', $row_style, $size*3);
               $table->addCell('Ultrasonografia de Abdomen Superior (p/ rastreio)',  'left', $style, $size*5 +4);
               $table->addCell(ceil($this->aux*0.246*0.1),                           'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exames em imagem',                                   'left', $row_style, $size*3);
               $table->addCell('Ultrasonografia de Abdomen Superior ()',             'left', $style, $size*5 +4);
               $table->addCell(ceil($this->aux*0.246*0.1),                           'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exames em imagem',                                   'left', $row_style, $size*3);
               $table->addCell('Ecocardiografia transtorácica',                      'left', $style, $size*5 +4);
               $table->addCell(ceil($this->aux*0.246*0.1),                           'center', $style, $size +4);
          }

          public function section_2_5_A($table, $row_style, $sub_style, $style, $size)
          {
               $table->addRow();
               $table->addCell('Casos novos AIT - incidência',                       'left', $row_style, $size*5);
               $table->addCell('0,112% da população com 35 anos e mais',             'left', $style, $size*3 +4);
               $table->addCell(ceil($this->pop_var*0.4122*0.00112),                  'center', $style, $size +4);

               $table->addRow();
               $table->addCell('Pacientes com AIT que não apresenta diag. causal',   'left', $row_style, $size*5);
               $table->addCell('0,038% da população com 35 anos e mais',             'left', $style, $size*3 +4);
               $table->addCell(ceil($this->pop_var*0.4122*0.00038),                  'center', $style, $size +4);
          }

          public function section_2_5_B($table, $row_style, $sub_style, $style, $size)
          {
               
          }
    }