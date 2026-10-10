<?php namespace App\Controllers;
use App\Models\CustomerModel;

class CustomerController extends BaseController {
    public function index() {
        $model = new CustomerModel();
        $data['customers'] = $model->findAll();
        return view('customers/index', $data);
    }

    public function create() {
        return view('customers/create');
    }

    public function store() {
        $model = new CustomerModel();
        $model->save([
            'name'  => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
        ]);
        return redirect()->to('/customers');
    }

    public function delete($id) {
        $model = new CustomerModel();
        $model->delete($id);
        return redirect()->to('/customers');
    }
}