<?php

namespace App\Contracts\Controllers;

use Illuminate\Http\RedirectResponse;

interface BaseControllerInterface
{
    public function redirectWithSuccess(string $route, string $message): RedirectResponse;

    public function redirectBackWithError(string $message): RedirectResponse;
}