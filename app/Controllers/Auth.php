<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username === 'admin' && $password === 'admin') {
            session()->set('isLoggedIn', true);
            session()->set('username', $username);
            return redirect()->to('/buku')->with('success', 'Login berhasil!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Username atau Password salah.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'Berhasil logout.');
    }
}
