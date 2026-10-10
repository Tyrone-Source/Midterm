<?php namespace App\Controllers;
use App\Models\UserModel;

class StaffController extends BaseController {
    public function index() {
        $model = new UserModel();
        $data['staff'] = $model->findAll();
        return view('staff/index', $data);
    }

    public function create() {
        return view('staff/create');
    }

    public function store() {
        $model = new UserModel();
        $model->save([
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);
        return redirect()->to('/staff');
    }

    public function delete($id) {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/staff');
    }
}