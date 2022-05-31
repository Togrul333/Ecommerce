<?php

namespace App\Providers;

use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use App\Models\User;
use App\Policies\ProductControllerPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
//        ProductController::class=>ProductControllerPolicy::class

//Вларавель также дредусмотрен автоматический поиск политик  то есть
// если соблюдать определенные соглашения по именеванию классав то ларавель сам найдет политику  и не нужно будет тут писать

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // intercepter before() перед любой проверкой будет запускать
//        Gate::before(function (?User $user){
//           if ($user->role==='togrul')return true;
//           return false;
//        });




//        Gate::define('view-protected-part', function (?User $user) {
//            if ($user && $user->name=== 'togrul') {
//                //use Illuminate\Auth\Access\Response;
//                return Response::allow('icaze var');
//            }
//            return Response::deny('icaze yoxdu');
//        });
    }
}
