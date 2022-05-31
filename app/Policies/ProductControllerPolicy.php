<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProductControllerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

//    public function before(?User $user){
//        if ($user->role === 'admin') return  true;
//    }

//    public function before(?User $user){
//        if ($user->blocked === 1) return  false;
//    }

    public function viewProtectedPart(?User $user)
    {
        if ($user && $user->name === 'togrul') {
            return Response::allow('icaze var');
        }
        return Response::deny('icaze yoxdu',403);
    }
}
