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
        $view_data = array(
            "orders" => $this->order->show_orders()
        );
        $this->load->view("orders/index", $view_data);
    }

    // Regular form submission
    public function process_submit()
    {
        $this->order->submit_order($this->input->post("orders"));
        redirect("/");
    }

    // AJAX request for order creation
    public function create_order()
    {
        $new_order = $this->input->post("orders");
        $this->order->submit_order($new_order);

        $result["orders"] = $this->order->show_orders();
        $this->load->view("partials/orders", $result);
    }

    public function partials()
    {
      $result["orders"] = $this->order->show_orders();

      $this->load->view("partials/orders", $result);
    }


    // View for AJAX requests
    public function index_html()
    {
        $this->load->view("orders/ajax");
    }
}

?>
