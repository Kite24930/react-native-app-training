import { Link } from '@inertiajs/react';
import Layout from '@/Components/Layout';
import ContentRenderer from '@/Components/ContentRenderer';
import ChapterNav from '@/Components/ChapterNav';
import ChapterComplete from '@/Components/ChapterComplete';
import XpBar from '@/Components/XpBar';
import { useProgress } from '@/hooks/useProgress';
import { Course, Chapter } from '@/types';
import { useCallback } from 'react';

interface NavChapter {
    number: number;
    title: string;
}

interface Props {
    course: Course;
    chapter: Chapter;
    prevChapter: NavChapter | null;
    nextChapter: NavChapter | null;
    totalChapters: number;
}

export default function ShowPage({ course, chapter, prevChapter, nextChapter, totalChapters }: Props) {
    const {
        progress,
        completeChapter,
        recordQuizScore,
        isChapterCompleted,
        getCourseProgress,
    } = useProgress();

    const completed = isChapterCompleted(course.slug, chapter.number);
    const courseProgress = getCourseProgress(course.slug, totalChapters);

    const handleQuizComplete = useCallback((score: number, total: number) => {
        recordQuizScore(course.slug, chapter.number, score, total);
    }, [course.slug, chapter.number, recordQuizScore]);

    const handleChapterComplete = useCallback(() => {
        completeChapter(course.slug, chapter.number);
    }, [course.slug, chapter.number, completeChapter]);

    return (
        <Layout title={`第${chapter.number}章: ${chapter.title}`}>
            <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                {/* XP Bar (compact) */}
                <div className="mb-6">
                    <XpBar
                        xp={progress.xp}
                        level={progress.level}
                        badges={progress.badges}
                        compact
                    />
                </div>

                {/* Breadcrumb */}
                <nav className="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    <Link href="/courses" className="hover:text-primary-600">コース一覧</Link>
                    <span className="mx-2">/</span>
                    <Link href={`/courses/${course.slug}`} className="hover:text-primary-600">{course.title}</Link>
                    <span className="mx-2">/</span>
                    <span className="text-gray-900 dark:text-white">第{chapter.number}章</span>
                </nav>

                {/* Progress bar */}
                <div className="mb-8">
                    <div className="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 mb-2">
                        <span>コース進捗</span>
                        <span>{courseProgress.completed} / {courseProgress.total} 章完了 ({courseProgress.percentage}%)</span>
                    </div>
                    <div className="w-full bg-gray-200 dark:bg-gray-800 rounded-full h-2">
                        <div
                            className="bg-primary-600 h-2 rounded-full transition-all"
                            style={{ width: `${courseProgress.percentage}%` }}
                        />
                    </div>
                </div>

                {/* Chapter header */}
                <div className="mb-10">
                    <div className="flex items-center gap-3 mb-3">
                        <span className={`inline-flex items-center justify-center w-8 h-8 rounded-full font-bold text-sm ${
                            completed
                                ? 'bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400'
                                : 'bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400'
                        }`}>
                            {completed ? '✓' : chapter.number}
                        </span>
                        <span className="text-sm text-gray-500 dark:text-gray-400">{course.title}</span>
                    </div>
                    <h1 className="text-3xl font-bold text-gray-900 dark:text-white">
                        {chapter.title}
                    </h1>
                    <p className="mt-3 text-gray-600 dark:text-gray-400">
                        {chapter.summary}
                    </p>
                </div>

                {/* Content */}
                <article className="prose-like">
                    <ContentRenderer
                        content={chapter.content}
                        onQuizComplete={handleQuizComplete}
                    />
                </article>

                {/* Complete chapter button */}
                <ChapterComplete
                    isCompleted={completed}
                    onComplete={handleChapterComplete}
                />

                {/* Navigation */}
                <ChapterNav
                    courseSlug={course.slug}
                    prevChapter={prevChapter}
                    nextChapter={nextChapter}
                />
            </div>
        </Layout>
    );
}
