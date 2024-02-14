
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
        $allergys = $this->model('AllergyModel')->getProductAllergys($id);
        $supplier = $this->model->getProduct($id);

        $data = [
            'title' => 'Allergys',
            'pageInfo' => [
                'Supplier Id' => $supplier->id,
                'Name supplier' => $supplier->name,
                'Contact' => $supplier->barcode,
                'Contact number' => $supplier->number
            ],
            'table' => [
                'head' => ['Allergy', 'Description'],
                'body' => $allergys
            ]
        ];

        $this->view('Product/index', $data);
    }
}
