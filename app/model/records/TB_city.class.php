<?php
/**
 * TB_city Active Record
 * @author  Alexandre Pontes
 */
class TB_city extends TRecord
{
    const TABLENAME = 'tb_city';
    const PRIMARYKEY= 'tb_city_id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($tb_city_id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($tb_city_id, $callObjectLoad);
        parent::addAttribute('tb_city_name');
    }
/*
    public function get_tb_city_name()
    {
        return $this->tb_city_name;
    }
*/
}