<?php 

class Players extends CI_Controller
{
    public function index()
    {
        $this->load->model("Player");
        $searched_player = $this->session->flashdata("searched_player");
       

        if(!isset($searched_player)) 
        {
            $players = $this->Player->show_default(); 
        } 
        else 
        {
            $players = $searched_player;
        }
        
        $view_data = array(
            "players" => $players,
            "errors" =>  $this->session->flashdata("search_error")
        );

        $this->load->view("players/index", $view_data);
    }

    // Name is not necessarily required. But only validate when the user input URL or number
    public function search()
    {
        $this->load->model("Player");

        $post = $this->input->post();

        $result = $this->Player->validate($post);

        if ($result === FALSE) 
        {
            // Handle case when no search criteria are provided
            $this->session->set_flashdata("search_error", "No search criteria provided.");
        }
        else if ($result === NULL) 
        {
            // Handle case when no players are found matching the search criteria
            $this->session->set_flashdata("search_error", "No players found matching the search criteria.");
        }
        else 
        {
            // Players found, set flash data and redirect
            $this->session->set_flashdata("searched_player", $result);
        }

        redirect("/");
    }
}
?>
