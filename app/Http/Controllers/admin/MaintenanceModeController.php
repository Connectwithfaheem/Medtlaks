<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;


class MaintenanceModeController extends Controller
{
    //
    public function index(){
        return view('admin.Maintenance.Maintenance');
    }
    public function maintenance(Request $request)
{
    if ($request->input('action') === 'toggle') {
        // Toggle maintenance mode
        if (app()->isDownForMaintenance()) {
            // If maintenance mode is enabled, disable it
            \Artisan::call('up');
            $message = 'Maintenance mode disabled successfully!';
        } else {
            // If maintenance mode is disabled, enable it
            \Artisan::call('down');
            $message = 'Maintenance mode enabled successfully!';
        }
    } else {
        // Handle other actions or invalid requests
        abort(400, 'Invalid request');
    }

    return redirect()->back()->with('status', $message);
}
}
