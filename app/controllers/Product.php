
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
                <a href='/Product/Allergy/$row->id'><span class='material-symbols-outlined text-amber-500 hover:text-amber-600 transition-colors'>
                allergy
                </span></a>
            " : "
                <a href='/product/allergy/$row->id'><span class='material-symbols-outlined text-red-600 hover:text-red-700 transition-colors'>
                close
                </span></a>
            ";

            $deliveryEl = "
                <a href='/product/delivery/$row->id'><span class='material-symbols-outlined text-amber-500 hover:text-amber-600 transition-colors'>
                orders
                </span></a>
            ";

            $tableBody[count($tableBody)] = [$row->barcode, $row->name, $row->packageUnit, $row->inStorage, $allergyEl, $deliveryEl];
        }

        $data = [
            'title' => 'Product overview',
            'table' => [
                'head' => ['Code', 'Name', 'Package unit(KG)', 'Amount', 'Allergy', 'Delivery'],
                'body' => $tableBody
            ]
        ];

        $this->view('General/tableview', $data);
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

        $this->view('General/tableview', $data);
    }

    public function Delivery($id)
    {
        $deliverys = $this->model('SupplierModel')->getDeliverys($id);
        $supplier = $this->model('SupplierModel')->getSupplier($deliverys[0]->supplierId);

        $tableBody = [];
        foreach ($deliverys as $delivery) {
            $tableBody[count($tableBody)] = [$delivery->name, $delivery->dateDelivery, $delivery->amount, $delivery->dateNextDelivery];
        }

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
                'body' => $tableBody
            ]
        ];

        $this->view('General/tableview', $data);
    }
}
