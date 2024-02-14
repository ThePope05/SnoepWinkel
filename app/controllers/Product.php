
<?php

class Product extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('ProductModel');
    }

    public function index()
    {
        $allData = $this->model->getInventory();

        $tableBody = [];

        foreach ($allData as $row) {
            $allergyEl = $this->model('AllergyModel')->hasAllergys($row->id) ? "
                <a href='/Product/Allergy/$row->id'><span class='material-symbols-outlined'>
                allergy
                </span></a>
            " : "
                <a href='/Product/Allergy/$row->id'><span class='material-symbols-outlined' style='color: red;'>
                close
                </span></a>
            ";

            $deliveryEl = "
                <a href='/Product/Delivery/$row->id'><span class='material-symbols-outlined'>
                orders
                </span></a>
            ";

            $tableBody[count($tableBody)] = [$row->barcode, $row->name, $row->packageUnit, $row->inStorage, $allergyEl, $deliveryEl];
        }

        $data = [
            'title' => 'Product overview',
            'table' => [
                'head' => ['Code', 'Name', 'Package unit', 'Amount', 'Allergy', 'Delivery'],
                'body' => $tableBody
            ]
        ];

        $this->view('Product/index', $data);
    }

    public function Allergy($id)
    {
        $allergys = $this->model('AllergyModel')->getProductAllergys($id);
        $product = $this->model->getProduct($id);

        $data = [
            'title' => 'Allergys',
            'pageInfo' => [
                'Product name' => $product->name,
                'Barcode' => $product->barcode
            ],
            'table' => [
                'head' => ['Allergy', 'Description'],
                'body' => $allergys
            ]
        ];

        $this->view('Product/index', $data);
    }

    public function Delivery($id)
    {
        $deliverys = $this->model('SupplierModel')->getDeliverys($id);
        $supplier = $this->model('SupplierModel')->getSupplier($id)[0];

        $data = [
            'title' => 'Supplier overview',
            'pageInfo' => [
                'Supplier Id' => $supplier->supplierNumber,
                'Name supplier' => $supplier->name,
                'Contact' => $supplier->contactPerson,
                'Contact number' => $supplier->phone
            ],
            'table' => [
                'head' => ['Product name', 'Date of delivery', 'Amount', 'Date next delivery'],
                'body' => $deliverys
            ]
        ];

        $this->view('Product/index', $data);
    }
}
