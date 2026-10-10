<?php namespace App\Controllers;
use App\Models\SaleModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;

class SaleController extends BaseController {
    public function record() {
        $productModel = new ProductModel();
        $customerModel = new CustomerModel();
        
        $data['products'] = $productModel->findAll();
        $data['customers'] = $customerModel->findAll();
        
        return view('sales/record', $data);
    }

    public function store() {
        $saleModel = new SaleModel();
        
        // Force user_id to 1 so it always references a valid user in the database
        $userId = 1; 

        $customerId = $this->request->getPost('customer_id');
        if (empty($customerId)) {
            $customerId = null;
        }
        
        $saleModel->save([
            'product_id'  => $this->request->getPost('product_id'),
            'customer_id' => $customerId,
            'quantity'    => $this->request->getPost('quantity'),
            'total_price' => $this->request->getPost('total_price'),
            'user_id'     => $userId
        ]);
        
        return redirect()->to('/sales/history');
    }
    public function history() {
    $saleModel = new SaleModel();
    $data['sales'] = $saleModel->select('sales.*, products.name as product_name, customers.name as customer_name, users.full_name as cashier_name')
                               ->join('products', 'products.id = sales.product_id', 'left')
                               ->join('customers', 'customers.id = sales.customer_id', 'left')
                               ->join('users', 'users.id = sales.user_id', 'left')
                               ->findAll();
    return view('sales/history', $data);
}
}