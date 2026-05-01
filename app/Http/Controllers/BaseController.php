<?php

namespace App\Http\Controllers;

use App\Contracts\Controllers\BaseControllerInterface;
use Illuminate\Http\RedirectResponse;

abstract class BaseController extends Controller implements BaseControllerInterface
{
    public function redirectWithSuccess(string $route, string $message): RedirectResponse
    {
        return redirect()
            ->route($route)
            ->with('success', $message);
    }

    public function redirectBackWithError(string $message): RedirectResponse
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', $message);
    }
}