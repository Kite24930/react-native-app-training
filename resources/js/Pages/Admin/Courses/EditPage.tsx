import { useForm, Link } from '@inertiajs/react';
import AdminLayout from '@/Components/AdminLayout';
import { Course } from '@/types';
import { FormEvent } from 'react';

interface Props {
    course: Course | null;
}

export default function EditPage({ course }: Props) {
    const isNew = !course;

    const { data, setData, post, put, processing, errors } = useForm({
        title: course?.title || '',
        slug: course?.slug || '',
        description: course?.description || '',
        icon: course?.icon || 'book',
        order: course?.order || 0,
    });

    const handleSubmit = (e: FormEvent) => {
        e.preventDefault();
        if (isNew) {
            post('/admin/courses');
        } else {
            put(`/admin/courses/${course.id}`);
        }
    };

    const generateSlug = () => {
        const slug = data.title
            .toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/\s+/g, '-');
        setData('slug', slug);
    };

    return (
        <AdminLayout title={isNew ? '新規コース作成' : `コース編集: ${course.title}`}>
            <div className="max-w-2xl">
                <Link
                    href="/admin/courses"
                    className="text-sm text-gray-500 hover:text-gray-700 mb-4 inline-block"
                >
                    ← コース一覧に戻る
                </Link>

                <form onSubmit={handleSubmit} className="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6 space-y-5">
                    <div>
                        <label className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            コース名
                        </label>
                        <input
                            type="text"
                            value={data.title}
                            onChange={(e) => setData('title', e.target.value)}
                            onBlur={() => isNew && !data.slug && generateSlug()}
                            className="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                            required
                        />
                        {errors.title && <p className="mt-1 text-sm text-red-600">{errors.title}</p>}
                    </div>

                    <div>
                        <label className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            スラッグ (URL用)
                        </label>
                        <input
                            type="text"
                            value={data.slug}
                            onChange={(e) => setData('slug', e.target.value)}
                            className="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white font-mono"
                            required
                        />
                        {errors.slug && <p className="mt-1 text-sm text-red-600">{errors.slug}</p>}
                    </div>

                    <div>
                        <label className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            説明
                        </label>
                        <textarea
                            value={data.description}
                            onChange={(e) => setData('description', e.target.value)}
                            rows={4}
                            className="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                            required
                        />
                        {errors.description && <p className="mt-1 text-sm text-red-600">{errors.description}</p>}
                    </div>

                    <div className="grid grid-cols-2 gap-4">
                        <div>
                            <label className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                アイコン
                            </label>
                            <input
                                type="text"
                                value={data.icon}
                                onChange={(e) => setData('icon', e.target.value)}
                                className="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                            />
                        </div>
                        <div>
                            <label className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                表示順
                            </label>
                            <input
                                type="number"
                                value={data.order}
                                onChange={(e) => setData('order', parseInt(e.target.value))}
                                className="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                            />
                        </div>
                    </div>

                    <div className="flex items-center gap-3 pt-4">
                        <button
                            type="submit"
                            disabled={processing}
                            className="px-6 py-2.5 bg-primary-600 text-white rounded-lg font-medium hover:bg-primary-700 disabled:opacity-50 transition-colors"
                        >
                            {processing ? '保存中...' : isNew ? '作成' : '更新'}
                        </button>
                        <Link
                            href="/admin/courses"
                            className="px-6 py-2.5 text-gray-600 dark:text-gray-400 hover:text-gray-800 transition-colors"
                        >
                            キャンセル
                        </Link>
                    </div>
                </form>
            </div>
        </AdminLayout>
    );
}
