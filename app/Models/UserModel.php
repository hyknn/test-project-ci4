<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields,
            'first_name',
            'last_name',
            'address',
            'city',
            'country',
            'postal_code',
            'about',
            'password',
            'email',
        ];
    }

    public function getUserData()
    {
        $query =  $this->db->table('users')
            ->join('users_data', 'users_data.user_id = users.id')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->get();
        return $query;
    }

    public function getEmployeeData()
    {
        $query =  $this->db->table('users')
            ->join('users_data', 'users_data.user_id = users.id')
            ->join('employees', 'employees.user_id = users.id')
            ->join('auth_identities', 'auth_identities.user_id = users.id')
            ->get();
        return $query;
    }

    public function getOneEmployee($id)
    {
        $query =  $this->db->table('users')
            ->join('users_data', 'users_data.user_id = users.id')
            ->join('employees', 'employees.user_id = users.id')
            ->join('auth_identities', 'auth_identities.user_id = users.id')
            ->where('employees.user_id', $id)
            ->get();
        return $query;
    }
}
