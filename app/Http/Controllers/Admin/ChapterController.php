<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ChapterController extends Controller
{
    public function index(Course $course): Response
    {
        return Inertia::render('Admin/Chapters/IndexPage', [
            'course' => $course,
            'chapters' => $course->chapters()->get(),
        ]);
    }

    public function create(Course $course): Response
    {
        $nextNumber = ($course->chapters()->max('number') ?? 0) + 1;

        return Inertia::render('Admin/Chapters/EditPage', [
            'course' => $course,
            'chapter' => null,
            'nextNumber' => $nextNumber,
        ]);
    }

    public function store(Request $request, Course $course): RedirectResponse
    {
        $validated = $request->validate([
            'number' => 'required|integer',
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|array',
        ]);

        $course->chapters()->create($validated);

        return redirect()->route('admin.courses.chapters.index', $course)
            ->with('success', '章を作成しました。');
    }

    public function edit(Course $course, Chapter $chapter): Response
    {
        return Inertia::render('Admin/Chapters/EditPage', [
            'course' => $course,
            'chapter' => $chapter,
        ]);
    }

    public function update(Request $request, Course $course, Chapter $chapter): RedirectResponse
    {
        $validated = $request->validate([
            'number' => 'required|integer',
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|array',
        ]);

        $chapter->update($validated);

        return redirect()->route('admin.courses.chapters.index', $course)
            ->with('success', '章を更新しました。');
    }

    public function destroy(Course $course, Chapter $chapter): RedirectResponse
    {
        $chapter->delete();

        return redirect()->route('admin.courses.chapters.index', $course)
            ->with('success', '章を削除しました。');
    }
}
