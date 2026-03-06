<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Course;
use Inertia\Inertia;
use Inertia\Response;

class ChapterController extends Controller
{
    public function show(string $slug, int $number): Response
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $chapter = Chapter::where('course_id', $course->id)->where('number', $number)->firstOrFail();

        $prevChapter = Chapter::where('course_id', $course->id)
            ->where('number', '<', $number)
            ->orderByDesc('number')
            ->select('number', 'title')
            ->first();

        $nextChapter = Chapter::where('course_id', $course->id)
            ->where('number', '>', $number)
            ->orderBy('number')
            ->select('number', 'title')
            ->first();

        $totalChapters = Chapter::where('course_id', $course->id)->count();

        return Inertia::render('Chapters/ShowPage', [
            'course' => $course,
            'chapter' => $chapter,
            'prevChapter' => $prevChapter,
            'nextChapter' => $nextChapter,
            'totalChapters' => $totalChapters,
        ]);
    }
}
