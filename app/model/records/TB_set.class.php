<?php
/**
 * TB_set Active Record
 * @author  Alexandre Pontes
 */
class TB_set extends TRecord
{
    const TABLENAME = 'tb_set';
    const PRIMARYKEY= 'tb_set_id';
    const IDPOLICY =  'max'; // {max, serial}
    
    
    /**
     * Constructor method
     */
    public function __construct($tb_set_id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($tb_set_id, $callObjectLoad);
        parent::addAttribute('tb_set_name');
    }


}