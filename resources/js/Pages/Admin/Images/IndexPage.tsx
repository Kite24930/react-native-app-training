import { router } from '@inertiajs/react';
import AdminLayout from '@/Components/AdminLayout';
import ImageUploader from '@/Components/ImageUploader';
import { Image } from '@/types';

interface Props {
    images: Image[];
}

export default function IndexPage({ images }: Props) {
    const handleUpload = () => {
        router.reload();
    };

    const handleDelete = (image: Image) => {
        if (confirm(`「${image.filename}」を削除しますか？`)) {
            router.delete(`/admin/images/${image.id}`);
        }
    };

    const handleCopyUrl = async (url: string) => {
        await navigator.clipboard.writeText(url);
    };

    const formatFileSize = (bytes: number) => {
        if (bytes < 1024) return `${bytes} B`;
        if (bytes < 1024 * 1024) return `${(bytes / 1024).toFixed(1)} KB`;
        return `${(bytes / (1024 * 1024)).toFixed(1)} MB`;
    };

    return (
        <AdminLayout title="画像管理">
            <div className="space-y-6">
                <ImageUploader onUpload={handleUpload} />

                <div className="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <div className="p-4 border-b border-gray-200 dark:border-gray-800">
                        <h2 className="text-lg font-semibold text-gray-900 dark:text-white">
                            アップロード済み画像 ({images.length}件)
                        </h2>
                    </div>

                    {images.length === 0 ? (
                        <div className="p-8 text-center text-gray-500 dark:text-gray-400">
                            画像がまだアップロードされていません
                        </div>
                    ) : (
                        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                            {images.map((image) => (
                                <div
                                    key={image.id}
                                    className="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden group"
                                >
                                    <div className="aspect-video bg-gray-100 dark:bg-gray-800 relative">
                                        <img
                                            src={image.url}
                                            alt={image.alt || image.filename}
                                            className="w-full h-full object-cover"
                                        />
                                        <div className="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                                            <button
                                                onClick={() => handleCopyUrl(image.url)}
                                                className="px-3 py-1.5 bg-white text-gray-900 rounded text-xs font-medium hover:bg-gray-100"
                                            >
                                                URL コピー
                                            </button>
                                            <button
                                                onClick={() => handleDelete(image)}
                                                className="px-3 py-1.5 bg-red-600 text-white rounded text-xs font-medium hover:bg-red-700"
                                            >
                                                削除
                                            </button>
                                        </div>
                                    </div>
                                    <div className="p-2">
                                        <p className="text-xs text-gray-600 dark:text-gray-300 truncate">{image.filename}</p>
                                        <p className="text-xs text-gray-400">{formatFileSize(image.size)}</p>
                                    </div>
                                </div>
                            ))}
                        </div>
                    )}
                </div>
            </div>
        </AdminLayout>
    );
}
