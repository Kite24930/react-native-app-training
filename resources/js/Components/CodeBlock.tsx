import { Highlight, themes } from 'prism-react-renderer';
import { useState } from 'react';

interface Props {
    code: string;
    language: string;
    filename?: string;
}

export default function CodeBlock({ code, language, filename }: Props) {
    const [copied, setCopied] = useState(false);

    const handleCopy = async () => {
        await navigator.clipboard.writeText(code);
        setCopied(true);
        setTimeout(() => setCopied(false), 2000);
    };

    return (
        <div className="my-4 rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">
            {/* Header */}
            <div className="flex items-center justify-between px-4 py-2 bg-gray-100 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <div className="flex items-center gap-2">
                    {filename && (
                        <span className="text-sm font-mono text-gray-600 dark:text-gray-300">
                            {filename}
                        </span>
                    )}
                    <span className="text-xs px-2 py-0.5 rounded bg-gray-200 dark:bg-gray-700 text-gray-500 dark:text-gray-400 uppercase">
                        {language}
                    </span>
                </div>
                <button
                    onClick={handleCopy}
                    className="text-xs text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors flex items-center gap-1"
                >
                    {copied ? (
                        <>
                            <svg className="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 13l4 4L19 7" />
                            </svg>
                            コピー済み
                        </>
                    ) : (
                        <>
                            <svg className="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            コピー
                        </>
                    )}
                </button>
            </div>

            {/* Code */}
            <Highlight theme={themes.nightOwl} code={code.trim()} language={language as any}>
                {({ style, tokens, getLineProps, getTokenProps }) => (
                    <pre
                        className="p-4 overflow-x-auto text-sm leading-relaxed"
                        style={{ ...style, margin: 0 }}
                    >
                        {tokens.map((line, i) => (
                            <div key={i} {...getLineProps({ line })}>
                                <span className="inline-block w-8 text-right mr-4 text-gray-500 select-none text-xs">
                                    {i + 1}
                                </span>
                                {line.map((token, key) => (
                                    <span key={key} {...getTokenProps({ token })} />
                                ))}
                            </div>
                        ))}
                    </pre>
                )}
            </Highlight>
        </div>
    );
}
