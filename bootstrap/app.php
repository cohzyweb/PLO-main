<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(\App\Http\Middleware\SetLocale::class);

        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'auth.multiple' => \App\Http\Middleware\AuthenticateMultiple::class,
        ]);
        /*
        $middleware->group('web', [
            EnsureFrontendRequestsAreStateful::class,
        ]);
		*/
        $middleware->redirectGuestsTo(function (Request $request) {
            if ($request->routeIs('admin.*')) {
                return route('admin.login');
            }else{
                return route('login');
            }
            // return '/';
        });

        $middleware->redirectUsersTo(function (Request $request) {
            if ($request->routeIs('admin.login')) {
                return route('admin.home');
            }else{
                return route('login');
            }
            // return '/';
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
