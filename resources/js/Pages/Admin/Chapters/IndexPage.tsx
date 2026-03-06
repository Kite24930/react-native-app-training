import { Link, router } from '@inertiajs/react';
import AdminLayout from '@/Components/AdminLayout';
import { Course, Chapter } from '@/types';

interface Props {
    course: Course;
    chapters: Chapter[];
}

export default function IndexPage({ course, chapters }: Props) {
    const handleDelete = (chapter: Chapter) => {
        if (confirm(`第${chapter.number}章「${chapter.title}」を削除しますか？`)) {
            router.delete(`/admin/courses/${course.id}/chapters/${chapter.id}`);
        }
    };

    return (
        <AdminLayout title={`章管理: ${course.title}`}>
            <div className="flex items-center justify-between mb-6">
                <div>
                    <Link
                        href="/admin/courses"
                        className="text-sm text-gray-500 hover:text-gray-700"
                    >
                        ← コース一覧に戻る
                    </Link>
                    <p className="text-gray-500 dark:text-gray-400 mt-1">{chapters.length}章</p>
                </div>
                <Link
                    href={`/admin/courses/${course.id}/chapters/create`}
                    className="px-4 py-2 bg-primary-600 text-white rounded-lg text-sm hover:bg-primary-700 transition-colors"
                >
                    + 新規章
                </Link>
            </div>

            <div className="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                <div className="divide-y divide-gray-200 dark:divide-gray-800">
                    {chapters.map((chapter) => (
                        <div key={chapter.id} className="p-5 flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-800/50">
                            <div className="flex items-center gap-4">
                                <span className="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center text-primary-600 dark:text-primary-400 font-bold text-sm">
                                    {chapter.number}
                                </span>
                                <div>
                                    <h3 className="font-medium text-gray-900 dark:text-white">{chapter.title}</h3>
                                    <p className="text-sm text-gray-500 dark:text-gray-400 mt-0.5">{chapter.summary}</p>
                                </div>
                            </div>
                            <div className="flex items-center gap-3">
                                <Link
                                    href={`/courses/${course.slug}/chapters/${chapter.number}`}
                                    className="text-sm text-gray-400 hover:text-gray-600"
                                    target="_blank"
                                >
                                    プレビュー
                                </Link>
                                <Link
                                    href={`/admin/courses/${course.id}/chapters/${chapter.id}/edit`}
                                    className="text-sm text-primary-600 hover:text-primary-700"
                                >
                                    編集
                                </Link>
                                <button
                                    onClick={() => handleDelete(chapter)}
                                    className="text-sm text-red-500 hover:text-red-700"
                                >
                                    削除
                                </button>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </AdminLayout>
    );
}
