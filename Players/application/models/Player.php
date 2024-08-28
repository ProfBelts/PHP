<?php 

class Player extends CI_Model 
{
    function show_default()
    {
       // Retrieve all athletes from the database
       return $this->db->query("SELECT * FROM athletes")->result_array();
    }


    function search_player($post)
    {
        // Initialize an empty array to hold the WHERE clauses
        $where_clauses = array();
    
        // Check if athlete_name is provided and construct the WHERE clause for name search
        // Select * FROM athletes WHERE name LIKE %name%
        if (!empty($post['athlete_name'])) {
            $where_clauses[] = "name LIKE '%" . $this->db->escape_like_str($post['athlete_name']) . "%'";
        }
    
        // Check if gender is provided and construct the WHERE clause for gender search
        // Select * FROM athletes where gender = 0 if male 1 if female
        if (!empty($post['gender'])) {
            $gender = ($post['gender'] == 'Male') ? 0 : 1; 
            $where_clauses[] = "gender = " . $this->db->escape($gender);
        }
    

        // Select * from athletes where sports = sports_name
        // Check if sports is provided and construct the WHERE clause for sports search
        if (!empty($post['sports'])) {
            $where_clauses[] = "sports = '" . $this->db->escape_str($post['sports']) . "'";
        }
    
        // Construct the final WHERE clause by joining all the individual clauses with AND
        // Select * from athletes WHERE name LIKE %name% AND gender = ? AND sports = ?
        $where_clause = implode(' AND ', $where_clauses);
    
        // Construct the SQL query with the WHERE clause
        $query = "SELECT * FROM athletes";
        if (!empty($where_clause)) {
            $query .= " WHERE " . $where_clause;
        }
    
        // Run the query
        $result = $this->db->query($query);
    
        // Return the result rows as an array of associative arrays
        return $result->result_array();
    }
    
    
    function validate($post)
    {
        // Check if any search criteria are provided
        if (!empty($post['athlete_name']) || !empty($post['gender']) || !empty($post['sports'])) {
            // Perform a search based on the provided criteria
            $result = $this->search_player($post);
            if ($result) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>
