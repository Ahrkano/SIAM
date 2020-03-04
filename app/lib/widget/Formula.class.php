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

        // section 1 params
        
        public $total_ges;              // estimativa total de gestantes
        public $grh;                    // gestantes de risco habitual
        public $gar;                    // gestantes de alto risco
        public $total_nasc;             // estimativa do numero total de recem nascidos
        public $total_c_1;              // estimativa do numero total de criancas de 0 a 12 meses
        public $total_c_2;              // estimativa do numero total de criancas de 12 a 24 meses
        public $pop_f_f;                // populacao feminina em idade fertil



        public function __construct($total_population, $total_born)
        {
            $this->pop_var              = $total_population;
            $this->born_var             = $total_born;
            // section 1 params
            $this->total_ges            =  $this->pop_var * 1.05;
            $this->grh                  =  $this->total_ges * 0.85;
            $this->gar                  =  $this->total_ges * 0.15;
            $this->total_nasc           =  $this->pop_var * 1.05;
            $this->total_c_1            =  $this->pop_var + ( $this->pop_var * 0.99);
            $this->total_c_2            =  $this->pop_var + ( $this->pop_var * 0.98);
            $this->pop_f_f              =  $this->born_var * 0.33;
        }
   
       public function new_table_row($table, $row_style, $style, $size, $text, $pop)
       {
           $table->addRow();
           $table->addCell($text, 'left', $row_style, $size);
           $table->addCell($pop,  'center', $style);
       }

       public function section_1_A($table, $row_style, $style, $size)
       {

            $this->new_table_row($table, $row_style, $style, $size, 'Estimativa total de gestantes',  $this->total_ges);
            $this->new_table_row($table, $row_style, $style, $size, 'Gestante de risco habitual',  $this->grh);
            $this->new_table_row($table, $row_style, $style, $size, 'Gestante de alto risco',  $this->gar);
            $this->new_table_row($table, $row_style, $style, $size, 'Estimativa de número total de recem nascidos',  $this->total_nasc);
            $this->new_table_row($table, $row_style, $style, $size, 'Estimativa de número total de crianças de 0 a 12 meses',  $this->total_c_1);
            $this->new_table_row($table, $row_style, $style, $size, 'Estimativa de número total de crianças de 12 a 24 meses',  $this->total_c_2);
            $this->new_table_row($table, $row_style, $style, $size, 'População feminina em idade fértil',  $this->pop_f_f);
                
       }

       public function section_1_B($table, $row_style, $style, $size)
       {

            $this->new_table_row($table, 'value', $style, 4, 'Consulta de pré natal (consulta médica)', $this->total_ges*3);
            $this->new_table_row($table, 'value', $style, 4, 'Consulta pueperal (Consulta médica)', $this->total_ges*1);
            $this->new_table_row($table, 'value', $style, 4, 'Consulta de pré natal (consulta de enfermagem)', $this->total_ges*3);
            $this->new_table_row($table, 'value', $style, 4, 'Consulta odontologica na atenção básica', $this->total_ges*1);
            $this->new_table_row($table, 'value', $style, 4, 'Atividade Educativa/Orientação em grupo', $this->total_ges*4);
            $this->new_table_row($table, 'value', $style, 4, 'Determinação direta e reversa de grupo ABO', $this->total_ges*1);
            $this->new_table_row($table, 'value', $style, 4, 'Pesquisa de fator RH', $this->total_ges*1);
            $this->new_table_row($table, 'value', $style, 4, 'Teste ind. de antiglobulina humana Teste Coombs ind. p/ RH neg.', $this->total_ges*0.3);
            $this->new_table_row($table, 'value', $style, 4, 'Análise de caracteres físicos, elementos e sedimentos de urina', $this->total_ges*2);
            $this->new_table_row($table, 'value', $style, 4, 'Dosagem de glicose', $this->total_ges*2);
            $this->new_table_row($table, 'value', $style, 4, 'Dosagem proteinúria - fita reagente', $this->total_ges*0.3);
            $this->new_table_row($table, 'value', $style, 4, 'VDRL p/ detecção de sífilis em gestante', $this->total_ges*2);
            $this->new_table_row($table, 'value', $style, 4, 'Hematócrito', $this->total_ges*2);
            $this->new_table_row($table, 'value', $style, 4, 'Dosagem de hemoglobina', $this->total_ges*2);
            $this->new_table_row($table, 'value', $style, 4, 'Pesquisa de anticorpos IGM Antioxoplasma', $this->total_ges*1);
            $this->new_table_row($table, 'value', $style, 4, 'HBsAg', $this->total_ges*1);
            $this->new_table_row($table, 'value', $style, 4, 'Pesquisa de Anticorpos Anti-HIV1 + HIV2 (Elisa)', $this->total_ges*2);
            $this->new_table_row($table, 'value', $style, 4, 'Eletroforese de hemoglobina', $this->total_ges*1);
            $this->new_table_row($table, 'value', $style, 4, 'Ultrasonografia obstétrica', $this->total_ges*1);
            $this->new_table_row($table, 'value', $style, 4, 'Exame citopatologico cérvico-vaginal/microflora', $this->total_ges*1);
            $this->new_table_row($table, 'value', $style, 4, 'Cultura de bactérias para identificação', $this->total_ges*1);
            
       }

       public function section_1_C($table, $row_style, $style, $size)
       {
            $this->new_table_row($table, 'value', $style, 4, 'Consulta médica em atenção especializada', $this->gar*5);
            $this->new_table_row($table, 'value', $style, 4, 'Determinação de curva glicêmica clássica - Teste de tol. à glicose', $this->gar*1);
            $this->new_table_row($table, 'value', $style, 4, 'ECG - Eletrocardiograma', $this->gar*0.3);
            $this->new_table_row($table, 'value', $style, 4, 'Ultrassonografia obstétrica com Doppler colorido e pulsado', $this->gar*1);
            $this->new_table_row($table, 'value', $style, 4, 'Ultrassonografia obstétrica', $this->gar*2);
            $this->new_table_row($table, 'value', $style, 4, 'Tococardiografia ante-parto', $this->gar*1);
            $this->new_table_row($table, 'value', $style, 4, 'Contagem de plaquetas', $this->gar*0.3);
            $this->new_table_row($table, 'value', $style, 4, 'Uréria', $this->gar*1);
            $this->new_table_row($table, 'value', $style, 4, 'Dosagem de creatina', $this->gar*1);
            $this->new_table_row($table, 'value', $style, 4, 'Dosagem de ácido úrico', $this->gar*1);
            $this->new_table_row($table, 'value', $style, 4, 'Consulta de profissional de nível superior - Psicossocial', $this->gar*1);
            $this->new_table_row($table, 'value', $style, 4, 'Dosagem de proteínas totais', $this->gar*1);
       }

       public function section_1_D($table, $row_style, $style, $size)
       {
            $this->new_table_row($table, 'value', $style, 4, 'Visita domiciliar por profissional de nível superior', $this->total_nasc*1);
            $this->new_table_row($table, 'value', $style, 4, 'Consulta médica em atenção especializada (RN > 2500g)', $this->total_nasc*0.92*3);
            $this->new_table_row($table, 'value', $style, 4, 'Consulta de profissional de nivel superior na atenção básica (RN > 2500g)', $this->total_nasc*0.92*4);
            $this->new_table_row($table, 'value', $style, 4, 'Consulta médica em atenção especializada (RN < 2500g)', $this->total_nasc*0.08*7);
            $this->new_table_row($table, 'value', $style, 4, 'Consulta de profissional de nivel superior na atenção básica (RN < 2500g)', $this->total_nasc*0.08*6);
            $this->new_table_row($table, 'value', $style, 4, 'Acompanhamento específico do RN egresso de UTI até 24 meses', 'De acordo com a necessidade');
            $this->new_table_row($table, 'value', $style, 4, 'Vacinação básica', 'Ver protocolo de vacinação');
            $this->new_table_row($table, 'value', $style, 4, 'Teste do pezinho (até o 7º dia)', $this->total_nasc*1);
            $this->new_table_row($table, 'value', $style, 4, 'Teste da orelhinha', $this->total_nasc*1);
            $this->new_table_row($table, 'value', $style, 4, 'Teste do olhinho (4º, 6º, 12º e 25º meses)', $this->total_nasc*1);
            $this->new_table_row($table, 'value', $style, 4, 'Sulfato ferroso', 'Profilaxia de 6 a 18 meses');
            $this->new_table_row($table, 'value', $style, 4, 'Vitamina A', 'Em área endêmica');
            $this->new_table_row($table, 'value', $style, 4, 'Consulta de profissional de nivel superior na atenção básica (consulta odontológica)', $this->total_c_1*2);
            $this->new_table_row($table, 'value', $style, 4, 'Exames (apoio diagnóstico e terapêutico)', 'De acordo com diagnóstico');
            $this->new_table_row($table, 'value', $style, 4, 'Consulta médica em atenção especializada (consulta de especialidades)', 'De acordo com diagnóstico');
            $this->new_table_row($table, 'value', $style, 4, 'Consulta/Atendimento de reabilitação', 'De acordo com diagnóstico');
            $this->new_table_row($table, 'value', $style, 4, 'Atividade educativa/Orientação em grupo na atenção básica', '2 a.e/população coberta/ano');
       }

       
    }