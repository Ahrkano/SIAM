<?php
/**
 * TB_data Active Record
 * @author  Alexandre Pontes
 */
class TB_data extends TRecord
{
    const TABLENAME     = 'tb_data';
    const PRIMARYKEY    = 'tb_data_id';
    const IDPOLICY      =  'max'; // {max, serial}

    private $cityname;

    /**
     * Constructor method
     */
    public function __construct($tb_data_id = NULL)
    {
        parent::__construct($tb_data_id);
        parent::addAttribute('tb_data_tb_city_id');
        parent::addAttribute('tb_data_year');
        parent::addAttribute('tb_data_pop');
        parent::addAttribute('tb_data_born');
        parent::addAttribute('tb_data_hep_vulne');
        parent::addAttribute('tb_data_hepB_sem');
        parent::addAttribute('tb_data_hepB_com');
        parent::addAttribute('tb_data_hepC_pop');
        parent::addAttribute('tb_data_hepC_sem');
        parent::addAttribute('tb_data_hepC_com');
        parent::addAttribute('tb_data_hans_pop');
        parent::addAttribute('tb_data_hans_pauci');
        parent::addAttribute('tb_data_hans_multi');
        parent::addAttribute('tb_data_hans_prev');
    }
    
    /**
     * Returns the city
     */
    public function get_tb_city()
    {
        return TB_city::find($this->tb_data_tb_city_id);
    }

}