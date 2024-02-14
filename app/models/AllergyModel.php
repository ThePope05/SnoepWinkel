<?php

class AllergyModel extends BaseModel
{

    public function __construct()
    {
        parent::__construct();

        $this->table = 'allergy';

        $this->fillable = [
            'name',
            'description'
        ];
    }

    public function getProductAllergys(int $id)
    {
        $this->db->query('SELECT allergy.name, allergy.description FROM allergy
                          LEFT JOIN productAllergy ON productAllergy.allergyId = allergy.id
                          WHERE productAllergy.productId = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute(true);
    }

    public function hasAllergys(int $id)
    {
        $this->table = 'productAllergy';
        $allergyAmount = $this->get(['count(id) AS allergyAmount'], ['productId = ' . $id])[0]->allergyAmount;
        return $allergyAmount > 0;
    }
}
