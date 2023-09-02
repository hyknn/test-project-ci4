<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;


class UserSeeder extends Seeder
{
    public function run()
    {
        $users = auth()->getProvider();

        $user = new User([
            'username' => 'foo-bar',
            'email'    => 'foo.bar@example.com',
            'password' => 'secret plain text password',
        ]);

        // Save the user to the database
        $users->save($user);

        // Get the inserted user's ID
        $userId = $users->getInsertID();

        // Retrieve the complete user object from the database
        $user = $users->findById($userId);

        // Add the user to the default group
        $users->addToDefaultGroup($user);
    }
}
