<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{

    public function update(User $authUser, User $user): bool
    {
        //1. Kullanici kendisini guncellemeecek
        //2. Kullanici admin ise rolunu degistiremeyecek 
        //3. kullanici admin ise baska bir admin sadece o kullanicinin rolunu degistrecek

        // 1.
        if ($authUser->id === $user->id) {
            return false;
        }
        // 2.

        // 3.
        if ($user->role === 'admin' && $authUser->role !== 'admin') {
            return false;
        }
        return true;
    }
    public function create(User $user): bool
    {
        if ($user->role !== 'admin') {
            return false;
        }
        return true;
    }
}
