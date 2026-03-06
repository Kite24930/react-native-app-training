import CodeBlock from './CodeBlock';

interface Props {
    title?: string;
    react: string;
    reactNative: string;
}

export default function ComparisonTable({ title, react, reactNative }: Props) {
    return (
        <div className="my-6">
            {title && (
                <h4 className="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                    {title}
                </h4>
            )}
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <div className="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1 flex items-center gap-2">
                        <span className="w-2 h-2 rounded-full bg-blue-500"></span>
                        React (Web)
                    </div>
                    <CodeBlock code={react} language="tsx" />
                </div>
                <div>
                    <div className="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1 flex items-center gap-2">
                        <span className="w-2 h-2 rounded-full bg-green-500"></span>
                        React Native
                    </div>
                    <CodeBlock code={reactNative} language="tsx" />
                </div>
            </div>
        </div>
    );
}
