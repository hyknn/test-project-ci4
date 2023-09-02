<?php

namespace App\Controllers;

use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class LoginController extends ShieldLogin
{
    /**
     * Custom login action with additional functionality.
     */

    public function customLoginAction()
    {
        // Call the parent loginAction method to perform the login
        $parentResponse = parent::loginAction();

        // Check if the login was successful
        if ($parentResponse->getStatusCode() === 302) { // Assuming successful login returns a redirect response

            // Update the user status to 1 here
            $userId = session('user_id'); // Replace 'user_id' with the session variable that stores the user ID
            $userModel = new \App\Models\UserModel(); // Replace with your User model class
            $user = $userModel->find($userId);

            if ($user) {
                $user->status = 1;
                $userModel->save($user);
            }
        }

        return $parentResponse;
    }

    /**
     * Custom logout action with additional functionality.
     */
    public function customLogoutAction()
    {
        // Get the currently logged-in user's ID
        $userId = auth()->id();

        // Update the user status to 0 in the database
        $userModel = new UserModel();
        $userModel->update($userId, ['status' => 0]);

        // Capture custom logout redirect URL.
        $url = config('Auth')->logoutRedirect();

        // Call the parent logout method to perform the actual logout.
        parent::logoutAction();

        return redirect()->to($url)->with('message', lang('Auth.successLogout'));
    }
}
