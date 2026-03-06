import { useState, useEffect } from 'react';

interface Props {
    isCompleted: boolean;
    onComplete: () => void;
    xpGained?: number;
}

export default function ChapterComplete({ isCompleted, onComplete, xpGained = 100 }: Props) {
    const [showAnimation, setShowAnimation] = useState(false);

    const handleComplete = () => {
        if (isCompleted) return;
        setShowAnimation(true);
        onComplete();
        setTimeout(() => setShowAnimation(false), 2000);
    };

    if (isCompleted) {
        return (
            <div className="my-8 p-6 rounded-2xl bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-center">
                <span className="text-3xl block mb-2">✅</span>
                <p className="font-medium text-green-800 dark:text-green-200">
                    この章は完了済みです
                </p>
            </div>
        );
    }

    return (
        <div className="my-8 text-center">
            {showAnimation && (
                <div className="mb-4 animate-bounce">
                    <span className="text-4xl">🎉</span>
                    <p className="text-primary-600 dark:text-primary-400 font-bold">
                        +{xpGained} XP!
                    </p>
                </div>
            )}
            <button
                onClick={handleComplete}
                className="px-8 py-3 bg-gradient-to-r from-primary-600 to-accent-600 text-white rounded-xl font-bold text-lg hover:from-primary-700 hover:to-accent-700 transition-all transform hover:scale-105 shadow-lg"
            >
                🏁 この章を完了する
            </button>
            <p className="mt-2 text-sm text-gray-500 dark:text-gray-400">
                完了すると {xpGained} XP を獲得できます
            </p>
        </div>
    );
}
