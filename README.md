
0) Fetch le crud islemi yazilib productlar ucun (api)



1)cartda перейти к оформлению заказа buttonu [procead to checkout]


2)
https://www.youtube.com/watch?v=rq0IKZ2fHkE&list=PL_99hMDlL4d3-n63bsNaaDRnTZdCOvU6q&index=27


3) mehsulun rengine gore qiymetin deiwilmeyi 

4)qiymet endirimi ayri treitnen gerceklewsin



[social network]
template blade lere ayirmag
1) title= {{ config('app.name) }}
2)php artisan config:cache
3)login logouth register 
4) home | templates /partials/naviqation, alerts













<div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>image</th>
                    <th>Makale Basligi</th>
                    <th>Kategoriyas</th>
                    <th>Olusturma tarixi</th>
                    <th>Islemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            <img src="{{$product->image}}" width="200">
                        </td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->created_at->diffForHumans()}}</td>
                        <td>
                            <a target="_blank" href="" title="Goruntule" class="btn btn-sm btn-success"><i
                                    class="fa fa-eye"></i></a>
                            <a href="" title="Dizenle"
                               class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <a href="" title="Dizenle"
                               class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>






















==========================================================================================================================================

                PHP DocBlock

/**
* Some description
*
*   arqumentler
* @param User $sds
* @param int|string $sdgg
*
* что будет выброшина
* @throws \RuntimeException
*
* @var float
*
* @property-read int
* @property-write int
* @property int
*
* @method static int foo(string $s)
*
*
* @return bool
*/
public function admins($sds,$sdgg):bool
{
return true;
}







==============================================================================================================================


                                Laravel Gates.
    Политики это способы организацыи гейтов

// Route::get('/admin',[\App\Http\Controllers\Admin\ProductController::class,'admin'])->middleware('can:view-protected-part')->name('admin');

указываем миддлевару то действие(права на выполнение которого вы проверяете)
-------- middleware('can:view-protected-part')

внутырь функцые мы пробрасываем дополнителные параметры ($page)

    Gate::define('view-protected-part', function (?User $user,$page=null) {
            if ($user) {
               return $user->id === $page->author_id;
            }
            return false;
        });


    public function admin()
    {
        // перед тем как вюшка будет отдана пользователю  будем проверять токое право
//        Gate::authorize('view-protected-part');
//     if .....   Gate::check('view-protected-part');

//        Gate::allows('view-protected-part');


//        // Более расширенно получает класс респонсе
//        $response = Gate::inspect('view-protected-part');
//        // и данный респонсе содержит мотод allowed() если вернет true
//        $response->allowed();
//        
//        // и данный респонсе содержит мотод denied() если вернет false
//        $response->denied();
//
//        // и данный респонсе содержит мотод message() который получет информацыю из гейта
//        $response->message();



        $this->authorize('view-protected-part');

        //есть  какой нибудь из них из гейтов
////        if (Gate::any(['view-protected-part','view-protected-part2'])){
////            //razreseno
////        }


        //нет  какогота  из них из гейтов обратное действие
////        if (Gate::none(['view-protected-part','view-protected-part2'])){
////            //razreseno
////        }
///

        // все ети проверки можно зделать в бладе с помошь @can('view-protected-part') @endcan



        return view('admin.index');
    }

==================================================================================================
 Вларавель также дредусмотрен автоматический поиск политик  то есть 
 если соблюдать определенные соглашения по именеванию классав то ларавель сам найдет политику

    php artisan make:policy InnerContentPolicy


# resource контроллеры 

    php artisan make:policy UserPolicy --model=User

    php artisan make:controller UserController --model=User

# связав __construct в контроллере все методы прежде чем сработать будут смотрет тот метод в UserPolicy толко потом работать
   public function __construct()
   {
        $this->authorizeResource(User::class,'user');
    }

========================================================================================================

#  Laravel. Сервисы, контракты и внедрение зависимостей


================================================================================================================

Добавление пользовательских guards


Her bir middleware ye biz parametir vere bilirik
o parametirlar guard dir 


Вы можете определить свои собственные средства защиты аутентификации,


class AuthServiceProvider extends ServiceProvider
{
/**
* Register any application authentication / authorization services.
*
* @return void
*/
public function boot()
{
$this->registerPolicies();

        Auth::extend('jwt', function ($app, $name, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...
 
            return new JwtGuard(Auth::createUserProvider($config['provider']));
        });
    }
}

Как видно из приведенного выше примера, обратный вызов, переданный extendметоду,
должен возвращать реализацию Illuminate\Contracts\Auth\Guard. Этот интерфейс содержит несколько методов, 
которые вам нужно будет реализовать, чтобы определить пользовательскую защиту. После того, 
как ваш собственный сторож был определен, вы можете сослаться 
на него в guardsконфигурации вашего auth.phpконфигурационного файла:










<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
