import { Link } from '@inertiajs/react';
import Layout from '@/Components/Layout';
import XpBar from '@/Components/XpBar';
import { useProgress } from '@/hooks/useProgress';
import { Course, BADGES } from '@/types';

interface Props {
    courses: (Course & { chapters_count: number })[];
}

export default function DashboardPage({ courses }: Props) {
    const { progress, getCourseProgress } = useProgress();
    const allBadges = BADGES;

    return (
        <Layout title="学習ダッシュボード">
            <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <h1 className="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                    学習ダッシュボード
                </h1>

                {/* XP & Level */}
                <div className="mb-8">
                    <XpBar
                        xp={progress.xp}
                        level={progress.level}
                        badges={progress.badges}
                    />
                </div>

                {/* Stats */}
                <div className="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    {[
                        { label: '完了章数', value: Object.values(progress.completedChapters).flat().length, icon: '📖' },
                        { label: '獲得XP', value: progress.xp, icon: '⭐' },
                        { label: '連続学習', value: `${progress.streak}日`, icon: '🔥' },
                        { label: 'バッジ', value: progress.badges.length, icon: '🏅' },
                    ].map((stat) => (
                        <div key={stat.label} className="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-4 text-center">
                            <span className="text-2xl block mb-1">{stat.icon}</span>
                            <p className="text-2xl font-bold text-gray-900 dark:text-white">{stat.value}</p>
                            <p className="text-xs text-gray-500 dark:text-gray-400">{stat.label}</p>
                        </div>
                    ))}
                </div>

                {/* Course progress */}
                <h2 className="text-xl font-bold text-gray-900 dark:text-white mb-4">コース進捗</h2>
                <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    {courses.map((course) => {
                        const cp = getCourseProgress(course.slug, course.chapters_count);
                        return (
                            <Link
                                key={course.id}
                                href={`/courses/${course.slug}`}
                                className="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-5 hover:shadow-md transition-shadow"
                            >
                                <h3 className="font-semibold text-gray-900 dark:text-white mb-3">
                                    {course.title}
                                </h3>
                                <div className="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 mb-2">
                                    <span>{cp.completed} / {cp.total} 章完了</span>
                                    <span className="font-medium text-primary-600">{cp.percentage}%</span>
                                </div>
                                <div className="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div
                                        className="bg-primary-600 h-2 rounded-full transition-all"
                                        style={{ width: `${cp.percentage}%` }}
                                    />
                                </div>
                            </Link>
                        );
                    })}
                </div>

                {/* All badges */}
                <h2 className="text-xl font-bold text-gray-900 dark:text-white mb-4">バッジコレクション</h2>
                <div className="grid grid-cols-2 md:grid-cols-4 gap-3">
                    {allBadges.map((badge) => {
                        const earned = progress.badges.includes(badge.id);
                        return (
                            <div
                                key={badge.id}
                                className={`p-4 rounded-xl border text-center transition-all ${
                                    earned
                                        ? 'bg-white dark:bg-gray-900 border-primary-200 dark:border-primary-800'
                                        : 'bg-gray-50 dark:bg-gray-900/50 border-gray-200 dark:border-gray-800 opacity-40'
                                }`}
                            >
                                <span className="text-3xl block mb-2">{earned ? badge.icon : '🔒'}</span>
                                <p className="text-sm font-medium text-gray-900 dark:text-white">{badge.name}</p>
                                <p className="text-xs text-gray-500 dark:text-gray-400 mt-1">{badge.description}</p>
                            </div>
                        );
                    })}
                </div>
            </div>
        </Layout>
    );
}
