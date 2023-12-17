<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller
{
    public function index(): Response
    {
        $cvs = CV::query()
            ->isActive()
            ->get();

        return Inertia::render('Index', [
            'cvs' => $cvs
        ]);
    }
}
