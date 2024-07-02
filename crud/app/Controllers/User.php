<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
	{
        $this->userModel = new \App\Models\UserModel();
    }

    public function index()
	{
		$data['user_data'] = $this->userModel->getUsers();
		$data['count'] = $this->userModel->getUsersCount();
		return view('user', $data);
	}

    public function add()
	{
        if($this->request->getMethod() === 'post')
		{
            $validation = service('validation');
            $validation->setRules([
                'fname' => 'required|trim|min_length[50]',
                'lname' => 'required|trim|min_length[50]',
                'email' => 'required|trim|min_length[50]',
                'mobile_no' => 'required|'
            ]);

            $data = [
                'fname'   => 'john',
                'lname'   => 'doe',
                'email'   => 'desaleswati93@gmail.com',
                'mobile_no' => '1234567890',
            ];

            if ($validation->run($data)) {
                $validatedData = $validation->getValidated();
               
            }
        }else{
            return view('user', $data);
        }
	}
}
