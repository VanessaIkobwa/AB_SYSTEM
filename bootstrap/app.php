<?php
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LecturerMiddleware;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Middleware\AcademicAdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'lecturer' => LecturerMiddleware::class,
            'student' => StudentMiddleware::class,
            'academic_admin' => AcademicAdminMiddleware::class,
        ]);
    
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
