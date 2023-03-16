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
        $schema = "CREATE TABLE IF NOT EXISTS template (id INT NOT NULL AUTO_INCREMENT, information VARCHAR(50), position INT, PRIMARY KEY (id))";
        $stmt = $this->db->prepare($schema);
        return $stmt->execute();
    }

    // här följer olika exempel där placeholders används för att undvika SQL injections
    
    // funktion för att lägga till data
    public function selectAll()
    {
        $sql = "SELECT * FROM template";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // funktion för att lägga till data i tabellen
    public function insertOne($information, $position)
    {

        try {
            //code...
            $sql = "INSERT INTO template (information, position) VALUES (:information, :position)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':information', $information, PDO::PARAM_STR);
            $stmt->bindValue(':position', $position, PDO::PARAM_INT);
            $stmt->execute();
    
            return $this->db->lastInsertId();
    

        } catch (\Throwable $th) {
            throw $th;
        }

    }


}


?>