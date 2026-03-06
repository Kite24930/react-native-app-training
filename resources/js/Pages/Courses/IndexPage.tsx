import { Link } from '@inertiajs/react';
import Layout from '@/Components/Layout';
import { Course } from '@/types';

interface Props {
    courses: (Course & { chapters_count: number })[];
}

const courseIcons: Record<string, string> = {
    'component-animation': '🎨',
    'game-engine': '⚙️',
};

const courseBadges: Record<string, { label: string; color: string }> = {
    'component-animation': { label: '初心者向け', color: 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' },
    'game-engine': { label: '中級者向け', color: 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400' },
};

export default function IndexPage({ courses }: Props) {
    return (
        <Layout title="コース一覧">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div className="mb-10">
                    <h1 className="text-3xl font-bold text-gray-900 dark:text-white mb-3">
                        コース一覧
                    </h1>
                    <p className="text-gray-600 dark:text-gray-400">
                        2つのアプローチでインベーダーゲームの開発を学びます。どちらから始めても OK です。
                    </p>
                </div>

                <div className="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    {courses.map((course) => {
                        const badge = courseBadges[course.slug];
                        return (
                            <div
                                key={course.id}
                                className="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 overflow-hidden hover:shadow-xl transition-shadow"
                            >
                                <div className="p-8">
                                    <div className="flex items-center gap-3 mb-4">
                                        <span className="text-4xl">{courseIcons[course.slug] || '📖'}</span>
                                        {badge && (
                                            <span className={`text-xs font-medium px-2 py-1 rounded-full ${badge.color}`}>
                                                {badge.label}
                                            </span>
                                        )}
                                    </div>
                                    <h2 className="text-xl font-bold text-gray-900 dark:text-white mb-3">
                                        {course.title}
                                    </h2>
                                    <p className="text-gray-600 dark:text-gray-400 text-sm mb-6 leading-relaxed">
                                        {course.description}
                                    </p>
                                    <div className="flex items-center justify-between">
                                        <span className="text-sm text-gray-500 dark:text-gray-400">
                                            全{course.chapters_count}章
                                        </span>
                                        <Link
                                            href={`/courses/${course.slug}`}
                                            className="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors font-medium text-sm"
                                        >
                                            コースを見る
                                            <svg className="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                                            </svg>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        );
                    })}
                </div>
            </div>
        </Layout>
    );
}
