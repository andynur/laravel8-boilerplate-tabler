<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.dashboard');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function test()
    {
        return redirect('admin/dashboard')->with('flash_success', 'Berhasil masuk ke halaman dashboard');
    }
}
