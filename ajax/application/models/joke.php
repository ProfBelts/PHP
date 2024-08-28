<?php 

class Joke extends CI_Model
{

    public function show_jokes()
    {
        return $this->db->query("SELECT * FROM jokes")->result_array();
    }

    public function show_joke_by_id($id)
    {
        return $this->db->query("SELECT * FROM jokes WHERE id = ?", array($id))->row_array();
    }

    public function create_jokes($post)
    {
        $query = "INSERT INTO jokes (title, content, created_at) VALUES(?, ? , NOW())";
        $values = array(
            $post["title"],
            $post["content"]
        );
        
        $this->db->query($query, $values);
    }


    public function sorted_jokes($sort)
    {
        if($sort === "Recent") 
        {
            return $this->db->query("SELECT * FROM jokes WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY created_at DESC;")->result_array();
        }
    
        if($sort === "Old")
        {
            return $this->db->query("SELECT * FROM jokes WHERE created_at < DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY created_at DESC;")->result_array();
        }
    }
    


    public function delete_joke($id)
    {
        return $this->db->query("DELETE FROM jokes WHERE id = ?", array($id));
    }
    

    public function validate_jokes()
    {
        $this->load->library("form_validation");

        $config = $this->jokes_config();

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE)
        {
            return array(validation_errors());
        }

    }


    public function jokes_config()
    {
        return array(
            array(
                "field" => "title",
                "label" => "Title", 
                "rules" => "required|trim|min_length[2]|max_length[255]",
                "errors" => array(
                    "required" => "Please fill up a %s.",
                    "trim" => "Submission cannot be blank.",
                    "min_length" => "Title is minimum of 2 characters is required.",
                    "max_length" => "Title is maximum of 255 characters allowed."
                )
            ), 
            array(
                "field" => "content",
                "label" => "Content", 
                "rules" => "required|trim|min_length[5]|max_length[400]",
                "errors" => array(
                    "required" => "Please fill up the %s.",
                    "trim" => "Submission cannot be blank.",
                    "min_length" => "Content is minimum of 5 characters is required.",
                    "max_length" => "Maximum of 300 characters allowed."
                )
            )
        );
    }
    

}


?>