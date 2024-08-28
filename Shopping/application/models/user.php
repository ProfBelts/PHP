<?php 

class User extends CI_Model
{
    // Insert INTO contacts
    function select_all_users()
    {
        return $this->db->query("Select * FROM contacts")->result_array();
    }

    function check_user($value)
    {
        return $this->db->query("SELECT * FROM users WHERE email = ? OR contact_number = ?", array($value, $value))->row_array();
    }
    
    function add_user($user)
    {
        $password = $user["password"];
    
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
    
        $combined_password = $password . $salt;
    
        $encrypted_password = md5($combined_password);
    
        $query = "INSERT INTO users (first_name, last_name, contact_number, email, password, salt, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
        $values = array($user["first_name"], $user["last_name"], $user["contact_number"], $user["email"], $encrypted_password, $salt);
    
        return $this->db->query($query, $values);
    }
    
  

}


?>