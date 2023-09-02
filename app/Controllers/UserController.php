<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        // $data['users'] = $model->getUserData()->getResult();
        return view('pages/user/index', $data);
    }

    public function create()
    {
        return view('pages/user/create');
    }

    protected function getValidationRules(): array
    {
        return [
            'first_name' => [
                'label' => 'first_name',
                'rules' =>  'required'
            ],
            'last_name' => [
                'label' => 'first_name',
                'rules' =>  'required'
            ],
            'email' => [
                'label' => 'email',
                'rules'  => 'required|valid_email|max_length[254]|is_unique[auth_identities.secret]',
            ],
            'password' => [
                'label'  => 'password',
                'rules'  => 'required|strong_password',
                'errors' => [
                    'max_byte' => 'Auth.errorPasswordTooLongBytes',
                ],
            ],
            'password_confirm' => [
                'label' => 'passwordConfirm',
                'rules' => 'required|matches[password]',
            ],
            'group' => [
                'label' => 'group',
                'rules' => 'required',
            ],
        ];
    }

    public function store()
    {
        $rules = $this->getValidationRules();

        if (!$this->validateData($this->request->getPost(), $rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $user = new User([
            'username' => $this->request->getPost('first_name') . '.' . $this->request->getPost('last_name'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ]);

        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        $user->addGroup($this->request->getPost('group'));

        // Set the user active
        $user->activate();

        return redirect()->to('/user')->with('message', 'User successfully added.');
    }

    public function edit($id)
    {
        $model = new UserModel();
        // $data['users'] = $model->withIdentities()->findById($id);
        $data['users'] = $model->getUserData()->getFirstRow();
        // dd($data);
        return view('pages/user/edit', $data);
    }

    public function update($id)
    {
        $rules = $this->getValidationRules();

        if (!$this->validateData($this->request->getPost(), [
            'first_name' => [
                'label' => 'first_name',
                'rules' =>  'required'
            ],
            'last_name' => [
                'label' => 'first_name',
                'rules' =>  'required'
            ],
            'email' => [
                'label' => 'email',
                'rules'  => 'required|valid_email|max_length[254]|is_unique[auth_identities.secret]',
            ],
            'password' => [
                'label'  => 'password',
                'rules'  => 'required|strong_password',
                'errors' => [
                    'max_byte' => 'Auth.errorPasswordTooLongBytes',
                ],
            ],
            'password_confirm' => [
                'label' => 'passwordConfirm',
                'rules' => 'required|matches[password]',
            ],
            'group' => [
                'label' => 'group',
                'rules' => 'required',
            ],
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $user = $users->findById($id);

        $user->fill([
            'username' => $this->request->getPost('first_name') . '.' . $this->request->getPost('last_name'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ]);

        $users->save($user);

        return redirect()->to('/user')->with('message', 'User edited successfully.');
    }

    public function delete($id)
    {
        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $users->delete($id, true);

        return redirect()->to('/user');
        return redirect()->to('/user')->with('message', 'User deleted.');
    }
}
