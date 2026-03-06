<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Image;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Admin/DashboardPage', [
            'stats' => [
                'courses' => Course::count(),
                'chapters' => Chapter::count(),
                'images' => Image::count(),
            ],
            'courses' => Course::withCount('chapters')->orderBy('order')->get(),
        ]);
    }
}
