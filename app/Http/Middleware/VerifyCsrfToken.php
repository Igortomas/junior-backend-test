<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * As rotas que devem ser ignoradas pela verificação CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/contacts',
        '/contacts/*',
    ];
}