<?php

class SupplierModel extends BaseModel
{
    //This is required for every Model
    public function __construct()
    {
        parent::__construct();


        $this->table = 'Supplier';

        $this->fillable = [
            'supplierNumber',
            'name',
            'contactPerson',
            'phone'
        ];
    }

    public function getAllSuppliers(): array
    {
        return $this->get(['*']);
    }

    public function getSupplier(int $id)
    {
        return $this->get(['*'], ['id = ' . $id])[0];
    }

    public function getDeliverys(int $productId)
    {
        $this->db->query('SELECT * FROM productSupplier
                          LEFT JOIN supplier ON productSupplier.supplierId = supplier.id
                            LEFT JOIN product ON productSupplier.productId = product.id
                          WHERE productId = :id');
        $this->db->bind(':id', $productId);
        return $this->db->execute(true);
    }
}
