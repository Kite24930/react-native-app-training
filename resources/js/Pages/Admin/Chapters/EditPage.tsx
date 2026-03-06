import { useForm, Link } from '@inertiajs/react';
import AdminLayout from '@/Components/AdminLayout';
import { Course, Chapter, ContentBlock } from '@/types';
import { FormEvent, useState } from 'react';

interface Props {
    course: Course;
    chapter: Chapter | null;
    nextNumber?: number;
}

const BLOCK_TYPES = [
    { value: 'heading', label: '見出し' },
    { value: 'text', label: 'テキスト' },
    { value: 'code', label: 'コード' },
    { value: 'comparison', label: '比較' },
    { value: 'tip', label: 'ヒント' },
    { value: 'warning', label: '警告' },
    { value: 'image', label: '画像' },
    { value: 'list', label: 'リスト' },
];

export default function EditPage({ course, chapter, nextNumber }: Props) {
    const isNew = !chapter;

    const { data, setData, post, put, processing, errors } = useForm({
        number: chapter?.number || nextNumber || 1,
        title: chapter?.title || '',
        summary: chapter?.summary || '',
        content: chapter?.content || ([] as ContentBlock[]),
    });

    const [jsonMode, setJsonMode] = useState(false);
    const [jsonText, setJsonText] = useState(JSON.stringify(data.content, null, 2));

    const handleSubmit = (e: FormEvent) => {
        e.preventDefault();
        if (jsonMode) {
            try {
                const parsed = JSON.parse(jsonText);
                data.content = parsed;
            } catch {
                alert('JSONの形式が正しくありません');
                return;
            }
        }
        if (isNew) {
            post(`/admin/courses/${course.id}/chapters`);
        } else {
            put(`/admin/courses/${course.id}/chapters/${chapter.id}`);
        }
    };

    const addBlock = (type: string) => {
        let newBlock: ContentBlock;
        switch (type) {
            case 'heading':
                newBlock = { type: 'heading', level: 2, text: '' };
                break;
            case 'text':
                newBlock = { type: 'text', text: '' };
                break;
            case 'code':
                newBlock = { type: 'code', language: 'tsx', code: '', filename: '' };
                break;
            case 'comparison':
                newBlock = { type: 'comparison', title: '', react: '', reactNative: '' };
                break;
            case 'tip':
                newBlock = { type: 'tip', text: '' };
                break;
            case 'warning':
                newBlock = { type: 'warning', text: '' };
                break;
            case 'image':
                newBlock = { type: 'image', path: '', alt: '' };
                break;
            case 'list':
                newBlock = { type: 'list', items: [''] };
                break;
            default:
                return;
        }
        const newContent = [...data.content, newBlock];
        setData('content', newContent);
        setJsonText(JSON.stringify(newContent, null, 2));
    };

    const updateBlock = (index: number, updates: Partial<ContentBlock>) => {
        const newContent = data.content.map((block, i) =>
            i === index ? { ...block, ...updates } : block
        ) as ContentBlock[];
        setData('content', newContent);
        setJsonText(JSON.stringify(newContent, null, 2));
    };

    const removeBlock = (index: number) => {
        const newContent = data.content.filter((_, i) => i !== index);
        setData('content', newContent);
        setJsonText(JSON.stringify(newContent, null, 2));
    };

    const moveBlock = (index: number, direction: -1 | 1) => {
        const newIndex = index + direction;
        if (newIndex < 0 || newIndex >= data.content.length) return;
        const newContent = [...data.content];
        [newContent[index], newContent[newIndex]] = [newContent[newIndex], newContent[index]];
        setData('content', newContent);
        setJsonText(JSON.stringify(newContent, null, 2));
    };

    return (
        <AdminLayout title={isNew ? '新規章作成' : `章編集: 第${chapter.number}章`}>
            <div className="max-w-4xl">
                <Link
                    href={`/admin/courses/${course.id}/chapters`}
                    className="text-sm text-gray-500 hover:text-gray-700 mb-4 inline-block"
                >
                    ← {course.title} の章一覧に戻る
                </Link>

                <form onSubmit={handleSubmit} className="space-y-6">
                    {/* Basic info */}
                    <div className="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6 space-y-4">
                        <div className="grid grid-cols-4 gap-4">
                            <div>
                                <label className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">章番号</label>
                                <input
                                    type="number"
                                    value={data.number}
                                    onChange={(e) => setData('number', parseInt(e.target.value))}
                                    className="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                                    required
                                />
                            </div>
                            <div className="col-span-3">
                                <label className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">タイトル</label>
                                <input
                                    type="text"
                                    value={data.title}
                                    onChange={(e) => setData('title', e.target.value)}
                                    className="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                                    required
                                />
                            </div>
                        </div>
                        <div>
                            <label className="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">概要</label>
                            <textarea
                                value={data.summary}
                                onChange={(e) => setData('summary', e.target.value)}
                                rows={2}
                                className="w-full px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                                required
                            />
                        </div>
                    </div>

                    {/* Content editor */}
                    <div className="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                        <div className="flex items-center justify-between mb-4">
                            <h2 className="text-lg font-semibold text-gray-900 dark:text-white">コンテンツ</h2>
                            <button
                                type="button"
                                onClick={() => {
                                    if (!jsonMode) {
                                        setJsonText(JSON.stringify(data.content, null, 2));
                                    } else {
                                        try {
                                            setData('content', JSON.parse(jsonText));
                                        } catch {
                                            alert('JSONの形式が正しくありません');
                                            return;
                                        }
                                    }
                                    setJsonMode(!jsonMode);
                                }}
                                className="text-sm text-primary-600 hover:text-primary-700"
                            >
                                {jsonMode ? 'ビジュアルモード' : 'JSONモード'}
                            </button>
                        </div>

                        {jsonMode ? (
                            <textarea
                                value={jsonText}
                                onChange={(e) => setJsonText(e.target.value)}
                                rows={30}
                                className="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-white font-mono text-sm"
                            />
                        ) : (
                            <div className="space-y-4">
                                {data.content.map((block, index) => (
                                    <div key={index} className="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                                        <div className="flex items-center justify-between mb-3">
                                            <span className="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded">
                                                {BLOCK_TYPES.find(t => t.value === block.type)?.label || block.type}
                                            </span>
                                            <div className="flex items-center gap-1">
                                                <button type="button" onClick={() => moveBlock(index, -1)} className="p-1 text-gray-400 hover:text-gray-600" title="上へ">↑</button>
                                                <button type="button" onClick={() => moveBlock(index, 1)} className="p-1 text-gray-400 hover:text-gray-600" title="下へ">↓</button>
                                                <button type="button" onClick={() => removeBlock(index)} className="p-1 text-red-400 hover:text-red-600" title="削除">×</button>
                                            </div>
                                        </div>
                                        <BlockEditor block={block} onChange={(updates) => updateBlock(index, updates)} />
                                    </div>
                                ))}

                                <div className="flex flex-wrap gap-2 pt-4 border-t border-gray-200 dark:border-gray-700">
                                    {BLOCK_TYPES.map((type) => (
                                        <button
                                            key={type.value}
                                            type="button"
                                            onClick={() => addBlock(type.value)}
                                            className="px-3 py-1.5 text-sm bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                                        >
                                            + {type.label}
                                        </button>
                                    ))}
                                </div>
                            </div>
                        )}
                    </div>

                    {/* Submit */}
                    <div className="flex items-center gap-3">
                        <button
                            type="submit"
                            disabled={processing}
                            className="px-6 py-2.5 bg-primary-600 text-white rounded-lg font-medium hover:bg-primary-700 disabled:opacity-50 transition-colors"
                        >
                            {processing ? '保存中...' : isNew ? '作成' : '更新'}
                        </button>
                        <Link
                            href={`/admin/courses/${course.id}/chapters`}
                            className="px-6 py-2.5 text-gray-600 dark:text-gray-400"
                        >
                            キャンセル
                        </Link>
                    </div>
                </form>
            </div>
        </AdminLayout>
    );
}

