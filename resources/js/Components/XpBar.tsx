import { LEVELS, BADGES } from '@/types';

interface Props {
    xp: number;
    level: number;
    badges: string[];
    compact?: boolean;
}

export default function XpBar({ xp, level, badges, compact = false }: Props) {
    const currentLevel = LEVELS.find((l) => l.level === level) || LEVELS[0];
    const nextLevel = LEVELS.find((l) => l.level === level + 1);
    const prevLevelXp = currentLevel.minXp;
    const nextLevelXp = nextLevel?.minXp || currentLevel.minXp;
    const progressInLevel = nextLevel
        ? ((xp - prevLevelXp) / (nextLevelXp - prevLevelXp)) * 100
        : 100;

    const earnedBadges = BADGES.filter((b) => badges.includes(b.id));

    if (compact) {
        return (
            <div className="flex items-center gap-3 text-sm">
                <div className="flex items-center gap-1.5">
                    <span className="text-yellow-500">⭐</span>
                    <span className="font-medium text-gray-900 dark:text-white">Lv.{level}</span>
                    <span className="text-gray-500 dark:text-gray-400">{currentLevel.name}</span>
                </div>
                <div className="flex-1 max-w-32 bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div
                        className="bg-gradient-to-r from-primary-500 to-accent-500 h-2 rounded-full transition-all"
                        style={{ width: `${Math.min(progressInLevel, 100)}%` }}
                    />
                </div>
                <span className="text-gray-500 dark:text-gray-400 text-xs">{xp} XP</span>
            </div>
        );
    }

    return (
        <div className="bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-800 p-6">
            <div className="flex items-center justify-between mb-4">
                <div>
                    <h3 className="text-lg font-bold text-gray-900 dark:text-white">
                        Lv.{level} {currentLevel.name}
                    </h3>
                    <p className="text-sm text-gray-500 dark:text-gray-400">
                        {xp} XP
                        {nextLevel && ` / 次のレベルまで ${nextLevel.minXp - xp} XP`}
                    </p>
                </div>
                <span className="text-4xl">⭐</span>
            </div>

            {/* XP progress bar */}
            <div className="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3 mb-6">
                <div
                    className="bg-gradient-to-r from-primary-500 to-accent-500 h-3 rounded-full transition-all"
                    style={{ width: `${Math.min(progressInLevel, 100)}%` }}
                />
            </div>

            {/* Badges */}
            {earnedBadges.length > 0 && (
                <div>
                    <h4 className="text-sm font-medium text-gray-500 dark:text-gray-400 mb-3">
                        獲得バッジ
                    </h4>
                    <div className="flex flex-wrap gap-2">
                        {earnedBadges.map((badge) => (
                            <div
                                key={badge.id}
                                className="flex items-center gap-1.5 px-3 py-1.5 bg-gray-100 dark:bg-gray-800 rounded-full"
                                title={badge.description}
                            >
                                <span>{badge.icon}</span>
                                <span className="text-xs font-medium text-gray-700 dark:text-gray-300">
                                    {badge.name}
                                </span>
                            </div>
                        ))}
                    </div>
                </div>
            )}
        </div>
    );
}
