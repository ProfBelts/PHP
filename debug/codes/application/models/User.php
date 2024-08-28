<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    /*  DOCU: This function retrieves user information filtered by email.
        Owner: Karen
    */
    function get_user_by_email($email)
    { 
        $query = "SELECT * FROM Users WHERE email=?";
        return $this->db->query($query, $this->security->xss_clean($email))->result_array()[0];
    }

    /*  DOCU: This function inserts new user info upon registration.
        Owner: Karen
    */
    function create_user($user)
    {
        $query = "INSERT INTO Users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?, NOW(), NOW())";
        $values = array(
            $this->security->xss_clean($user['first_name']), 
            $this->security->xss_clean($user['last_name']), 
            $this->security->xss_clean($user['email']), 
            md5($this->security->xss_clean($user["password"]))); 
        
        return $this->db->query($query, $values);
    }

    /*  DOCU: This function checks if all required fields were filled up.
        Owner: Karen
    */
    function validate_signin_form() {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if(!$this->form_validation->run()) {
            return array(validation_errors());
        } 
        else {
            return "success";
        }
    }
    
    /*  DOCU: This function contains simple condition to match database record and user input in password.
        Owner: Karen
    */
    function validate_signin_match($user, $password) 
    {
        $errors = array();
        $hash_password = md5($this->security->xss_clean($password));

        if( $user['password'] == $hash_password) {
            return "success";
        }
        else {
            $errors[] = "Invalid Credentials";
            return $errors;
        }
    }

    /*  DOCU: This function checks required input fields and if unique email.
        Owner: Karen
    */
    function validate_registration($email) 
    {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');     
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');     
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        
        if($this->form_validation->run() == FALSE) {
            return array(validation_errors());
        }
    }

}

?>