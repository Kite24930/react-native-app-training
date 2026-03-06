<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Course A
        $courseA = Course::updateOrCreate(
            ['slug' => 'component-animation'],
            [
                'title' => 'React Nativeコンポーネント＋アニメーション方式',
                'description' => 'React Native の View / Image コンポーネントと Animated API を使ってインベーダーゲームを構築します。React の経験をそのまま活かせる、最も親しみやすいアプローチです。HTML → View、CSS → StyleSheet の変換ルールを学び、PanResponder でタッチ操作、Animated API でゲームアニメーションを実装していきます。',
                'icon' => 'component',
                'order' => 1,
            ]
        );

        // Course B
        $courseB = Course::updateOrCreate(
            ['slug' => 'game-engine'],
            [
                'title' => 'react-native-game-engine方式',
                'description' => 'Entity-Component-System (ECS) パターンのゲームエンジンを使った本格的なゲーム開発アプローチです。GameEngine コンポーネントにエンティティとシステムを登録し、ゲームループ・物理演算・衝突判定をシステム関数で実装します。ゲーム開発の設計パターンを深く学べます。',
                'icon' => 'engine',
                'order' => 2,
            ]
        );

        $chaptersA = CourseAChaptersSeeder::getChapters();
        foreach ($chaptersA as $chapter) {
            $courseA->chapters()->updateOrCreate(
                ['number' => $chapter['number']],
                $chapter
            );
        }

        $chaptersB = CourseBChaptersSeeder::getChapters();
        foreach ($chaptersB as $chapter) {
            $courseB->chapters()->updateOrCreate(
                ['number' => $chapter['number']],
                $chapter
            );
        }
    }
}
