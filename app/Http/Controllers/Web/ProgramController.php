<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProgramController extends Controller
{
    public function ted()
    {
        return Inertia::render('web/programs/ted');
    }

    public function cba()
    {
        return Inertia::render('web/programs/cba');
    }

    public function cit()
    {
        return Inertia::render('web/programs/cit');
    }
}
