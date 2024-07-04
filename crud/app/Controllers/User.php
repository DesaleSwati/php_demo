<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\IncomingRequest;

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
        if(strtolower($this->request->getMethod()) === 'post')
		{
            $validation = service('validation');
            $validation->setRules([
                'fname' => 'required|trim|min_length[2]|max_length[50]|alpha',
                'lname' => 'required|trim|min_length[2]|max_length[50]|alpha',
                'email' => 'required|trim|min_length[2]|max_length[100]|is_unique[users.email]',
                'mobile_no' => 'required|numeric|min_length[10]|max_length[10]'
            ]);

            $data = [
                'fname'   => $this->request->getPost('fname'),
                'lname'   => $this->request->getPost('lname'),
                'email'   => $this->request->getPost('email'),
                'mobile_no' => $this->request->getPost('mobile_no'),
            ];

            if ($validation->run($data)) {
                $validatedData = $validation->getValidated();
                $result = $this->userModel->insertData($data);
                if($result > 0){
                    return redirect()->to("/");
                }else{
                    $data["validation"] = [];
                    return view('add');
                }
            }
            else{
                $data["validation"] = $validation->getErrors();
                return view('add',$data);
            }
        }else{
            $data["validation"] = [];
            return view('add');
        }
	}

    public function edit($id)
	{
        if(strtolower($this->request->getMethod()) === 'post' && !empty($id))
		{
            $validation = service('validation');
            $validation->setRules([
                'fname' => 'required|trim|min_length[2]|max_length[50]|alpha',
                'lname' => 'required|trim|min_length[2]|max_length[50]|alpha',
                'mobile_no' => 'required|numeric|min_length[10]|max_length[10]'
            ]);

            $data = [
                'fname'   => $this->request->getPost('fname'),
                'lname'   => $this->request->getPost('lname'),
                'mobile_no' => $this->request->getPost('mobile_no'),
            ];

            if ($validation->run($data)) {
                $validatedData = $validation->getValidated();
                $result = $this->userModel->updateData($id,$data);
                if($result > 0){
                    return redirect()->to("/");
                }else{
                    $data["validation"] = [];
                    $data['user'] = $this->userModel->userDetailsOnId($id);
                    return view('edit');
                }
            }
            else{
                $data["validation"] = $validation->getErrors();
                $data['user'] = $this->userModel->userDetailsOnId($id);
                return view('edit',$data);
            }
        }elseif(!empty($id)){
            $data["validation"] = [];
            $data['user'] = $this->userModel->userDetailsOnId($id);
            return view('edit',$data);
        }else{
            return redirect()->to("/");
        }
	}

    public function delete($id = null) 
    {
        if(!empty($id)){
            $status = $this->userModel->deleteUser($id);
            if($status == 1){
                return redirect()->to('/');
            }else{
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function restore($id = null) 
    {
        if(!empty($id)){
            $status = $this->userModel->restoreUser($id);
            if($status == 1){
                return redirect()->to('/');
            }else{
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/');
        }
    }
}
