<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Speaker
 *
 * @author tunjiakinde
 */
class Speaker extends Connection {
    function __construct()
    {
        parent::__construct();
    }
    
    function getAllSpeakers()
    {
        $result = $this->db->query("SELECT * FROM speakers;");
        if($result->num_rows>0)
            {
               $obj = $result->fetch_object();
               $return_res["action"] = TRUE;
               $return_res['data']=$obj;
               return $return_res; 
            }
           else
               {
                    return "{'action':false}";
               }
    }
}
