<?php 

class Shop extends CI_Model 
{
    function select_all()
    {
        return $this->db->query("Select * FROM products")->result_array();
    }


 function select_by_id($value)
 {
    return $this->db->query("Select * FROM products WHERE id = ?", array($value))->row_array();
 }


}



?>