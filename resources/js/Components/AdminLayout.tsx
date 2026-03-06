import { Head, Link, router } from '@inertiajs/react';
import { ReactNode, useState } from 'react';

interface Props {
    title: string;
    children: ReactNode;
}

export default function AdminLayout({ title, children }: Props) {
    const [sidebarOpen, setSidebarOpen] = useState(false);

    const handleLogout = () => {
        router.post('/admin/logout');
    };

    const navItems = [
        { href: '/admin', label: 'ダッシュボード', icon: '📊' },
        { href: '/admin/courses', label: 'コース管理', icon: '📚' },
        { href: '/admin/images', label: '画像管理', icon: '🖼️' },
    ];

    return (
        <>
            <Head title={`${title} | 管理画面`} />
            <div className="min-h-screen bg-gray-100 dark:bg-gray-950 flex">
                {/* Sidebar */}
                <aside
                    className={`fixed inset-y-0 left-0 z-40 w-64 bg-gray-900 transform transition-transform duration-200 ${
                        sidebarOpen ? 'translate-x-0' : '-translate-x-full'
                    } lg:translate-x-0 lg:static lg:flex-shrink-0`}
                >
                    <div className="flex flex-col h-full">
                        <div className="p-4 border-b border-gray-800">
                            <Link href="/admin" className="flex items-center gap-2 text-white">
                                <span className="text-xl">🎮</span>
                                <span className="font-bold">管理画面</span>
                            </Link>
                        </div>

                        <nav className="flex-1 p-4 space-y-1">
                            {navItems.map((item) => (
                                <Link
                                    key={item.href}
                                    href={item.href}
                                    className="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors"
                                >
                                    <span>{item.icon}</span>
                                    <span className="text-sm">{item.label}</span>
                                </Link>
                            ))}
                        </nav>

                        <div className="p-4 border-t border-gray-800">
                            <Link
                                href="/"
                                className="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors text-sm mb-2"
                            >
                                🌐 公開サイトを見る
                            </Link>
                            <button
                                onClick={handleLogout}
                                className="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors text-sm"
                            >
                                🚪 ログアウト
                            </button>
                        </div>
                    </div>
                </aside>

                {/* Overlay */}
                {sidebarOpen && (
                    <div
                        className="fixed inset-0 z-30 bg-black/50 lg:hidden"
                        onClick={() => setSidebarOpen(false)}
                    />
                )}

                {/* Main content */}
                <div className="flex-1 flex flex-col min-w-0">
                    <header className="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 px-4 py-3 flex items-center gap-4">
                        <button
                            className="lg:hidden p-1 text-gray-600 dark:text-gray-300"
                            onClick={() => setSidebarOpen(true)}
                        >
                            <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <h1 className="text-lg font-semibold text-gray-900 dark:text-white">{title}</h1>
                    </header>

                    <main className="flex-1 p-6">{children}</main>
                </div>
            </div>
        </>
    );
}
