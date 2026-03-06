import { Link, router } from '@inertiajs/react';
import AdminLayout from '@/Components/AdminLayout';
import { Course } from '@/types';

interface Props {
    courses: (Course & { chapters_count: number })[];
}

export default function IndexPage({ courses }: Props) {
    const handleDelete = (course: Course) => {
        if (confirm(`「${course.title}」を削除しますか？関連する章もすべて削除されます。`)) {
            router.delete(`/admin/courses/${course.id}`);
        }
    };

    return (
        <AdminLayout title="コース管理">
            <div className="flex items-center justify-between mb-6">
                <p className="text-gray-500 dark:text-gray-400">{courses.length}件のコース</p>
                <Link
                    href="/admin/courses/create"
                    className="px-4 py-2 bg-primary-600 text-white rounded-lg text-sm hover:bg-primary-700 transition-colors"
                >
                    + 新規コース
                </Link>
            </div>

            <div className="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                <table className="w-full">
                    <thead className="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">順序</th>
                            <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">コース名</th>
                            <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">スラッグ</th>
                            <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">章数</th>
                            <th className="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">操作</th>
                        </tr>
                    </thead>
                    <tbody className="divide-y divide-gray-200 dark:divide-gray-800">
                        {courses.map((course) => (
                            <tr key={course.id} className="hover:bg-gray-50 dark:hover:bg-gray-800/50">
                                <td className="px-6 py-4 text-sm text-gray-900 dark:text-white">{course.order}</td>
                                <td className="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">{course.title}</td>
                                <td className="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 font-mono">{course.slug}</td>
                                <td className="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{course.chapters_count}</td>
                                <td className="px-6 py-4 text-right space-x-3">
                                    <Link
                                        href={`/admin/courses/${course.id}/chapters`}
                                        className="text-sm text-primary-600 hover:text-primary-700"
                                    >
                                        章管理
                                    </Link>
                                    <Link
                                        href={`/admin/courses/${course.id}/edit`}
                                        className="text-sm text-gray-500 hover:text-gray-700"
                                    >
                                        編集
                                    </Link>
                                    <button
                                        onClick={() => handleDelete(course)}
                                        className="text-sm text-red-500 hover:text-red-700"
                                    >
                                        削除
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </AdminLayout>
    );
}
