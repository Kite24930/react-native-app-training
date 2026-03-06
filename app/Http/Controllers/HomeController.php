<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        $courses = Course::withCount('chapters')->orderBy('order')->get();

        return Inertia::render('HomePage', [
            'courses' => $courses,
        ]);
    }
}
