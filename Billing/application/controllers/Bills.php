<?php 

class Bills extends CI_Controller
{

    public function index()
    {
        $this->load->model("bill");
     
     
        $view_data = array(
        "billing" =>  $this->bill->show_default()

        );

        $this->load->view("billing/index" , $view_data);
    }

  public function show_billing()
{
    $this->load->model("bill");
    $validation_result = $this->bill->validate();

    if ($validation_result === true) {   
        // Validation passed, proceed with further processing
        $start_date = $this->input->post("start_date");
        redirect("/");
        // echo "wtf";
    
    } else {
        // Validation failed, handle validation errors
        foreach ($validation_result as $error) {
            echo $error;
        }
    }
}


    // if ($validation_result !== true) {
    //     // Display validation errors
    //     $errors = $this->session->flashdata("error");

    //     foreach($errors as $error) 
    //     {
    //         echo $error;
    //     }

    // } else {
    //     // Proceed with further processing
    //     // ...
    // }
    // }

}



?>