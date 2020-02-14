<?php
/**
 * TB_data Active Record
 * @author  Alexandre Pontes
 */
class TB_data extends TRecord
{
    const TABLENAME = 'tb_data';
    const PRIMARYKEY= 'tb_data_id';
    const IDPOLICY =  'max'; // {max, serial}

    /**
     * Constructor method
     */
    public function __construct($tb_data_id = NULL)
    {
        parent::__construct($tb_data_id);
        parent::addAttribute('tb_data_tb_set_id');
        parent::addAttribute('tb_data_year');
        parent::addAttribute('tb_data_pop');
        parent::addAttribute('tb_data_born');
    }
    
    /**
     * Returns the set
     */
    public function get_tb_set()
    {
        return State::find($this->tb_data_tb_set_id);
    }
    
}