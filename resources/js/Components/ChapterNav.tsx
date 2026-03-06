import { Link } from '@inertiajs/react';

interface NavChapter {
    number: number;
    title: string;
}

interface Props {
    courseSlug: string;
    prevChapter: NavChapter | null;
    nextChapter: NavChapter | null;
}

export default function ChapterNav({ courseSlug, prevChapter, nextChapter }: Props) {
    return (
        <nav className="mt-12 pt-8 border-t border-gray-200 dark:border-gray-800">
            <div className="flex items-center justify-between">
                {prevChapter ? (
                    <Link
                        href={`/courses/${courseSlug}/chapters/${prevChapter.number}`}
                        className="group flex items-center gap-3 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors"
                    >
                        <svg className="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 19l-7-7 7-7" />
                        </svg>
                        <div className="text-right">
                            <span className="block text-xs text-gray-400 dark:text-gray-500">前の章</span>
                            <span className="block text-sm font-medium">
                                第{prevChapter.number}章: {prevChapter.title}
                            </span>
                        </div>
                    </Link>
                ) : (
                    <div />
                )}

                {nextChapter ? (
                    <Link
                        href={`/courses/${courseSlug}/chapters/${nextChapter.number}`}
                        className="group flex items-center gap-3 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors"
                    >
                        <div>
                            <span className="block text-xs text-gray-400 dark:text-gray-500">次の章</span>
                            <span className="block text-sm font-medium">
                                第{nextChapter.number}章: {nextChapter.title}
                            </span>
                        </div>
                        <svg className="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                        </svg>
                    </Link>
                ) : (
                    <div />
                )}
            </div>
        </nav>
    );
}
