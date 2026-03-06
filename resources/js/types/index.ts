export interface Course {
    id: number;
    title: string;
    slug: string;
    description: string;
    icon: string;
    order: number;
    chapters_count?: number;
    chapters?: Chapter[];
}

export interface Chapter {
    id: number;
    course_id: number;
    number: number;
    title: string;
    summary: string;
    content: ContentBlock[];
    course?: Course;
}

export type ContentBlock =
    | { type: 'heading'; level?: number; text: string }
    | { type: 'text'; text: string }
    | { type: 'code'; language: string; code: string; filename?: string }
    | { type: 'comparison'; title?: string; react: string; reactNative: string }
    | { type: 'tip'; text: string }
    | { type: 'warning'; text: string }
    | { type: 'image'; path: string; alt: string; caption?: string }
    | { type: 'list'; items: string[] }
    | { type: 'quiz'; questions: QuizQuestion[] };

export interface QuizQuestion {
    question: string;
    options: string[];
    correct: number;
    explanation: string;
}

// Gamification types
export interface UserProgress {
    completedChapters: Record<string, number[]>; // { courseSlug: [1, 2, 3] }
    xp: number;
    level: number;
    badges: string[];
    quizScores: Record<string, Record<number, number>>; // { courseSlug: { chapterNum: score } }
    streak: number;
    lastVisit: string;
}

export const LEVELS = [
    { level: 1, name: '初心者', minXp: 0 },
    { level: 2, name: '入門者', minXp: 200 },
    { level: 3, name: '見習い', minXp: 500 },
    { level: 4, name: 'コーダー', minXp: 1000 },
    { level: 5, name: '見習いプログラマー', minXp: 1500 },
    { level: 6, name: 'プログラマー', minXp: 2000 },
    { level: 7, name: 'デベロッパー', minXp: 2800 },
    { level: 8, name: 'シニアデベロッパー', minXp: 3500 },
    { level: 9, name: 'エキスパート', minXp: 4500 },
    { level: 10, name: 'ゲーム開発者', minXp: 5500 },
    { level: 11, name: 'シニアゲーム開発者', minXp: 7000 },
    { level: 12, name: 'マスター', minXp: 9000 },
];

export const BADGES = [
    { id: 'first-step', name: '初めの一歩', description: '最初の章を完了した', icon: '🚀' },
    { id: 'component-master', name: 'コンポーネントマスター', description: 'コースA（コンポーネント方式）を完了した', icon: '🎨' },
    { id: 'engine-master', name: 'エンジンマスター', description: 'コースB（ゲームエンジン方式）を完了した', icon: '⚙️' },
    { id: 'double-master', name: 'ダブルマスター', description: '両方のコースを完了した', icon: '👑' },
    { id: 'quiz-king', name: 'クイズキング', description: '全てのクイズで満点を取った', icon: '🏆' },
    { id: 'streak-3', name: '3日連続学習', description: '3日間連続でサイトにアクセスした', icon: '🔥' },
    { id: 'half-way', name: '折り返し地点', description: 'いずれかのコースの半分を完了した', icon: '⭐' },
];

export interface Image {
    id: number;
    filename: string;
    path: string;
    url: string;
    alt: string | null;
    size: number;
    created_at: string;
}

export interface User {
    id: number;
    name: string;
    email: string;
}

export interface PaginatedData<T> {
    data: T[];
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
}
