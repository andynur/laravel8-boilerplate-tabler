<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $redirect = 'login';
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                $redirect = 'admin/dashboard';
            }

            if (auth()->user()->isUser()) {
                $redirect = 'dashboard';
            }
        }

        return redirect($redirect);
    }
}
