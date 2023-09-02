<?php

namespace App\Database\Seeds;

use App\Models\UserData;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = auth()->getProvider();

        $user = new User([
            'username' => 'ermenrich',
            'email'    => 'admin@ermenrichstuio.com',
            'password' => 'password',
        ]);

        // Save the user to the database
        $users->save($user);

        // Get the inserted user's ID
        $userId = $users->getInsertID();

        // Retrieve the complete user object from the database
        $user = $users->findById($userId);

        $user->addGroup('superadmin');
        $user->activate();

        $userData = new UserData();
        $userData->save([
            'user_id' => $userId,
            'first_name' => 'Ermenrich',
            'last_name' => 'Studio',
        ]);
    }
}
