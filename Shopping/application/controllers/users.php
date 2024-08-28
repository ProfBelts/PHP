<?php


class Users extends CI_Controller
{


// NOTE: PASS THE VIEW DATA TO EACH RESPECTIVE METHODS THAT ARE RESPONSIBLE FOR RENDERING VIEW
// METHODS THAT HANDLE PROCESS ARE SEPARATE

    public function index()
    {
        $view_data = array(
            "errors" => $this->session->flashdata("error"),
            "success" => $this->session->flashdata("success")
        );
        $this->load->view("users/index", $view_data);

    }

    public function profile()
    {
        $view_data = array(
            "logged_in" => $this->session->userdata("logged_in", FALSE),
            "user" => $this->session->userdata("user")
        );

        $this->load->view("users/profile", $view_data);
    }



    public function register()
    {
        
        $this->load->library("form_validation");

        $config = $this->get_validation_config();

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE)
        {
            $view_data["errors"] = array(validation_errors());
            $this->session->set_flashdata("error", $view_data["errors"]);
            redirect("/");
        } else {
            $user_details = array(
                "first_name" => $this->input->post("first_name"),
                "last_name" => $this->input->post("last_name"),
                "contact_number" => $this->input->post("contact_number"),
                'email' => $this->input->post("email"),
                'password' => $this->input->post("password") 
            );

            $this->load->model("user");

            $this->user->add_user($user_details);

            $this->session->set_flashdata("success", "User successfuly registered.");

            redirect("/");
        }

    }

    public function login()
    {
      $this->load->library("form_validation");

      $config = $this->get_login_validation_config();

      $this->form_validation->set_rules($config);

      if($this->form_validation->run() == FALSE) 
      {
        $view_data['errors'] = array(validation_errors());
        $this->session->set_flashdata("error", $view_data["errors"]);
        redirect("/");
      } else {

        $user_info = $this->input->post("user_info");
        $password = $this->input->post("password");

        $this->check_credentials($user_info, $password);


      }

    }

    public function logout()
    {
        $this->session->unset_userdata("user");
        $this->session->unset_userdata("logged_in");

        redirect("profile");
    }



    function is_valid_number($number)
    {
        $number = preg_replace("/\D/", "", $number);


        if (strlen($number) == 11 && substr($number, 0, 2) == "09") {
            echo "Validation passed<br>"; // Debugging statement
            return true;
        } else {
            echo "Validation failed<br>"; // Debugging statement
            return false;
        }
    }

    public function alpha_with_spaces($str)
    {
    return (bool) preg_match('/^[a-zA-Z ]+$/', $str);
    }


    private function get_validation_config()
    {
        return array(
            array(
                "field" => "first_name",
                'label' => "First Name",
                'rules' => 'required|trim|min_length[2]|callback_alpha_with_spaces',
                'errors' => array(
                    'required' => "You must provide a %s",
                    'trim' => "Cannot be blank",
                    'min_length' => "First name minimum length is 2",
                    'alpha_with_spaces' => 'Name must contain only alphabetical characters and spaces'
                )
            ),
            array(
                'field' => 'last_name',
                'label' => 'Last Name',
                'rules' => 'required|trim|min_length[2]|callback_alpha_with_spaces',
                'errors' => array(
                    'required' => "You must provide a %s",
                    'trim' => 'Cannot be blank',
                    'min_length' => 'Minimum length of 2',
                    'alpha_with_spaces' => 'Name must contain only alphabetical characters and spaces'
                )
            ),
            array(
                'field' => 'contact_number',
                'label' => 'Contact Number',
                'rules' => 'required|callback_is_valid_number|is_unique[users.contact_number]',
                'errors' => array(
                    'required' => "You must provide a %s",
                    'is_valid_number' => "Please enter a valid number",
                    "is_unique" => "Contact number is already taken."
                )
                ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => array(
                    'required' => "You must provide a %s",
                    'valid_email' => 'Email is not valid!',
                    'is_unique' => 'Email is already taken.'
                )
                ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => array(
                    'required' => 'You must provide a %s',
                    'min_length' => 'Password must be at least 8 characters long.'
                )
                ),
            array(
                'field' => 'confirm_password',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
                'errors' => array(
                    'required' => 'Please confirm your password',
                    'matches' => 'Password does not match.'
                )
            )
        );
    }

    private function get_login_validation_config()
    {
        return array(
            array(
                'field' => 'user_info',
                'label' => 'Contact Number/Email',
                'rules' => 'required|callback_check_email_or_contact',
                'errors' => array(
                    'required' => 'Please enter your email or contact number',
                    'check_email_or_contact' => 'Invalid email or contact number'
                )
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Please enter your password'
                )
            )
        );
    }


    public function check_email_or_contact($str)
    {
       // Check if the input value is either an email or a contact number
        if ($this->is_valid_email($str) || $this->is_valid_number($str)) {
            return true;
        } else {
            $this->form_validation->set_message('check_email_or_contact', 'Invalid email or contact number.');
            return false;
        }
    }

    function is_valid_email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) != false;
    }

    public function check_credentials($user_info, $password)
    {
    
        $this->load->model("user");

        $user_details = $this->user->check_user($user_info);


        if($user_details)
        {
            $encrypted_password = md5($password . $user_details['salt']);

            if($user_details["password"] == $encrypted_password) 
            {
                $this->session->set_userdata("user", $user_details);
                $this->session->set_userdata("logged_in", TRUE);
                redirect("profile");
            } else 
            {
                $errors[] = "Invalid credentials";
                $this->session->set_flashdata("error", $errors);
                redirect("/");
            }
        } else
        {
            $errors[] = "User not found";
            $this->session->set_flashdata('error', $errors);
            redirect("/");
        }


    }
    

}
 
?>





