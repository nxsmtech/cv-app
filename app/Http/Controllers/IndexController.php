<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        $cvs = CV::query()
            ->isActive()
            ->get();

        return view('home', [
            'cvs' => $cvs
        ]);
    }
}
