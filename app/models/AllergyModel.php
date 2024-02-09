<?php

class AllergyModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProductAllergys($id)
    {
        $this->db->query('SELECT allergy.name, allergy.description FROM allergy
                          LEFT JOIN productAllergy ON productAllergy.allergyId = allergy.id
                          WHERE productAllergy.productId = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute(true);
    }

    public function hasAllergys($id)
    {
        $this->db->query('SELECT count(id) AS allergyAmount FROM productAllergy WHERE productId = :id');
        $this->db->bind(':id', $id);

        return $this->db->execute(true)[0]->allergyAmount > 0;
    }
}
