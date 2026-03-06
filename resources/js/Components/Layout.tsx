import { Head, Link } from '@inertiajs/react';
import { ReactNode, useState } from 'react';

interface Props {
    title?: string;
    children: ReactNode;
}

export default function Layout({ title, children }: Props) {
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
    const pageTitle = title
        ? `${title} | React Native ゲーム開発学習`
        : 'React Native ゲーム開発学習';

    return (
        <>
            <Head title={pageTitle} />
            <div className="min-h-screen bg-gray-50 dark:bg-gray-950">
                {/* Header */}
                <header className="sticky top-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-800">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="flex items-center justify-between h-16">
                            <Link href="/" className="flex items-center gap-2">
                                <span className="text-2xl">🎮</span>
                                <span className="font-bold text-lg text-gray-900 dark:text-white">
                                    RN Game Lab
                                </span>
                            </Link>

                            <nav className="hidden md:flex items-center gap-6">
                                <Link
                                    href="/"
                                    className="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors"
                                >
                                    ホーム
                                </Link>
                                <Link
                                    href="/courses"
                                    className="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors"
                                >
                                    コース一覧
                                </Link>
                                <Link
                                    href="/dashboard"
                                    className="text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors"
                                >
                                    マイ進捗
                                </Link>
                            </nav>

                            <button
                                className="md:hidden p-2 text-gray-600 dark:text-gray-300"
                                onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
                            >
                                <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    {mobileMenuOpen ? (
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                                    ) : (
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" />
                                    )}
                                </svg>
                            </button>
                        </div>

                        {mobileMenuOpen && (
                            <nav className="md:hidden py-4 border-t border-gray-200 dark:border-gray-800">
                                <Link href="/" className="block py-2 text-gray-600 dark:text-gray-300">
                                    ホーム
                                </Link>
                                <Link href="/courses" className="block py-2 text-gray-600 dark:text-gray-300">
                                    コース一覧
                                </Link>
                                <Link href="/dashboard" className="block py-2 text-gray-600 dark:text-gray-300">
                                    マイ進捗
                                </Link>
                            </nav>
                        )}
                    </div>
                </header>

                {/* Main content */}
                <main>{children}</main>

                {/* Footer */}
                <footer className="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 mt-20">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div>
                                <h3 className="font-bold text-gray-900 dark:text-white mb-3">
                                    🎮 RN Game Lab
                                </h3>
                                <p className="text-sm text-gray-500 dark:text-gray-400">
                                    React Native でモバイルゲーム開発を学ぶための実践的な学習サイトです。
                                </p>
                            </div>
                            <div>
                                <h4 className="font-semibold text-gray-900 dark:text-white mb-3">コンテンツ</h4>
                                <ul className="space-y-2 text-sm text-gray-500 dark:text-gray-400">
                                    <li><Link href="/courses/component-animation" className="hover:text-primary-600">コンポーネント方式</Link></li>
                                    <li><Link href="/courses/game-engine" className="hover:text-primary-600">ゲームエンジン方式</Link></li>
                                </ul>
                            </div>
                            <div>
                                <h4 className="font-semibold text-gray-900 dark:text-white mb-3">対象者</h4>
                                <p className="text-sm text-gray-500 dark:text-gray-400">
                                    Laravel + React を使う Web エンジニアが、新しくモバイルアプリ開発を学ぶためのコンテンツです。
                                </p>
                            </div>
                        </div>
                        <div className="mt-8 pt-8 border-t border-gray-200 dark:border-gray-800 text-center text-sm text-gray-400">
                            © 2026 RN Game Lab
                        </div>
                    </div>
                </footer>
            </div>
        </>
    );
}
