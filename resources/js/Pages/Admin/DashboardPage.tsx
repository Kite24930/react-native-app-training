import { Link } from '@inertiajs/react';
import AdminLayout from '@/Components/AdminLayout';
import { Course } from '@/types';

interface Props {
    stats: {
        courses: number;
        chapters: number;
        images: number;
    };
    courses: (Course & { chapters_count: number })[];
}

export default function DashboardPage({ stats, courses }: Props) {
    return (
        <AdminLayout title="ダッシュボード">
            {/* Stats */}
            <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                {[
                    { label: 'コース数', value: stats.courses, icon: '📚' },
                    { label: '章数', value: stats.chapters, icon: '📖' },
                    { label: '画像数', value: stats.images, icon: '🖼️' },
                ].map((stat) => (
                    <div
                        key={stat.label}
                        className="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6"
                    >
                        <div className="flex items-center justify-between">
                            <div>
                                <p className="text-sm text-gray-500 dark:text-gray-400">{stat.label}</p>
                                <p className="text-3xl font-bold text-gray-900 dark:text-white mt-1">{stat.value}</p>
                            </div>
                            <span className="text-3xl">{stat.icon}</span>
                        </div>
                    </div>
                ))}
            </div>

            {/* Course list */}
            <div className="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800">
                <div className="p-6 border-b border-gray-200 dark:border-gray-800 flex items-center justify-between">
                    <h2 className="text-lg font-semibold text-gray-900 dark:text-white">コース一覧</h2>
                    <Link
                        href="/admin/courses/create"
                        className="px-4 py-2 bg-primary-600 text-white rounded-lg text-sm hover:bg-primary-700 transition-colors"
                    >
                        + 新規コース
                    </Link>
                </div>
                <div className="divide-y divide-gray-200 dark:divide-gray-800">
                    {courses.map((course) => (
                        <div key={course.id} className="p-6 flex items-center justify-between">
                            <div>
                                <h3 className="font-medium text-gray-900 dark:text-white">{course.title}</h3>
                                <p className="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    {course.chapters_count}章
                                </p>
                            </div>
                            <div className="flex items-center gap-3">
                                <Link
                                    href={`/admin/courses/${course.id}/chapters`}
                                    className="text-sm text-primary-600 hover:text-primary-700"
                                >
                                    章を管理
                                </Link>
                                <Link
                                    href={`/admin/courses/${course.id}/edit`}
                                    className="text-sm text-gray-500 hover:text-gray-700"
                                >
                                    編集
                                </Link>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </AdminLayout>
    );
}
