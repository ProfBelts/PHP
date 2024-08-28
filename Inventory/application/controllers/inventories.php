<?php 

class Inventories extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("inventory");

    }

    public function index()
    {
   
       $this->load->view("inventory/index");
    }

    public function index_html()
    {   
       
        $view_data = array(
            "items" => $this->inventory->select_all_inventory($this->session->userdata("option")),
            "page" => $this->input->get("page")
        );

        $this->session->set_userdata("current_page", $this->input->get("page"));

        $this->load->view("partials/index", $view_data); 
    }



    public function search_item()
    {
        $search_key = $this->input->get('key');

        $result["items"] = $this->inventory->search_result($search_key);

        $this->load->view("partials/search_partials", $result);
    }
    
    public function sort_option()
    {
        $option_value = $this->input->get("option");
        $this->session->set_userdata("option", $option_value);

        $page = $this->session->flashdata("current_page");
      
        // Fetch sorted items for the current page
        $items = $this->inventory->sorted_result($option_value);
    
        $view_data = array(
            "items" => $items,
            "page" => $page
        );
    
        $this->load->view("partials/inventory_partials", $view_data);
    }
    


    public function pagination()
    {
        $view_data = array(
            "items" => $this->inventory->select_all_inventory($this->session->flashdata("option")),
            "page" => $this->session->userdata("page")
        );
        $this->load->view("partials/pagination", $view_data);
    }


}

?>