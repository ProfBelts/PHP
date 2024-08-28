<?php 

class Inventory extends CI_Model
{
    public function select_all_inventory($option)
    {   
        if($option === "high")
        {
            return $this->db->query("Select * from inventory ORDER BY price DESC")->result_array();
        } else {

            return $this->db->query("Select * from inventory ORDER BY price")->result_array();
        } 
        
        
    }

    public function create_order($data)
    {
        $query = "Insert INTO orders (order_name, created_at) VALUES (?, NOW())";
        $values = array(
            $data["orders"]
        );

        return $this->db->query($query, $values);
    }

    public function update_order($post)
    {
        $query = "UPDATE orders SET order_name = ?, updated_at = NOW() WHERE id = ?";
        $values = array(
            $post["edited_order"],
            $post["order_id"]
        );
        
        return $this->db->query($query, $values);
    }

    public function delete_order($id)
    {
        return $this->db->query("DELETE FROM orders WHERE id = ?", array($id));
    }

    public function search_result($key)
    {
        // Sanitize the key to prevent SQL injection (assuming you're using CodeIgniter)
        $key = $this->db->escape_like_str($key);
    
        // Perform the search query using the provided key
        $query = "SELECT * FROM inventory WHERE name LIKE '$key%'";
        return $this->db->query($query)->result_array();
    }
    
    public function sorted_result($option)
    {
       
        if($option === "high")
        {
            return $this->db->query("Select * from inventory ORDER BY price DESC")->result_array();
        } 
        
        if($option == "low") {
            return $this->db->query("Select * from inventory ORDER BY price")->result_array();
        }
    }
    
    

}

?>