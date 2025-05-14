<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function delete ( User $user )
    {
        return $user->email === 'ashikurrahman7194@gmail.com';
    }
}
