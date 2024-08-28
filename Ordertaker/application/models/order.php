<?php 

class Order extends CI_Model
{
    public function select_all_orders()
    {
        return $this->db->query("Select * FROM orders")->result_array();
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

}

?>