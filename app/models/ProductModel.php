<?php

class ProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getInventory()
    {
        $this->db->query('SELECT * FROM product
                          LEFT JOIN storage ON product.id = storage.productId');
        return $this->db->execute(true);
    }

    public function getProduct($id)
    {
        $this->db->query('SELECT * FROM product WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute(true)[0];
    }
}
