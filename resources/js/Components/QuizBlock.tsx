import { useState } from 'react';
import { QuizQuestion } from '@/types';

interface Props {
    questions: QuizQuestion[];
    onComplete: (score: number, total: number) => void;
}

export default function QuizBlock({ questions, onComplete }: Props) {
    const [currentQuestion, setCurrentQuestion] = useState(0);
    const [selectedAnswer, setSelectedAnswer] = useState<number | null>(null);
    const [showResult, setShowResult] = useState(false);
    const [score, setScore] = useState(0);
    const [finished, setFinished] = useState(false);

    const question = questions[currentQuestion];

    const handleAnswer = (index: number) => {
        if (showResult) return;
        setSelectedAnswer(index);
        setShowResult(true);
        if (index === question.correct) {
            setScore((s) => s + 1);
        }
    };

    const handleNext = () => {
        if (currentQuestion < questions.length - 1) {
            setCurrentQuestion((c) => c + 1);
            setSelectedAnswer(null);
            setShowResult(false);
        } else {
            const finalScore = selectedAnswer === question.correct ? score + 0 : score; // score already updated
            setFinished(true);
            onComplete(score + (selectedAnswer === question.correct ? 0 : 0), questions.length);
        }
    };

    if (finished) {
        return (
            <div className="my-8 p-6 rounded-2xl bg-gradient-to-br from-primary-50 to-accent-50 dark:from-primary-900/20 dark:to-accent-900/20 border border-primary-200 dark:border-primary-800 text-center">
                <span className="text-4xl block mb-3">🎯</span>
                <h3 className="text-xl font-bold text-gray-900 dark:text-white mb-2">
                    クイズ結果
                </h3>
                <p className="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-2">
                    {score} / {questions.length}
                </p>
                <p className="text-gray-600 dark:text-gray-400">
                    {score === questions.length
                        ? '🎉 パーフェクト！素晴らしい理解度です！'
                        : score >= questions.length / 2
                            ? '👍 よくできました！間違えた問題を復習しましょう。'
                            : '📖 もう一度内容を読み返してみましょう。'}
                </p>
                <p className="mt-2 text-sm text-primary-600 dark:text-primary-400">
                    +{score * 20} XP 獲得！
                </p>
            </div>
        );
    }

    return (
        <div className="my-8 p-6 rounded-2xl bg-white dark:bg-gray-900 border-2 border-primary-200 dark:border-primary-800">
            <div className="flex items-center justify-between mb-4">
                <h3 className="text-lg font-bold text-gray-900 dark:text-white flex items-center gap-2">
                    <span>📝</span> 章末クイズ
                </h3>
                <span className="text-sm text-gray-500 dark:text-gray-400">
                    {currentQuestion + 1} / {questions.length}
                </span>
            </div>

            {/* Progress dots */}
            <div className="flex gap-1 mb-6">
                {questions.map((_, i) => (
                    <div
                        key={i}
                        className={`h-1 flex-1 rounded-full ${
                            i < currentQuestion
                                ? 'bg-primary-500'
                                : i === currentQuestion
                                    ? 'bg-primary-300'
                                    : 'bg-gray-200 dark:bg-gray-700'
                        }`}
                    />
                ))}
            </div>

            <p className="text-gray-900 dark:text-white font-medium mb-4">
                {question.question}
            </p>

            <div className="space-y-2">
                {question.options.map((option, i) => {
                    let btnClass = 'w-full text-left p-3 rounded-lg border transition-all ';
                    if (!showResult) {
                        btnClass += selectedAnswer === i
                            ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20'
                            : 'border-gray-200 dark:border-gray-700 hover:border-primary-300 dark:hover:border-primary-600';
                    } else if (i === question.correct) {
                        btnClass += 'border-green-500 bg-green-50 dark:bg-green-900/20';
                    } else if (i === selectedAnswer) {
                        btnClass += 'border-red-500 bg-red-50 dark:bg-red-900/20';
                    } else {
                        btnClass += 'border-gray-200 dark:border-gray-700 opacity-50';
                    }

                    return (
                        <button
                            key={i}
                            onClick={() => handleAnswer(i)}
                            className={btnClass}
                        >
                            <span className="text-sm text-gray-700 dark:text-gray-300">
                                <span className="font-medium mr-2">
                                    {String.fromCharCode(65 + i)}.
                                </span>
                                {option}
                            </span>
                        </button>
                    );
                })}
            </div>

            {showResult && (
                <div className={`mt-4 p-3 rounded-lg ${
                    selectedAnswer === question.correct
                        ? 'bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800'
                        : 'bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800'
                }`}>
                    <p className="text-sm font-medium mb-1">
                        {selectedAnswer === question.correct ? '✅ 正解！' : '❌ 不正解'}
                    </p>
                    <p className="text-sm text-gray-600 dark:text-gray-400">
                        {question.explanation}
                    </p>
                </div>
            )}

            {showResult && (
                <button
                    onClick={handleNext}
                    className="mt-4 px-5 py-2 bg-primary-600 text-white rounded-lg text-sm font-medium hover:bg-primary-700 transition-colors"
                >
                    {currentQuestion < questions.length - 1 ? '次の問題 →' : '結果を見る'}
                </button>
            )}
        </div>
    );
}
