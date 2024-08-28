<?php 

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("order");
    }


    public function index()
    {
       
        $this->load->view("orders/index");
    }

    public function index_html()
    {
        $view_data = array (
            "orders" => $this->order->select_all_orders()
            );
      
        $this->load->view("partials/order_partials", $view_data);
    }


    public function create()
    {
        $this->order->create_order($this->input->post());

        $view_data = array(
            "orders" => $this->order->select_all_orders()
        );
        $this->load->view("partials/order_partials", $view_data);
        
    }

    public function update()
    {
        $this->order->update_order($this->input->post());
        
        $view_data = array(
            "orders" => $this->order->select_all_orders()
        );
        $this->load->view("partials/order_partials", $view_data);
    }

    public function delete()
    {
        $this->order->delete_order($this->input->post("order_id"));
        $view_data = array(
            "orders" => $this->order->select_all_orders()
        );
        $this->load->view("partials/order_partials", $view_data);
    }

}

?>