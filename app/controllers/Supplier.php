
<?php

class Supplier extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('SupplierModel');
    }

    public function index()
    {
        $suppliers = $this->model->getAllSuppliers();

        $tableBody = [];

        foreach ($suppliers as $supplier) {
            $productCount = $this->model('ProductModel')->countProducts($supplier->id);
            $productEl = $productCount > 0 ? "
                <a href='/Supplier/Product/$supplier->id'><span class='material-symbols-outlined text-amber-500 hover:text-amber-600 transition-colors'>
                inventory_2
                </span></a>
            " : "
                <a href='/Supplier/Product/$supplier->id'><span class='material-symbols-outlined text-red-600 hover:text-red-700 transition-colors'>
                close
                </span></a>
            ";

            $tableBody[count($tableBody)] = [$supplier->supplierNumber, $supplier->name, $supplier->contactPerson, $supplier->phone, $productCount, $productEl];
        }


        $data = [
            'title' => 'All suppliers',
            'table' => [
                'head' => ['Supplier number', 'Name', 'Contact person', 'Phone', 'Product count', 'Product overview'],
                'body' => $tableBody
            ]
        ];

        $this->view('General/tableview', $data);
    }

    public function product($supplierId)
    {
        $supplier = $this->model->getSupplier($supplierId);
        $products = $this->model('ProductModel')->getProductsBySupplier($supplierId);

        $tableBody = [];
        $previousProduct = null;

        foreach ($products as $product) {
            $name = $product->name;
            $newDeliveryEl = "
            <a href='/Supplier/newDelivery/$supplierId/$product->id'><span class='material-symbols-outlined text-amber-500 hover:text-amber-600 transition-colors'>
            add_circle
            </span></a>
            ";

            if ($previousProduct != null && $previousProduct->name == $product->name) {
                $name = '<span class="material-symbols-outlined text-slate-900">
                subdirectory_arrow_right
                </span>';
            }

            $tableBody[count($tableBody)] = [$name, $product->inStorage, $product->packageUnit, $product->dateDelivery, $newDeliveryEl];
            $previousProduct = $product;
        }

        $data = [
            'title' => 'All products',
            'pageInfo' => [
                'Supplier name' => $supplier->name,
                'Supplier number' => $supplier->supplierNumber,
                'Contact person' => $supplier->contactPerson,
                'Phone' => $supplier->phone
            ],
            'table' => [
                'head' => ['Product name', 'Amount', 'Package unit', 'Last delivery', 'New delivery'],
                'body' => $tableBody
            ]
        ];

        $this->view('General/tableview', $data);
    }

    public function newDelivery(int $supplierId, int $productId)
    {
        $supplier = $this->model->getSupplier($supplierId);
        $product = $this->model('ProductModel')->getProduct($productId);

        $data = [
            'title' => 'New delivery',
            'pageInfo' => [
                'Supplier name' => $supplier->name,
                'Supplier number' => $supplier->supplierNumber,
                'Contact person' => $supplier->contactPerson,
                'Phone' => $supplier->phone,
                'Product name' => $product->name,
                'Barcode' => $product->barcode
            ],
            'form' => [
                'action' => '/Supplier/storeDelivery/' . $supplierId . '/' . $productId,
                'method' => 'POST',
                'fields' => [
                    [
                        'type' => 'number',
                        'name' => 'amount',
                        'label' => 'Amount',
                        'required' => true
                    ],
                    [
                        'type' => 'date',
                        'name' => 'dateNextDelivery',
                        'label' => 'Next delivery date',
                        'required' => true
                    ]
                ]
            ]
        ];

        $this->view('General/formView', $data);
    }
}
