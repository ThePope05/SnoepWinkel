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

    public function getProductsBySupplier(int $supplierId)
    {
        $this->db->query('SELECT * FROM productsupplier
                          LEFT JOIN product ON productsupplier.productId = product.id
                          LEFT JOIN storage ON product.id = storage.productId
                          WHERE supplierId = :id
                          ORDER BY product.name');
        $this->db->bind(':id', $supplierId);
        return $this->db->execute(true);
    }

    public function getProduct(int $id)
    {
        return $this->get(['*'], ['id = ' . $id])[0];
    }

    public function countProducts(int $supplierId)
    {
        $this->db->query('SELECT COUNT(*) as count FROM productsupplier WHERE supplierId = :id GROUP BY productId');
        $this->db->bind(':id', $supplierId);
        return $this->db->execute(true)[0]->count;
    }
}
