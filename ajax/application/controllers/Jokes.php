<?php 

class Jokes extends CI_Controller
{
    public function index()
    {
        $this->load->model("joke");
    
        $view_data = array(
            "jokes" => $this->joke->show_jokes()
        );
        $this->load->view("jokes/index", $view_data);
    }
    
 
    public function sort()
    {
        $sort_option = $this->input->get('sort');
        
        $this->load->model("joke");
        
        $result['jokes'] = $this->joke->sorted_jokes($sort_option);
   
        
        $this->load->view("partials/sorted-jokes", $result);

   
    }
    
  public function new()
  {
    $this->load->view("jokes/new");
  }


  public function show($id)
  { 
    $this->load->model("joke");
    
    $view_data = array(
        "joke" => $this->joke->show_joke_by_id($id)
    );

    $this->load->view("jokes/show", $view_data);
  }


  public function process_add_jokes()
  {
    $this->load->model("joke");

    $result = $this->joke->validate_jokes();

    if($result !== null) 
    {
       var_dump($result);
    } else {
       $this->joke->create_jokes($this->input->post());

       redirect("/");
    }
  }

  function delete($id)
  { 
    $view_data = array(
      "id" => $id
    );

    $this->load->view("jokes/destroy", $view_data);
  }


  function process_delete_joke()
  {
    $back = $this->input->post("back");
    $delete = $this->input->post("delete");
    $id = $this->input->post("joke_id");

    if($back)
    {
      redirect("jokes/show/" . $id);
    } 

    if($delete) 
    {
      $this->load->model("joke");
      $this->joke->delete_joke($id);

      redirect("/");
    }

  }


}
?>