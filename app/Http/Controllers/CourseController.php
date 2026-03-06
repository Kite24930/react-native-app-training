<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Inertia\Inertia;
use Inertia\Response;

class CourseController extends Controller
{
    public function index(): Response
    {
        $courses = Course::withCount('chapters')->orderBy('order')->get();

        return Inertia::render('Courses/IndexPage', [
            'courses' => $courses,
        ]);
    }

    public function show(string $slug): Response
    {
        $course = Course::where('slug', $slug)->withCount('chapters')->firstOrFail();
        $chapters = $course->chapters()->select('id', 'course_id', 'number', 'title', 'summary')->get();

        return Inertia::render('Courses/ShowPage', [
            'course' => $course,
            'chapters' => $chapters,
        ]);
    }
}
