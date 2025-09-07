<?php
namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        helper(['form', 'url']);
    }

    // Halaman login
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $this->adminModel->getByUsername($username);

        if ($admin && $password === $admin['password']) {
            session()->set('isLoggedIn', true);
            session()->set('username', $admin['username']);
            return redirect()->to('/home');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah!');
        }
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
