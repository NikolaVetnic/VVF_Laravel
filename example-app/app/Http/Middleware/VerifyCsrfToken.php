<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        'http://localhost:8000/test/send',
        'http://localhost:8000/test/register',
        'http://localhost:8000/test/changeUser',
        'http://localhost:8000/test/patchUser',
        'http://localhost:8000/test/deleteUser'
    ];
}
