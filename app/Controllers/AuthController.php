<?php

namespace App\Controllers;

use App\Models\authModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function register(): string
    {
        return view('auth/register');
    }

    public function registerForm()
    {
        // Load model
        $authModel = new authModel();

        // Define validation rules
        $validationRules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email|is_unique[users.username]',
            'password1' => 'required|min_length[8]',
            'password2' => 'matches[password1]',
        ];

            // Run validation
            if (!$this->validate($validationRules)) {
                // Debug: Menampilkan error dari validator
                $errors = $this->validator->getErrors();
                echo '<pre>';
                print_r($errors);
                echo '</pre>';

                return view('auth/register', [
                    'validation' => $this->validator
                ]);
            } else {
                // Prepare user data
                $dataUser = [
                    'inputFullname' => $this->request->getVar('name'),
                    'inputUsername' => $this->request->getVar('email'),
                    'inputPassword' => $this->request->getVar('password1'),
                    'inputRole' => 'user', // Role bisa diatur sesuai kebutuhan
                ];

                // Debug: Menampilkan data user
                echo '<pre>';
                print_r($dataUser);
                echo '</pre>';

                // Save user data
                $register = $authModel->Register($dataUser);

                if ($register) {
                    // Redirect to login page with success message
                    session()->setFlashdata('success', 'Account successfully created! Please login.');
                    return redirect()->to(base_url('../'));
                } else {
                    // Handle registration failure
                    session()->setFlashdata('message', 'Registration failed, please try again.');
                    return redirect()->back()->withInput();
                }
            }



    }
}