<?php namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController {
    public function login() {
        return view('auth/login');
    }

    public function authenticate() {
        $session = session();
        $model = new UserModel();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $user = $model->where('username', $username)->first();
        
        $isValidPassword = $user && (password_verify($password, $user['password']) || $password === $user['password']);

        if ($user && $isValidPassword) {
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'full_name' => $user['full_name'],
                'logged_in' => true
            ]);
            return redirect()->to('/sales/record');
        }
        
        return redirect()->back()->with('error', 'Invalid username or password.');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}