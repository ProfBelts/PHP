<?php

class Bill extends CI_Model 
{
    function show_default()
    {
        return $this->db->query("
            SELECT DATE_FORMAT(charged_datetime, '%M') AS month, 
                   DATE_FORMAT(charged_datetime, '%Y') AS year, 
                   SUM(amount) as Total_Cost
                   FROM billing
                   WHERE DATE_FORMAT(charged_datetime, '%Y') = '2011'
                  GROUP BY DATE_FORMAT(charged_datetime, '%M'), DATE_FORMAT(charged_datetime, '%Y');")->result_array();
    }
    public function validate()
    {
        // Load form validation library
        $this->load->library("form_validation");
       
        // Set validation rules
        $this->form_validation->set_rules("start_date", "Start date", "required|callback_check_date_order");
        $this->form_validation->set_rules("end_date", "End date", "required");
    
        // Run form validation
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, return validation errors
            return array(validation_errors());
        } else {
            // Validation passed
            return true;
        }
    }
    
    public function check_date_order($start_date)
    {
        $end_date = $this->input->post("end_date");
    
        // Convert dates to timestamps for comparison
        $start_timestamp = strtotime($start_date);
        $end_timestamp = strtotime($end_date);
    
        // Check if start date is after end date
        if ($start_timestamp > $end_timestamp) {
            // Set custom error message for the "start_date" field
            $this->form_validation->set_message('check_date_order', 'Start date cannot be after end date.');
            return FALSE; // Validation fails
        }
    
        // Return TRUE if validation passes
        return true;
    }
    

}

?>
