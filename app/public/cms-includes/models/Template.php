<?php


class Template extends Database
{
    function __construct()
    {
        // call parent constructor
        parent::__construct();
    }

    public function setup()
    {
        $schema = "CREATE TABLE IF NOT EXISTS template (id INT NOT NULL AUTO_INCREMENT, template VARCHAR(50), PRIMARY KEY (id))";
        $stmt = $this->db->prepare($schema);
        return $stmt->execute();
    }

}


?>