function BlockEditor({ block, onChange }: { block: ContentBlock; onChange: (updates: any) => void }) {
    switch (block.type) {
        case 'heading':
            return (
                <div className="space-y-2">
                    <select
                        value={block.level || 2}
                        onChange={(e) => onChange({ level: parseInt(e.target.value) })}
                        className="px-3 py-1.5 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm"
                    >
                        <option value={2}>H2</option>
                        <option value={3}>H3</option>
                        <option value={4}>H4</option>
                    </select>
                    <input
                        type="text"
                        value={block.text}
                        onChange={(e) => onChange({ text: e.target.value })}
                        placeholder="見出しテキスト"
                        className="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                    />
                </div>
            );

        case 'text':
        case 'tip':
        case 'warning':
            return (
                <textarea
                    value={block.text}
                    onChange={(e) => onChange({ text: e.target.value })}
                    rows={3}
                    placeholder={block.type === 'tip' ? 'ヒントテキスト' : block.type === 'warning' ? '警告テキスト' : '本文テキスト'}
                    className="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                />
            );

        case 'code':
            return (
                <div className="space-y-2">
                    <div className="flex gap-2">
                        <select
                            value={block.language}
                            onChange={(e) => onChange({ language: e.target.value })}
                            className="px-3 py-1.5 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm"
                        >
                            {['tsx', 'typescript', 'javascript', 'jsx', 'bash', 'json', 'php', 'css'].map(l => (
                                <option key={l} value={l}>{l}</option>
                            ))}
                        </select>
                        <input
                            type="text"
                            value={block.filename || ''}
                            onChange={(e) => onChange({ filename: e.target.value })}
                            placeholder="ファイル名 (任意)"
                            className="flex-1 px-3 py-1.5 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm"
                        />
                    </div>
                    <textarea
                        value={block.code}
                        onChange={(e) => onChange({ code: e.target.value })}
                        rows={8}
                        placeholder="コードを入力"
                        className="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white font-mono text-sm"
                    />
                </div>
            );

        case 'comparison':
            return (
                <div className="space-y-2">
                    <input
                        type="text"
                        value={block.title || ''}
                        onChange={(e) => onChange({ title: e.target.value })}
                        placeholder="比較タイトル (任意)"
                        className="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                    />
                    <div className="grid grid-cols-2 gap-2">
                        <div>
                            <label className="text-xs text-gray-500 mb-1 block">React (Web)</label>
                            <textarea
                                value={block.react}
                                onChange={(e) => onChange({ react: e.target.value })}
                                rows={5}
                                className="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white font-mono text-sm"
                            />
                        </div>
                        <div>
                            <label className="text-xs text-gray-500 mb-1 block">React Native</label>
                            <textarea
                                value={block.reactNative}
                                onChange={(e) => onChange({ reactNative: e.target.value })}
                                rows={5}
                                className="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white font-mono text-sm"
                            />
                        </div>
                    </div>
                </div>
            );

        case 'image':
            return (
                <div className="space-y-2">
                    <input
                        type="text"
                        value={block.path}
                        onChange={(e) => onChange({ path: e.target.value })}
                        placeholder="画像パス (/storage/images/...)"
                        className="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                    />
                    <input
                        type="text"
                        value={block.alt}
                        onChange={(e) => onChange({ alt: e.target.value })}
                        placeholder="alt テキスト"
                        className="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                    />
                    <input
                        type="text"
                        value={block.caption || ''}
                        onChange={(e) => onChange({ caption: e.target.value })}
                        placeholder="キャプション (任意)"
                        className="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                    />
                </div>
            );

        case 'list':
            return (
                <div className="space-y-2">
                    {block.items.map((item, i) => (
                        <div key={i} className="flex gap-2">
                            <input
                                type="text"
                                value={item}
                                onChange={(e) => {
                                    const newItems = [...block.items];
                                    newItems[i] = e.target.value;
                                    onChange({ items: newItems });
                                }}
                                className="flex-1 px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                            />
                            <button
                                type="button"
                                onClick={() => onChange({ items: block.items.filter((_, idx) => idx !== i) })}
                                className="text-red-400 hover:text-red-600 px-2"
                            >
                                ×
                            </button>
                        </div>
                    ))}
                    <button
                        type="button"
                        onClick={() => onChange({ items: [...block.items, ''] })}
                        className="text-sm text-primary-600 hover:text-primary-700"
                    >
                        + 項目を追加
                    </button>
                </div>
            );

        default:
            return <p className="text-gray-500 text-sm">未対応のブロックタイプです</p>;
    }
}
