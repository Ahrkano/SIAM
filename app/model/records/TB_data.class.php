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
    }
    
    /**
     * Returns the city
     */
    public function get_tb_city()
    {
        return TB_city::find($this->tb_data_tb_city_id);
        
    }

    public function get_tb_city_name()
    {
        // loads the associated object
        if (empty($this->tb_city))
            $this->cityname = new TB_city($this->tb_city_id);
    
        // returns the associated object
        return $this->cityname;
    }
    
    /* 

    public function get_tb_city_name()
    {
        // loads the associated object
        if (empty($this->tb_city))
            $this->tb_data_tb_city_id = new TB_city($this->tb_city_id);
    
        // returns the associated object
        return $this->tb_data_tb_city_id->tb_city_name;
    }
    */
}