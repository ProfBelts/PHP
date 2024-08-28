<?php 

class Order extends CI_Model
{

   public function submit_order($text)
   {
    $query = "INSERT INTO orders (order_name, created_at, updated_at) VALUES (?, NOW(), NOW())";
    $values = array($text);

    return $this->db->query($query, $values);

   }

   public function show_orders()
   {
      return $this->db->query("SELECT * FROM orders")->result_array();
   }


   

}


?>