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
               $table->addCell('Consulta médica em atenção básica',                                      'left', $row_style, $size-16);
               $table->addCell(ceil($this->melitus*0.2),                                                 'center', $style, 16);
               $table->addRow();
               $table->addCell('Consulta de profissional de nivel superior na atenção básica',           'left', $row_style, $size-16);
               $table->addCell(ceil($this->melitus*0.2),                                                 'center', $style, 16);
               $table->addRow();
               $table->addCell('Consulta médica em atenção especializada (consulta de especialidades)',  'left', $row_style, $size-16);
               $table->addCell('De acordo com diagnóstico',                                              'center', $style, 16);
               $table->addRow();
               $table->addCell('Atividade educativa/Orientação em grupo na atenção básica',              'left', $row_style, $size-16);
               $table->addCell('1 a.e/população coberta/ano',                                            'center', $style, 16);
               $table->addRow();
               $table->addCell('Vacinação básica',                                                       'left', $row_style, $size-16);
               $table->addCell('De acordo com diagnóstico',                                              'center', $style, 16);
               $table->addRow();
               $table->addCell('Exames',                                                                 'left', $row_style, $size-16);
               $table->addCell('De acordo com diagnóstico',                                              'center', $style, 16);
               $table->addRow();
               $table->addCell('Consulta/Atendimento de reabilitação',                                   'left', $row_style, $size-16);
               $table->addCell('De acordo com diagnóstico',                                              'center', $style, 16);
               $table->addRow();
               $table->addCell('Consulta para acompanhamento de crescimento e desenvolvimento',          'left', $row_style, $size-16);
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
               $this->aux = $this->pop_var*0.0204*0.673;
               $table->addRow();
               $table->addCell('Exames em imagem',                                                                 'left', $row_style, $size*2+2);
               $table->addCell('Ultrasonografia de Abdomen Superior (p/ rastreio)',                                'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux*1),                                                                 'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exames em imagem',                                                                 'left', $row_style, $size*2+2);
               $table->addCell('Ultrasonografia de Abdomen Superior (contr. de aneurisma 30 a 40mm)',              'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux*0.0583*0.3),                                                        'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exames em imagem',                                                                 'left', $row_style, $size*2+2);
               $table->addCell('Ultrasonografia de Abdomen Superior (contr. de aneurisma 40 a 54mm)',              'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux*0.019*1),                                                           'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Cirurgia',                                                                         'left', $row_style, $size*2+2);
               $table->addCell('Cirurgia vascular - aneurisma 40 a 54mm que evolui para >54mm',                    'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux*0.246*0.1),                                                         'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Cirurgia',                                                                         'left', $row_style, $size*2+2);
               $table->addCell('Cirurgia vascular - aneurisma >54mm',                                              'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux*0.0027*0.2),                                                        'center', $style, $size +4);
          }

          public function section_2_5_A($table, $row_style, $style, $size)
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

          public function section_2_5_B($table, $row_style, $style, $size)
          {
               $this->aux = $this->pop_var*0.4122*0.00112;

               $table->addRow();
               $table->addCell('Exames de patologia clínica',              'left', $row_style, $size*3);
               $table->addCell('Hemograma',                                'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',              'left', $row_style, $size*3);
               $table->addCell('Glicemia',                                 'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',              'left', $row_style, $size*3);
               $table->addCell('Dosagem de creatina',                      'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',              'left', $row_style, $size*3);
               $table->addCell('Dosagem de tempo de protrombina (RNI)',    'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',              'left', $row_style, $size*3);
               $table->addCell('Dosagem de colesterol HDL',                'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',              'left', $row_style, $size*3);
               $table->addCell('Dosagem de colesterol LDL',                'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',              'left', $row_style, $size*3);
               $table->addCell('Dosagem de triglicerídios',                'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',               'left', $row_style, $size*3);
               $table->addCell('Ultrassom de arterias vertebrais',         'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',               'left', $row_style, $size*3);
               $table->addCell('Ultrassom de arterias carótidas',          'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',               'left', $row_style, $size*3);
               $table->addCell('TC de crânio',                             'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',               'left', $row_style, $size*3);
               $table->addCell('Eletrocardiograma de repouso',             'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',               'left', $row_style, $size*3);
               $table->addCell('Ecocardiografia',                          'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.34),                      'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',               'left', $row_style, $size*3);
               $table->addCell('Holter',                                   'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.34),                      'center', $style, $size*2);
          }

          public function section_2_6_A($table, $row_style, $style, $size)
          {
               $this->aux = $this->pop_var*0.2706*0.00525;

               $table->addRow();
               $table->addCell('Casos novos de AVE - Incidência',                                        'left', $row_style, $size*3 +2);
               $table->addCell('0,525% da população com 45 anos e mais',                                 'left', $style, $size*5);
               $table->addCell(ceil($this->aux),                                                         'center', $style, $size*2);

          }

          public function section_2_6_B($table, $row_style, $style, $size)
          {
               $this->aux = $this->pop_var*0.2706*0.00525;

               $table->addRow();
               $table->addCell('Exame de patologia clínica',               'left', $row_style, $size*3);
               $table->addCell('Dosagem de creatina',                      'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exame de patologia clínica',               'left', $row_style, $size*3);
               $table->addCell('Dosagem de tempo de protrombina (RNI)',    'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.15*12),                   'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exame de patologia clínica',               'left', $row_style, $size*3);
               $table->addCell('Dosagem de colesterol HDL',                'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exame de patologia clínica',               'left', $row_style, $size*3);
               $table->addCell('Dosagem de colesterol LDL',                'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exame de patologia clínica',               'left', $row_style, $size*3);
               $table->addCell('Dosagem de triglicerídios',                'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',               'left', $row_style, $size*3);
               $table->addCell('Ultrassom de arterias vertebrais',         'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',               'left', $row_style, $size*3);
               $table->addCell('Ultrassom de arterias carótidas',          'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                         'center', $style, $size*2);
          }

          public function section_2_7_A($table, $row_style, $style, $size)
          {
               $this->aux = $this->pop_var*0.2706;

               $table->addRow();
               $table->addCell('Casos novos ICO (DAC) - incidência',        'left', $row_style, $size*5);
               $table->addCell('0,43% da população com 45 anos e mais',     'left', $style, $size*3 +4);
               $table->addCell(ceil($this->aux*0.0043),                     'center', $style, $size +4);

               $table->addRow();
               $table->addCell('Portadora de ICO (DAC) - prevalência',      'left', $row_style, $size*5);
               $table->addCell('10,99% da população com 35 anos e mais',    'left', $style, $size*3 +4);
               $table->addCell(ceil($this->aux*0.1099),                     'center', $style, $size +4);
          }

          public function section_2_7_B($table, $row_style, $style, $size)
          {
               $this->aux = $this->pop_var*0.2706*0.0043;

               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Hemograma',                                               'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Glicemia',                                                'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Dosagem de creatina',                                     'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Dosagem de colesterol HDL',                               'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Dosagem de colesterol LDL',                               'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Dosagem de triglicerídios',                               'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('(TSH)',                                                   'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',                              'left', $row_style, $size*3);
               $table->addCell('Teste de esforço',                                        'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.98),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',                              'left', $row_style, $size*3);
               $table->addCell('Ecocardiografia de estresse (farmacológico ou físico)',   'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.95),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',                              'left', $row_style, $size*3);
               $table->addCell('Eletrocardiograma',                                       'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.95),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Diagnóstico em cardiologia',                              'left', $row_style, $size*3);
               $table->addCell('Eletrocardiograma de repouso',                            'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                     'center', $style, $size*2);

          }

          public function section_2_7_C($table, $row_style, $style, $size)
          {
               $this->aux = $this->pop_var*0.2706*0.1099;

               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Hemograma',                                               'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Glicemia',                                                'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Dosagem de creatina',                                     'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Dosagem de colesterol HDL',                               'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Dosagem de colesterol LDL',                               'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames de patologia clínica',                             'left', $row_style, $size*3);
               $table->addCell('Dosagem de triglicerídios',                               'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                        'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames em imagem',                                        'left', $row_style, $size*3);
               $table->addCell('Eletrocardiograma',                                       'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.1),                                     'center', $style, $size*2);
               $table->addRow();
               $table->addCell('Exames em imagem',                                        'left', $row_style, $size*3);
               $table->addCell('Eletrocardiograma de repouso',                            'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.1),                                        'center', $style, $size*2);

          }

          public function section_2_8_A($table, $row_style, $style, $size)
          {
               $this->aux = $this->pop_var*0.6699;

               $table->addRow();
               $table->addCell('Estágio 1',                                               'left', $row_style, $size);
               $table->addCell('Fase de lesão com função renal normal',                   'left', $style, $size*4 +5);
               $table->addCell('0,96% da população de 20 anos e mais ',                   'left', $style, $size*3 +3);
               $table->addCell(ceil($this->aux*0.096),                                   'center', $style, $size);
               $table->addRow();
               $table->addCell('Estágio 2',                                               'left', $row_style, $size);
               $table->addCell('Fase de insuficiência renal funcional ou leve',           'left', $style, $size*4 +5);
               $table->addCell('0,9% da população de 20 anos e mais ',                    'left', $style, $size*3 +3);
               $table->addCell(ceil($this->aux*0.009),                                   'center', $style, $size);
               $table->addRow();
               $table->addCell('Estágio 3',                                               'left', $row_style, $size);
               $table->addCell('Fase de insuficiência renal laboratieial ou moderada',    'left', $style, $size*4 +5);
               $table->addCell('1,5% da população de 20 anos e mais ',                    'left', $style, $size*3 +3);
               $table->addCell(ceil($this->aux*0.015),                                   'center', $style, $size);
               $table->addRow();
               $table->addCell('Estágio 4',                                               'left', $row_style, $size);
               $table->addCell('Fase de insuficiência renal clínica ou severa',           'left', $style, $size*4 +5);
               $table->addCell('0,1% da população de 20 anos e mais ',                    'left', $style, $size*3 +3);
               $table->addCell(ceil($this->aux*0.001),                                   'center', $style, $size);
               $table->addRow();
               $table->addCell('Estágio 5',                                               'left', $row_style, $size);
               $table->addCell('Fase terminal de insuficiência renal crônica',            'left', $style, $size*4 +5);
               $table->addCell('Vide tabela abaixo ',                                     'left', $style, $size*4 +3);
          }

          public function section_2_8_B($table, $row_style, $style, $size)
          {
               $this->aux = $this->pop_var*0.6699;

               $table->addRow();
               $table->addCell('Incidência anual estimada de pacientes novos',       'left', $row_style, $size*5);
               $table->addCell('0,014% da população com 20 anos e mais',             'left', $style, $size*3 +4);
               $table->addCell(ceil($this->aux*0.00014),                             'center', $style, $size +4);

               $table->addRow();
               $table->addCell('Prevalência estimada de pacientes',                  'left', $row_style, $size*5);
               $table->addCell('0,075% da população com 35 anos e mais',             'left', $style, $size*3 +4);
               $table->addCell(ceil($this->aux*0.00075),                             'center', $style, $size +4);

               $table->addRow();
               $table->addCell('Óbitos estimados',                                   'left', $row_style, $size*5);
               $table->addCell('0,012% da população com 35 anos e mais',             'left', $style, $size*3 +4);
               $table->addCell(ceil($this->aux*0.00013),                             'center', $style, $size +4);
          }

          public function section_2_8_C($table, $row_style, $style, $size)
          {
               $this->aux = $this->pop_var*0.6699;

               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Análise de carac. físicos, elem. e sedimentos da urina',            'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*4),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Microalbuminuria',                                                  'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*2),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*2),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Dosagem de sódio sérico',                                           'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*0),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Dosagem de potássio sérico',                                        'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*4),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Gasometria venosa',                                                 'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*2),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Dosagem de creatina',                                               'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*2),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*4),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Dosagem de hemoglobina',                                            'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*4),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Dosagem de hematócrito',                                            'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*4),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Dosagem de paratormonio sérico',                                    'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*2),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Dosagem de cálcio ionico sérico',                                   'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*4),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Dosagem de albumina sérica',                                        'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*2),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Ferritina',                                                         'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*4),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Índice de saturação de transferrina',                               'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*4),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Pesquisa de anticorpos Anti-HIV (western blot)',                    'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*0),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Uréia',                                                             'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*2),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*4),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Fósforo',                                                           'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*4),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('AntiHbs',                                                           'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*1),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('AntiHcv',                                                           'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*0),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('HBsAg',                                                             'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*0),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Laboratorial',                                                      'left', $row_style, $size+2);
               $table->addCell('Vitamina D',                                                        'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*0),                                            'center', $style, $size-1);
               $table->addRow();
               $table->addCell('Imagem',                                                            'left', $row_style, $size+2);
               $table->addCell('Ultrassom rins e vias urinarias',                                   'left', $style, $size*5 -1);
               $table->addCell(ceil($this->aux*0.121*1),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.096*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.009*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.015*0),                                            'center', $style, $size-1);
               $table->addCell(ceil($this->aux*0.001*1),                                            'center', $style, $size-1);

          }

          public function section_2_9_A($table, $row_style, $style, $size)
          {
               $this->aux = ($this->pop_var*0.0568 + $this->pop_var*0.0246)*0.00053;

               $table->addRow();
               $table->addCell('Casos novos de DAOP (incid.)',                                      'left', $row_style, $size*3);
               $table->addCell('0,053% da população: Homens de 55 a 74 e Mulheres de 65 a 74 anos', 'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux),                                                    'center', $style, $size);

          }

          public function section_2_9_B($table, $row_style, $style, $size)
          {
               $this->aux = ($this->pop_var*0.0568 + $this->pop_var*0.0246)*0.00053;

               $table->addRow();
               $table->addCell('Patologia clínica',                                                 'left', $row_style, $size*3);
               $table->addCell('Análise de caracteres físicos, elementos e sedimentos da urina',    'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux*1),                                                  'center', $style, $size);
               $table->addRow();
               $table->addCell('Patologia clínica',                                                 'left', $row_style, $size*3);
               $table->addCell('Dosagem de colesterol HDL',                                         'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux*1),                                                  'center', $style, $size);
               $table->addRow();
               $table->addCell('Patologia clínica',                                                 'left', $row_style, $size*3);
               $table->addCell('Dosagem de colesterol LDL',                                         'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux*1),                                                  'center', $style, $size);
               $table->addRow();
               $table->addCell('Patologia clínica',                                                 'left', $row_style, $size*3);
               $table->addCell('Dosagem de triglicerídios',                                         'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux*1),                                                  'center', $style, $size);
               $table->addRow();
               $table->addCell('Patologia clínica',                                                 'left', $row_style, $size*3);
               $table->addCell('Dosagem de creatina',                                               'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux*1),                                                  'center', $style, $size);
               $table->addRow();
               $table->addCell('Imagem',                                                            'left', $row_style, $size*3);
               $table->addCell('Ultrassom Doppler colorida de vasos - membros inferiores',          'left', $style, $size*6 +2);
               $table->addCell(ceil($this->aux*0.7),                                                'center', $style, $size);

          }

          public function section_2_10_A($table, $row_style, $sub_style, $style, $size)
          {
               $this->aux = $this->pop_var*0.4122*0.0085;

               $table->addRow();
               $table->addCell('Casos novos de DPOC (incidência)',                                  'left', $row_style, $size*4);
               $table->addCell('0,85% da população de 35 anos e mais',                              'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux),                                                    'center', $style, $size);
               $table->addRow();
               $table->addCell('RISCO', 'center', $sub_style, 24);
               $table->addCell('Parâmetro', 'center', $sub_style, 32);
               $table->addCell('Parâmetro', 'center', $sub_style, 6);
               $table->addRow();
               $table->addCell('Grau I (leve)',                                                     'left', $row_style, $size*4);
               $table->addCell('64% da população alvo com DPOC',                                    'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.64),                                               'center', $style, $size);
               $table->addRow();
               $table->addCell('Grau II (moderado)',                                                'left', $row_style, $size*4);
               $table->addCell('29,7% da população alvo com DPOC',                                  'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.297),                                              'center', $style, $size);
               $table->addRow();
               $table->addCell('Grau III e IV (grave e muito grave)',                               'left', $row_style, $size*4);
               $table->addCell('6,3% da população alvo com DPOC',                                   'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.063),                                              'center', $style, $size);
               $table->addRow();
               $table->addCell('Total',                                                             'left', $row_style, $size*4);
               $table->addCell('0,85% da população com 65 anos e mais',                             'left', $style, $size*5 +2);
               $table->addCell(ceil($this->aux),                                                    'center', $style, $size);
          }

          public function section_2_10_B($table, $row_style, $style, $size)
          {
               $this->aux = $this->pop_var*0.4122*0.0085;

               $table->addRow();
               $table->addCell('Exames clínicos na AB',                                             'left', $row_style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                                  'center', $style, $size*2);
               $table->addCell('',                                                                  'center', $style, $size);
               $table->addCell('',                                                                  'center', $style, $size);
               $table->addCell('',                                                                  'center', $style, $size);
               $table->addRow();
               $table->addCell('Espirometria/prova de função pulmonar completa* na AB',             'left', $row_style, $size*5 +2);
               $table->addCell(ceil($this->aux*0.25),                                               'center', $style, $size*2);
               $table->addCell('',                                                                  'center', $style, $size);
               $table->addCell('',                                                                  'center', $style, $size);
               $table->addCell('',                                                                  'center', $style, $size);
               $table->addRow();
               $table->addCell('Raio X de tórax em 2 incidencias (PA e perfil)',                    'left', $row_style, $size*5 +2);
               $table->addCell(ceil($this->aux*1),                                                  'center', $style, $size*2);
               $table->addCell('',                                                                  'center', $style, $size);
               $table->addCell('',                                                                  'center', $style, $size);
               $table->addCell('',                                                                  'center', $style, $size);
               $table->addRow();
               $table->addCell('Vacinação Anti-pneumocócica e contra influenza',                    'left', $row_style, $size*5 +2);
               $table->addCell('',                                                                  'center', $style, $size*2);
               $table->addCell(ceil($this->aux*0.64*1),                                             'center', $style, $size);
               $table->addCell(ceil($this->aux*0.297*1),                                            'center', $style, $size);
               $table->addCell(ceil($this->aux*0.063*1),                                            'center', $style, $size);
               $table->addRow();
               $table->addCell('Acompanhamento clínico',                                            'left', $row_style, $size*5 +2);
               $table->addCell('',                                                                  'center', $style, $size*2);
               $table->addCell(ceil($this->aux*0.64*1),                                             'center', $style, $size);
               $table->addCell(ceil($this->aux*0.297*1),                                            'center', $style, $size);
               $table->addCell(ceil($this->aux*0.063*1),                                            'center', $style, $size);
               $table->addRow();
               $table->addCell('Consulta médica em atenção especializada',                          'left', $row_style, $size*5 +2);
               $table->addCell('',                                                                  'center', $style, $size*2);
               $table->addCell('',                                                                  'center', $style, $size);
               $table->addCell(ceil($this->aux*0.297*1),                                            'center', $style, $size);
               $table->addCell(ceil($this->aux*0.063*1),                                            'center', $style, $size);
               $table->addRow();
               $table->addCell('Espirometria/prova de função pulmonar completa*',                   'left', $row_style, $size*5 +2);
               $table->addCell('',                                                                  'center', $style, $size*2);
               $table->addCell(ceil($this->aux*0.64*1),                                             'center', $style, $size);
               $table->addCell(ceil($this->aux*0.297*1),                                            'center', $style, $size);
               $table->addCell(ceil($this->aux*0.063*1),                                            'center', $style, $size);

          }

          public function section_3_1_A($table, $row_style, $sub_style, $style, $size)
          {
               $this->aux =
               (
                    $this->pop_var*0.030 + $this->pop_var*0.033 + $this->pop_var*0.035 + $this->pop_var*0.040 +
                    $this->pop_var*0.044 + $this->pop_var*0.045 + $this->pop_var*0.045 +
                    $this->pop_var*0.032 + $this->pop_var*0.035 + $this->pop_var*0.037 + $this->pop_var*0.042 +
                    $this->pop_var*0.045 + $this->pop_var*0.045 + $this->pop_var*0.044
               ) * 0.005;

               $table->addRow();
               $table->addCell('Prevalência de 0,5% da população de 15 a 45 anos com diag. de HIV',                               'left', $row_style, $size*8 +4);
               $table->addCell(ceil($this->aux),                                                                                  'center', $style, $size +4);
               $table->addRow();
               $table->addCell('AÇÕES: Acompanhamento - abordagem inicial',                                                       'center', $sub_style, $size*10 +2);
               $table->addRow();
               $table->addCell('Níveis de atenção : AB, AAE',                                                                     'center', $sub_style, $size*10 +2);
               $table->addRow();
               $table->addCell('Procedimento',                                                                                    'center', $sub_style, $size+2);
               $table->addCell('Critérios e/ou parâmetros propostos',                                                             'center', $sub_style, $size*7 +2);
               $table->addCell('Prevalência',                                                                                     'center', $sub_style, $size+4);
               $table->addRow();
               $table->addCell('Acolhimento',                                                                                     'left', $row_style, $size+2);
               $table->addCell('Pacientes estáveis consulta médica/caso de 6/6 meses, se não, reduzir intervalo das consultas' ,  'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*2) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Hemograma completo - 01 exame/caso/ano' ,                                                         'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Contagem de Linfócitos T CD4/CD8 - 01 exame/caso/ano' ,                                           'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('1 Exame de avaliação hepática e renal (AST, ALT, Cr, Ur, Na, K, exame básico de urina) /caso/ano','left', $row_style, $size*9);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Dosagem de Transaminase Glutamico-oxalacetica (TGO) AST' ,                                        'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Dosagem de Transaminase Glutamico-piruvica (TGP) ALT' ,                                           'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Dosagem de creatina' ,                                                                            'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Uréia' ,                                                                                          'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Dosagem de sódio sérico' ,                                                                        'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Dosagem de potássio sérico' ,                                                                     'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Análise de caracteres físicos, elementos e sedimentos da urina' ,                                 'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Pesquisa de ovos e cistos de parasitas (parasitológico de fezes)/caso/ano' ,                      'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Teste de VDRL para detecção de sífilis*' ,                                                        'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Pesquisa de ovos e cistos de parasitas(parasitológico de fezes)/caso/ano' ,                       'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Pesquisa de anticorpo IGG Antitoxoplasma(sorologia para toxoplasmose)caso/ano' ,                  'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Pesquisa de anticorpo anti HTVL I e HTVL II /caso/ano' ,                                          'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Pesquisa de tripanossoma' ,                                                                       'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('1 Exame para dosagem de lipídios /caso/ano',                                                      'left', $row_style, $size*9);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Dosagem de colesterol HDL' ,                                                                      'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Dosagem de colesterol LDL' ,                                                                      'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Dosagem de colesterol total' ,                                                                    'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Dosagem de triglicerídios' ,                                                                      'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Dosagem de glicose' ,                                                                             'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Intradermoreação com derivado proteico purificado PPD (Prova tuberculínica)' ,                    'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Raio X de torax em 2 incidenciais (PA e perfil) 01 exame/caso/ano' ,                              'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Realizar os exames abaixo que fazem parte da abordagem inicial',                                  'center', $sub_style, $size*10 +2);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('AntiHcv' ,                                                                                        'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Pesquisa de anticorpos IGG contra o virus da hepatite A (HAV-IGG)' ,                              'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Pesquisa de anticorpos IGM contra o virus da hepatite A (HAV-IGM)' ,                              'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('HBsAg' ,                                                                                          'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Pesquisa de anticorpos IGG e IGM contra antigeno central do virus da hepatite B anti-HBcT' ,      'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('AntiHbs' ,                                                                                        'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
               $table->addRow();
               $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
               $table->addCell('Pesquisa de Anticorspo IGG Antitoxoplasma (Sorologia para toxoplasmose (IgG) ' ,                  'left', $style, $size*7 +2);
               $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);



               //$table->addCell('Consulta médica - início do tratamento e sequenciamento realizado na AAE. *' , 'center', $sub_style);
          }

          public function section_3_1_B($table, $row_style, $sub_style, $style, $size)
          {
            $this->aux =
            (
                 $this->pop_var*0.030 + $this->pop_var*0.033 + $this->pop_var*0.035 + $this->pop_var*0.040 +
                 $this->pop_var*0.044 + $this->pop_var*0.045 + $this->pop_var*0.045 +
                 $this->pop_var*0.032 + $this->pop_var*0.035 + $this->pop_var*0.037 + $this->pop_var*0.042 +
                 $this->pop_var*0.045 + $this->pop_var*0.045 + $this->pop_var*0.044
            ) * 0.005;

            $table->addRow();
            $table->addCell('Prevalência de 0,5% da população de 15 a 45 anos com diag. de HIV',                               'left', $row_style, $size*8 +4);
            $table->addCell(ceil($this->aux),                                                                                  'center', $style, $size +4);
            $table->addRow();
            $table->addCell('AÇÕES: Consulta médica - início tratamento e sequenciamento realizado na AAE.',                   'center', $sub_style, $size*10 +2);
            $table->addRow();
            $table->addCell('(A rede pode se organizar para o manejo do paciente ser realizado na AB)',                        'center', $sub_style, $size*10 +2);
            $table->addRow();
            $table->addCell('Níveis de atenção : AB, AAE',                                                                     'center', $sub_style, $size*10 +2);
            $table->addRow();
            $table->addCell('Procedimento',                                                                                    'center', $sub_style, $size+2);
            $table->addCell('Critérios e/ou parâmetros propostos',                                                             'center', $sub_style, $size*7 +2);
            $table->addCell('Prevalência',                                                                                     'center', $sub_style, $size+4);
            $table->addRow();
            $table->addCell('Consulta médica¹',                                                                                'left', $row_style, $size+2);
            $table->addCell('01 consulta médica/caso/ano' ,                                                                    'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Consulta médica²',                                                                                'left', $row_style, $size+2);
            $table->addCell('Pacientes estáveis consulta médica/caso de 6/6 meses, se não, diminuir o intervalo das consultas','left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*2) ,                                                                               'center', $style, $size +4);

            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Hemograma completo/caso a cada 3 a 6 meses' ,                                                     'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*4) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Contagem de Linfócitos T CD4/CD8 /caso de 6/6meses ³' ,                                           'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*2) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Determinação de carga viral do HIV por RT-PCR/caso/ cada 3-6 meses' ,                             'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*4) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('01 exames/ano para avaliação hepática e renal /caso/ano',                                         'left', $row_style, $size*9);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de Transaminase Glutamico-oxalacetica (TGO) AST' ,                                        'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de Transaminase Glutamico-piruvica (TGP) ALT' ,                                           'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de creatinina' ,                                                                          'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Uréia' ,                                                                                          'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de sódio sérico' ,                                                                        'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de potássio serico' ,                                                                     'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Analise de sedimento urinário' ,                                                                  'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Clearance de creatinina - 03 exames ou Taxa de Filtração Glomerular/ caso/ano' ,                  'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*3) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('01 exame de Escore de risco cardiovascular de Framinghan/caso/ano' ,                              'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Intradermoreação com derivado proteico purificado (PPD) Prova tuberculínica /caso/ano' ,          'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Teste de VDRL para detecção de sífilis /caso/ano' ,                                               'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('ADICIONAR MULTICELL',                                                                             'left', $row_style, $size*7 +2);
            //$Mtable = $table->getNativeWriter();
            //$Mtable->MultiCell(70, 5,utf8_decode('Teste de VDRL para detecção de sífilis- Realizar controle com testes sorológicos não treponêmicos/paciente diagnosticado com sífilis após tratamento a cada 3 meses durante o primeiro ano e, se ainda houver reatividade em titulações decrescentes, deve-se manter o acompanhamento a cada 6 meses até estabilização'),1,'L', false);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('01 exame de dosagem de Lipídios/caso/ano',                                                        'left', $row_style, $size*9);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de colesterol HDL' ,                                                                      'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de colesterol LDL' ,                                                                      'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de colesterol total' ,                                                                    'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de triglicerídeos' ,                                                                      'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('No PCDT está 6/6 meses',                                                                          'center', $row_style, $size*10 +2);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de colesterol HDL' ,                                                                      'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*2) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de colesterol LDL' ,                                                                      'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*2) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de colesterol total' ,                                                                    'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*2) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de triglicerídeos' ,                                                                      'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*2) ,                                                                               'center', $style, $size +4);
            $table->addRow();
            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('Dosagem de glicose' ,                                                                             'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*1) ,                                                                               'center', $style, $size +4);
            $table->addRow();

            $table->addCell('Exame',                                                                                           'left', $row_style, $size+2);
            $table->addCell('02 exames (Fundo de olho) para indivíduos com LT-CD4+ < que 50 células/mm3 /caso/ano' ,           'left', $style, $size*7 +2);
            $table->addCell(ceil($this->aux*2) ,                                                                               'center', $style, $size +4);
            $table->addRow();










          }

    }
