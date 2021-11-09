<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RESTException extends \Exception {

    private $_options;

    public function __construct($message = '', $code = 0, $options = array(), Exception $previous = null) {
        parent::__construct($message, $code, $previous);
        
        $ci = &get_instance();
        $ci->db->trans_rollback();

        $this->_options = $options;
    }

    public function getOptions() {
        return $this->_options;
    }

}
