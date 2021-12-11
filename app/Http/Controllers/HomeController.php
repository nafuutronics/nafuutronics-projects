<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function portfolio()
    {
        return view('home.portfolio');
    }

    public function hosting()
    {
        return view('home.hosting');
    }

    public function migration()
    {
        Artisan::call('migrate');
        return response()->json([
            'message' => Artisan::output()
        ], 200);
    }

    public function migrationRefresh()
    {
        Artisan::call('migrate:refresh');
        return response()->json([
            'message' => Artisan::output()
        ], 200);
    }

    public function storageLink()
    {
        $folderPath = public_path('storage');
        $response = array(
            is_dir($folderPath) && !is_link($folderPath) ? rmdir($folderPath) : "Directory doesn't exists, skipping ...",
            is_file($folderPath) && !is_link($folderPath) ? unlink($folderPath) : "File doesn't exists, skipping ...",
        );
        Artisan::call('storage:link');
        return response()->json([
            'message' => [
                $response,
                Artisan::output()
            ]
        ], 200);
    }
}
