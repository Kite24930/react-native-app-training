import { Link } from '@inertiajs/react';
import Layout from '@/Components/Layout';
import { Course } from '@/types';

interface Props {
    courses: (Course & { chapters_count: number })[];
}

const courseIcons: Record<string, string> = {
    'component-animation': '🎨',
    'game-engine': '⚙️',
};

export default function HomePage({ courses }: Props) {
    return (
        <Layout>
            {/* Hero Section */}
            <section className="relative overflow-hidden bg-gradient-to-br from-primary-600 via-primary-700 to-accent-600">
                <div className="absolute inset-0 opacity-10">
                    <div className="absolute top-10 left-10 text-6xl animate-bounce" style={{ animationDelay: '0s' }}>👾</div>
                    <div className="absolute top-20 right-20 text-4xl animate-bounce" style={{ animationDelay: '0.5s' }}>🚀</div>
                    <div className="absolute bottom-10 left-1/3 text-5xl animate-bounce" style={{ animationDelay: '1s' }}>🎮</div>
                </div>

                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative">
                    <div className="text-center">
                        <h1 className="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                            React Native で<br />
                            <span className="text-yellow-300">インベーダーゲーム</span>を作ろう
                        </h1>
                        <p className="text-xl text-primary-100 max-w-2xl mx-auto mb-10">
                            Laravel + React の経験を活かして、React Native でモバイルゲーム開発を学ぶ実践的なチュートリアル。
                            ゼロからインベーダーゲームを完成させましょう。
                        </p>
                        <div className="flex flex-col sm:flex-row gap-4 justify-center">
                            <Link
                                href="/courses"
                                className="inline-flex items-center justify-center px-8 py-4 bg-white text-primary-700 font-bold rounded-xl hover:bg-gray-100 transition-colors text-lg"
                            >
                                コースを始める →
                            </Link>
                        </div>
                    </div>
                </div>
            </section>

            {/* Target Audience */}
            <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
                <div className="text-center mb-12">
                    <h2 className="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                        このサイトの対象者
                    </h2>
                    <p className="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                        普段の Web 開発スキルを React Native に応用し、モバイルアプリ開発の世界へ
                    </p>
                </div>

                <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                    {[
                        {
                            icon: '🐘',
                            title: 'Laravel 経験者',
                            desc: 'MVC パターンやアーティザンコマンドに慣れているエンジニア。Expo CLI との類似点を見つけながら学べます。',
                        },
                        {
                            icon: '⚛️',
                            title: 'React 経験者',
                            desc: 'コンポーネント、useState、useEffect の知識がそのまま活かせます。JSX の書き方が少し変わるだけ！',
                        },
                        {
                            icon: '📱',
                            title: 'モバイル開発に挑戦',
                            desc: 'Web の経験を活かしてネイティブアプリを開発。iOS / Android 両対応のスキルを習得できます。',
                        },
                    ].map((item) => (
                        <div
                            key={item.title}
                            className="p-6 rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 hover:shadow-lg transition-shadow"
                        >
                            <span className="text-4xl mb-4 block">{item.icon}</span>
                            <h3 className="text-lg font-bold text-gray-900 dark:text-white mb-2">{item.title}</h3>
                            <p className="text-gray-600 dark:text-gray-400 text-sm">{item.desc}</p>
                        </div>
                    ))}
                </div>
            </section>

            {/* Courses */}
            <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
                <div className="text-center mb-12">
                    <h2 className="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                        2つのアプローチで学ぶ
                    </h2>
                    <p className="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                        同じインベーダーゲームを異なる方法で実装。自分に合ったアプローチを選べます。
                    </p>
                </div>

                <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {courses.map((course) => (
                        <Link
                            key={course.id}
                            href={`/courses/${course.slug}`}
                            className="group p-8 rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 hover:border-primary-300 dark:hover:border-primary-700 hover:shadow-xl transition-all"
                        >
                            <div className="flex items-start gap-4">
                                <span className="text-5xl">
                                    {courseIcons[course.slug] || '📖'}
                                </span>
                                <div className="flex-1">
                                    <h3 className="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                        {course.title}
                                    </h3>
                                    <p className="text-gray-600 dark:text-gray-400 text-sm mb-4">
                                        {course.description}
                                    </p>
                                    <div className="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                        <span className="flex items-center gap-1">
                                            📖 {course.chapters_count}章
                                        </span>
                                        <span className="text-primary-600 dark:text-primary-400 font-medium group-hover:underline">
                                            コースを見る →
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </Link>
                    ))}
                </div>
            </section>

            {/* Quick Comparison */}
            <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
                <div className="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-8 lg:p-12 text-white">
                    <h2 className="text-2xl font-bold mb-8 text-center">
                        React を知っていれば React Native は怖くない
                    </h2>
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 className="text-lg font-semibold mb-3 text-blue-400">React (Web)</h3>
                            <pre className="bg-gray-800/50 rounded-lg p-4 text-sm font-mono overflow-x-auto">
{`<div className="container">
  <p>Hello World</p>
  <img src="logo.png" />
  <button onClick={handleClick}>
    押してね
  </button>
</div>`}
                            </pre>
                        </div>
                        <div>
                            <h3 className="text-lg font-semibold mb-3 text-green-400">React Native</h3>
                            <pre className="bg-gray-800/50 rounded-lg p-4 text-sm font-mono overflow-x-auto">
{`<View style={styles.container}>
  <Text>Hello World</Text>
  <Image source={require('./logo.png')} />
  <TouchableOpacity onPress={handleClick}>
    <Text>押してね</Text>
  </TouchableOpacity>
</View>`}
                            </pre>
                        </div>
                    </div>
                    <p className="text-center mt-8 text-gray-400">
                        コンポーネント名が変わるだけで、ロジックの書き方は同じです！
                    </p>
                </div>
            </section>
        </Layout>
    );
}
