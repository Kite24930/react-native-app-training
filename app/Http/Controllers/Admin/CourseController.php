<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CourseController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Courses/IndexPage', [
            'courses' => Course::withCount('chapters')->orderBy('order')->get(),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Courses/EditPage', [
            'course' => null,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:courses',
            'description' => 'required|string',
            'icon' => 'string|max:50',
            'order' => 'integer',
        ]);

        Course::create($validated);

        return redirect()->route('admin.courses.index')->with('success', 'コースを作成しました。');
    }

    public function edit(Course $course): Response
    {
        return Inertia::render('Admin/Courses/EditPage', [
            'course' => $course,
        ]);
    }

    public function update(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:courses,slug,' . $course->id,
            'description' => 'required|string',
            'icon' => 'string|max:50',
            'order' => 'integer',
        ]);

        $course->update($validated);

        return redirect()->route('admin.courses.index')->with('success', 'コースを更新しました。');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'コースを削除しました。');
    }
}
