<?php

class ProductModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        $this->table = 'product';

        $this->fillable = [
            'name',
            'barcode'
        ];
    }

    public function getInventory()
    {
        $this->db->query('SELECT * FROM product
                          LEFT JOIN storage ON product.id = storage.productId');
        return $this->db->execute(true);
    }

    public function getProduct(int $id)
    {
        return $this->get(['*'], ['id = ' . $id])[0];
    }
}
