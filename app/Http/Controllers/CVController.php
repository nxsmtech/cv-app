<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class CVController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Create');
    }
}
