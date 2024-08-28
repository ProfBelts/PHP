<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Greetings extends CI_Controller {
  public function index()
  {
    $this->load->view('greetings/index');
  }
  public function show()
  {
 
   $this->hi();
  }

  public function hi()
  {
    echo "hi";
  }


}
?> 