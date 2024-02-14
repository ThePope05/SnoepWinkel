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
        $this->get(['*'], ['id = ' . $id]);
    }
}
