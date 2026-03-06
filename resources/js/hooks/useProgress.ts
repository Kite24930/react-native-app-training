import { useState, useCallback, useEffect } from 'react';
import { UserProgress, LEVELS, BADGES } from '@/types';

const STORAGE_KEY = 'rn-game-lab-progress';

const defaultProgress: UserProgress = {
    completedChapters: {},
    xp: 0,
    level: 1,
    badges: [],
    quizScores: {},
    streak: 0,
    lastVisit: '',
};

function loadProgress(): UserProgress {
    if (typeof window === 'undefined') return defaultProgress;
    try {
        const saved = localStorage.getItem(STORAGE_KEY);
        if (saved) return { ...defaultProgress, ...JSON.parse(saved) };
    } catch {}
    return defaultProgress;
}

function saveProgress(progress: UserProgress) {
    if (typeof window === 'undefined') return;
    localStorage.setItem(STORAGE_KEY, JSON.stringify(progress));
}

function calculateLevel(xp: number): number {
    let level = 1;
    for (const l of LEVELS) {
        if (xp >= l.minXp) level = l.level;
    }
    return level;
}

export function useProgress() {
    const [progress, setProgress] = useState<UserProgress>(defaultProgress);

    useEffect(() => {
        const loaded = loadProgress();
        // Update streak
        const today = new Date().toISOString().split('T')[0];
        const yesterday = new Date(Date.now() - 86400000).toISOString().split('T')[0];

        if (loaded.lastVisit === today) {
            // Already visited today
        } else if (loaded.lastVisit === yesterday) {
            loaded.streak += 1;
        } else if (loaded.lastVisit !== '') {
            loaded.streak = 1;
        } else {
            loaded.streak = 1;
        }
        loaded.lastVisit = today;

        // Check streak badge
        if (loaded.streak >= 3 && !loaded.badges.includes('streak-3')) {
            loaded.badges.push('streak-3');
        }

        saveProgress(loaded);
        setProgress(loaded);
    }, []);

    const completeChapter = useCallback((courseSlug: string, chapterNumber: number) => {
        setProgress((prev) => {
            const completed = { ...prev.completedChapters };
            if (!completed[courseSlug]) completed[courseSlug] = [];
            if (completed[courseSlug].includes(chapterNumber)) return prev;

            completed[courseSlug] = [...completed[courseSlug], chapterNumber];
            let newXp = prev.xp + 100;
            const newBadges = [...prev.badges];

            // Check badges
            const totalCompleted = Object.values(completed).flat().length;
            if (totalCompleted === 1 && !newBadges.includes('first-step')) {
                newBadges.push('first-step');
                newXp += 50;
            }

            // Half-way badge
            const courseChapters = completed[courseSlug]?.length || 0;
            if (courseChapters >= 6 && !newBadges.includes('half-way')) {
                newBadges.push('half-way');
                newXp += 50;
            }

            // Course completion badges
            if ((completed['component-animation']?.length || 0) >= 11 && !newBadges.includes('component-master')) {
                newBadges.push('component-master');
                newXp += 200;
            }
            if ((completed['game-engine']?.length || 0) >= 11 && !newBadges.includes('engine-master')) {
                newBadges.push('engine-master');
                newXp += 200;
            }
            if (
                newBadges.includes('component-master') &&
                newBadges.includes('engine-master') &&
                !newBadges.includes('double-master')
            ) {
                newBadges.push('double-master');
                newXp += 500;
            }

            const newLevel = calculateLevel(newXp);
            const updated: UserProgress = {
                ...prev,
                completedChapters: completed,
                xp: newXp,
                level: newLevel,
                badges: newBadges,
            };
            saveProgress(updated);
            return updated;
        });
    }, []);

    const recordQuizScore = useCallback((courseSlug: string, chapterNumber: number, score: number, totalQuestions: number) => {
        setProgress((prev) => {
            const quizScores = { ...prev.quizScores };
            if (!quizScores[courseSlug]) quizScores[courseSlug] = {};

            const prevScore = quizScores[courseSlug][chapterNumber] || 0;
            if (score <= prevScore) return prev;

            quizScores[courseSlug][chapterNumber] = score;
            const xpGained = score * 20;
            const prevXpGained = prevScore * 20;
            let newXp = prev.xp + (xpGained - prevXpGained);
            const newBadges = [...prev.badges];

            // Check quiz king badge - all quizzes perfect
            const allPerfect = Object.values(quizScores).every((courseScores) =>
                Object.values(courseScores).every((s) => s === totalQuestions)
            );
            if (allPerfect && Object.values(quizScores).flat().length > 0 && !newBadges.includes('quiz-king')) {
                newBadges.push('quiz-king');
                newXp += 300;
            }

            const newLevel = calculateLevel(newXp);
            const updated: UserProgress = {
                ...prev,
                quizScores,
                xp: newXp,
                level: newLevel,
                badges: newBadges,
            };
            saveProgress(updated);
            return updated;
        });
    }, []);

    const isChapterCompleted = useCallback((courseSlug: string, chapterNumber: number) => {
        return progress.completedChapters[courseSlug]?.includes(chapterNumber) || false;
    }, [progress]);

    const getCourseProgress = useCallback((courseSlug: string, totalChapters: number) => {
        const completed = progress.completedChapters[courseSlug]?.length || 0;
        return { completed, total: totalChapters, percentage: Math.round((completed / totalChapters) * 100) };
    }, [progress]);

    const currentLevel = LEVELS.find((l) => l.level === progress.level) || LEVELS[0];
    const nextLevel = LEVELS.find((l) => l.level === progress.level + 1);
    const xpToNext = nextLevel ? nextLevel.minXp - progress.xp : 0;

    return {
        progress,
        completeChapter,
        recordQuizScore,
        isChapterCompleted,
        getCourseProgress,
        currentLevel,
        nextLevel,
        xpToNext,
    };
}
