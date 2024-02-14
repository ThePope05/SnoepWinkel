<?php

class SupplierModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        $this->table = 'supplier';

        $this->fillable = [
            'name',
            'contactPerson',
            'supplierNumber',
            'phone'
        ];
    }

    public function getSupplier(int $id)
    {
        $sql = "SELECT s.id, s.name, s.phone, s.contactPerson, s.supplierNumber FROM supplier s
                INNER JOIN productSupplier ps ON ps.supplierId = s.id
                WHERE ps.productId = :id";

        $this->db->query($sql);

        $this->db->bind(':id', $id);

        return $this->db->execute(true);
    }

    public function getDeliverys(int $productId)
    {
        $sql = "SELECT p.name, ps.dateDelivery, ps.amount, ps.dateNextDelivery FROM productSupplier ps
                INNER JOIN product p ON p.id = ps.productId
                WHERE ps.productId = :productId
                ORDER BY ps.dateDelivery DESC";

        $this->db->query($sql);

        $this->db->bind(':productId', $productId);

        return $this->db->execute(true);
    }
}
