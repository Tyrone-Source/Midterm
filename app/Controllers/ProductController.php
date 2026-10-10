<?php namespace App\Controllers;
use App\Models\ProductModel;

class ProductController extends BaseController {
    public function index() {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('products/index', $data);
    }

    public function create() {
        return view('products/create');
    }

    public function store() {
        $model = new ProductModel();
        $model->save([
            'name'  => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ]);
        return redirect()->to('/products');
    }

    public function delete($id) {
        $model = new ProductModel();
        $model->delete($id);
        return redirect()->to('/products');
    }
}