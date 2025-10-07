<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Проверяем, авторизован ли пользователь и является ли он администратором
        if (auth()->check() && auth()->user()->isAdmin()) {
            // Перенаправляем администраторов в панель Filament
            return redirect('/admin');
        }

        return $next($request);
    }

}
