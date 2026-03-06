import { useState, useCallback } from 'react';

interface Props {
    onUpload: (url: string) => void;
}

export default function ImageUploader({ onUpload }: Props) {
    const [uploading, setUploading] = useState(false);
    const [dragOver, setDragOver] = useState(false);

    const uploadFile = useCallback(async (file: File) => {
        setUploading(true);
        const formData = new FormData();
        formData.append('image', file);

        try {
            const response = await fetch('/admin/images', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector<HTMLMetaElement>('meta[name="csrf-token"]')?.content || '',
                },
            });
            const data = await response.json();
            onUpload(data.url);
        } catch (error) {
            console.error('Upload failed:', error);
        } finally {
            setUploading(false);
        }
    }, [onUpload]);

    const handleDrop = useCallback((e: React.DragEvent) => {
        e.preventDefault();
        setDragOver(false);
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            uploadFile(file);
        }
    }, [uploadFile]);

    const handleFileSelect = useCallback((e: React.ChangeEvent<HTMLInputElement>) => {
        const file = e.target.files?.[0];
        if (file) {
            uploadFile(file);
        }
    }, [uploadFile]);

    return (
        <div
            className={`border-2 border-dashed rounded-lg p-8 text-center transition-colors ${
                dragOver
                    ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20'
                    : 'border-gray-300 dark:border-gray-600 hover:border-gray-400'
            }`}
            onDragOver={(e) => { e.preventDefault(); setDragOver(true); }}
            onDragLeave={() => setDragOver(false)}
            onDrop={handleDrop}
        >
            {uploading ? (
                <div className="text-gray-500 dark:text-gray-400">
                    <div className="animate-spin w-8 h-8 border-2 border-primary-500 border-t-transparent rounded-full mx-auto mb-2" />
                    アップロード中...
                </div>
            ) : (
                <>
                    <p className="text-gray-500 dark:text-gray-400 mb-2">
                        画像をドラッグ＆ドロップ
                    </p>
                    <p className="text-sm text-gray-400 dark:text-gray-500 mb-4">
                        または
                    </p>
                    <label className="inline-block px-4 py-2 bg-primary-600 text-white rounded-lg cursor-pointer hover:bg-primary-700 transition-colors">
                        ファイルを選択
                        <input
                            type="file"
                            accept="image/*"
                            className="hidden"
                            onChange={handleFileSelect}
                        />
                    </label>
                </>
            )}
        </div>
    );
}
