import { Link } from '@inertiajs/react';
import Layout from '@/Components/Layout';
import { useProgress } from '@/hooks/useProgress';
import { Course, Chapter } from '@/types';

interface Props {
    course: Course & { chapters_count: number };
    chapters: Pick<Chapter, 'id' | 'number' | 'title' | 'summary'>[];
}

export default function ShowPage({ course, chapters }: Props) {
    const { isChapterCompleted, getCourseProgress } = useProgress();
    const cp = getCourseProgress(course.slug, course.chapters_count);

    return (
        <Layout title={course.title}>
            <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                {/* Breadcrumb */}
                <nav className="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    <Link href="/courses" className="hover:text-primary-600">コース一覧</Link>
                    <span className="mx-2">/</span>
                    <span className="text-gray-900 dark:text-white">{course.title}</span>
                </nav>

                {/* Course header */}
                <div className="mb-10">
                    <h1 className="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                        {course.title}
                    </h1>
                    <p className="text-gray-600 dark:text-gray-400 leading-relaxed">
                        {course.description}
                    </p>
                    {/* Progress */}
                    <div className="mt-6 p-4 rounded-xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800">
                        <div className="flex items-center justify-between text-sm mb-2">
                            <span className="text-gray-600 dark:text-gray-400">学習進捗</span>
                            <span className="font-medium text-primary-600 dark:text-primary-400">
                                {cp.completed} / {cp.total} 章完了 ({cp.percentage}%)
                            </span>
                        </div>
                        <div className="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                            <div
                                className="bg-gradient-to-r from-primary-500 to-accent-500 h-2.5 rounded-full transition-all"
                                style={{ width: `${cp.percentage}%` }}
                            />
                        </div>
                    </div>
                </div>

                {/* Chapter list */}
                <div className="space-y-3">
                    {chapters.map((chapter) => {
                        const completed = isChapterCompleted(course.slug, chapter.number);
                        return (
                            <Link
                                key={chapter.id}
                                href={`/courses/${course.slug}/chapters/${chapter.number}`}
                                className="group block p-5 rounded-xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 hover:border-primary-300 dark:hover:border-primary-700 hover:shadow-md transition-all"
                            >
                                <div className="flex items-start gap-4">
                                    <div className={`flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm ${
                                        completed
                                            ? 'bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400'
                                            : 'bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400'
                                    }`}>
                                        {completed ? '✓' : chapter.number}
                                    </div>
                                    <div className="flex-1 min-w-0">
                                        <h3 className="font-semibold text-gray-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                            {chapter.title}
                                        </h3>
                                        <p className="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                            {chapter.summary}
                                        </p>
                                    </div>
                                    <svg className="w-5 h-5 text-gray-400 group-hover:text-primary-600 transition-colors flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </Link>
                        );
                    })}
                </div>
            </div>
        </Layout>
    );
}
