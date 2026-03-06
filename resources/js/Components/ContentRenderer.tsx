import { ContentBlock } from '@/types';
import CodeBlock from './CodeBlock';
import ComparisonTable from './ComparisonTable';
import QuizBlock from './QuizBlock';

interface Props {
    content: ContentBlock[];
    onQuizComplete?: (score: number, total: number) => void;
}

export default function ContentRenderer({ content, onQuizComplete }: Props) {
    return (
        <div className="space-y-6">
            {content.map((block, index) => (
                <ContentBlockRenderer key={index} block={block} onQuizComplete={onQuizComplete} />
            ))}
        </div>
    );
}

function ContentBlockRenderer({ block, onQuizComplete }: { block: ContentBlock; onQuizComplete?: (score: number, total: number) => void }) {
    switch (block.type) {
        case 'heading': {
            const level = block.level || 2;
            const sizeClass = level === 2
                ? 'text-2xl font-bold mt-10 mb-4'
                : level === 3
                    ? 'text-xl font-semibold mt-8 mb-3'
                    : 'text-lg font-medium mt-6 mb-2';
            const className = `${sizeClass} text-gray-900 dark:text-white`;
            if (level === 3) return <h3 className={className}>{block.text}</h3>;
            if (level === 4) return <h4 className={className}>{block.text}</h4>;
            return <h2 className={className}>{block.text}</h2>;
        }

        case 'text':
            return (
                <p className="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-wrap">
                    {block.text}
                </p>
            );

        case 'code':
            return (
                <CodeBlock
                    code={block.code}
                    language={block.language}
                    filename={block.filename}
                />
            );

        case 'comparison':
            return (
                <ComparisonTable
                    title={block.title}
                    react={block.react}
                    reactNative={block.reactNative}
                />
            );

        case 'tip':
            return (
                <div className="my-4 p-4 rounded-lg bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800">
                    <div className="flex gap-3">
                        <span className="text-blue-500 text-lg flex-shrink-0">💡</span>
                        <p className="text-blue-800 dark:text-blue-200 text-sm leading-relaxed">
                            {block.text}
                        </p>
                    </div>
                </div>
            );

        case 'warning':
            return (
                <div className="my-4 p-4 rounded-lg bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800">
                    <div className="flex gap-3">
                        <span className="text-amber-500 text-lg flex-shrink-0">⚠️</span>
                        <p className="text-amber-800 dark:text-amber-200 text-sm leading-relaxed">
                            {block.text}
                        </p>
                    </div>
                </div>
            );

        case 'image':
            return (
                <figure className="my-6">
                    <img
                        src={block.path}
                        alt={block.alt}
                        className="rounded-lg border border-gray-200 dark:border-gray-700 max-w-full"
                    />
                    {block.caption && (
                        <figcaption className="mt-2 text-center text-sm text-gray-500 dark:text-gray-400">
                            {block.caption}
                        </figcaption>
                    )}
                </figure>
            );

        case 'list':
            return (
                <ul className="my-4 space-y-2 pl-6">
                    {block.items.map((item, i) => (
                        <li
                            key={i}
                            className="text-gray-700 dark:text-gray-300 list-disc"
                        >
                            {item}
                        </li>
                    ))}
                </ul>
            );

        case 'quiz':
            return (
                <QuizBlock
                    questions={block.questions}
                    onComplete={onQuizComplete || (() => {})}
                />
            );

        default:
            return null;
    }
}
