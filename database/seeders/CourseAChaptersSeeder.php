<?php

namespace Database\Seeders;

class CourseAChaptersSeeder
{
    public static function getChapters(): array
    {
        return [
            [
                'number' => 1,
                'title' => '環境構築',
                'summary' => 'Expoのセットアップとプロジェクト作成。React開発環境との違いを理解します。',
                'content' => [
                    ['type' => 'heading', 'level' => 2, 'text' => 'Expo プロジェクトの作成'],
                    ['type' => 'text', 'text' => 'React Native の開発には Expo を使います。Expo は React Native の開発ツールキットで、create-react-app に相当するものです。複雑なネイティブ設定なしにアプリ開発を始められます。'],
                    ['type' => 'tip', 'text' => 'Laravel で artisan コマンドを使うように、Expo にも expo CLI があります。プロジェクトの作成、開発サーバーの起動、ビルドなど、開発に必要な操作をコマンドで行えます。'],
                    ['type' => 'code', 'language' => 'bash', 'code' => "# Expo プロジェクトを作成\nnpx create-expo-app SpaceInvaders --template blank-typescript\ncd SpaceInvaders\n\n# 開発サーバーを起動\nnpx expo start"],
                    ['type' => 'comparison', 'title' => 'プロジェクト作成の比較', 'react' => "# React (Web)\nnpx create-react-app my-app --template typescript\ncd my-app\nnpm start", 'reactNative' => "# React Native (Expo)\nnpx create-expo-app my-app --template blank-typescript\ncd my-app\nnpx expo start"],
                    ['type' => 'heading', 'level' => 3, 'text' => 'プロジェクト構造'],
                    ['type' => 'code', 'language' => 'bash', 'code' => "SpaceInvaders/\n├── App.tsx          # エントリポイント (index.html + App.tsx に相当)\n├── app.json         # アプリの設定ファイル\n├── package.json     # 依存関係\n├── tsconfig.json    # TypeScript 設定\n└── assets/          # 画像・フォントなどの静的ファイル"],
                    ['type' => 'text', 'text' => 'React Web では public/index.html がエントリポイントですが、React Native では App.tsx が直接エントリポイントになります。ブラウザの概念がないため、HTMLファイルは不要です。'],
                    ['type' => 'heading', 'level' => 3, 'text' => 'Expo Go でプレビュー'],
                    ['type' => 'text', 'text' => 'npx expo start を実行すると QR コードが表示されます。スマートフォンに Expo Go アプリをインストールし、QR コードを読み取ると実機でプレビューできます。ホットリロードも効くので、コードを保存するとすぐに反映されます。'],
                    ['type' => 'list', 'items' => ['iOS: App Store から「Expo Go」をインストール', 'Android: Google Play から「Expo Go」をインストール', 'QR コードを読み取って接続', 'コード変更は自動で反映（Fast Refresh）']],
                    ['type' => 'warning', 'text' => 'Expo Go は開発用です。本番アプリの配布には EAS Build を使います（第11章で解説）。'],
                    ['type' => 'quiz', 'questions' => [
                        ['question' => 'React Native (Expo) でプロジェクトを作成するコマンドは？', 'options' => ['npx create-expo-app', 'npx create-react-app', 'npx react-native init', 'expo create'], 'correct' => 0, 'explanation' => 'Expo を使う場合は npx create-expo-app でプロジェクトを作成します。'],
                        ['question' => 'React Native のエントリポイントファイルは？', 'options' => ['App.tsx', 'index.html', 'main.tsx', 'index.tsx'], 'correct' => 0, 'explanation' => 'React Native では App.tsx がエントリポイントです。HTMLファイルは使いません。'],
                    ]],
                ],
            ],
            [
                'number' => 2,
                'title' => 'React Native 基礎',
                'summary' => 'React Native特有のコンポーネントとスタイリングの基礎を学びます。',
                'content' => [
                    ['type' => 'heading', 'level' => 2, 'text' => 'HTML → React Native コンポーネント対応表'],
                    ['type' => 'text', 'text' => 'React Native では HTML タグの代わりに専用のコンポーネントを使います。React の知識がそのまま活きますが、コンポーネント名が変わります。'],
                    ['type' => 'list', 'items' => ['<div> → <View> : コンテナ要素', '<p>, <span> → <Text> : テキスト表示（すべての文字列はTextで囲む必要あり）', '<img> → <Image> : 画像表示', '<button> → <TouchableOpacity> or <Pressable> : タッチ操作', '<input> → <TextInput> : テキスト入力', '<scroll> → <ScrollView> or <FlatList> : スクロール']],
                    ['type' => 'comparison', 'title' => 'コンポーネントの比較', 'react' => "<div className=\"container\">\n  <p>Hello World</p>\n  <img src=\"logo.png\" alt=\"Logo\" />\n  <button onClick={handleClick}>\n    ボタン\n  </button>\n</div>", 'reactNative' => "<View style={styles.container}>\n  <Text>Hello World</Text>\n  <Image source={require('./logo.png')} />\n  <TouchableOpacity onPress={handleClick}>\n    <Text>ボタン</Text>\n  </TouchableOpacity>\n</View>"],
                    ['type' => 'heading', 'level' => 2, 'text' => 'StyleSheet による스타이리ング'],
                    ['type' => 'text', 'text' => 'CSS の代わりに StyleSheet.create() でスタイルを定義します。プロパティ名はキャメルケースになります（background-color → backgroundColor）。'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "import { StyleSheet, View, Text } from 'react-native';\n\nexport default function App() {\n  return (\n    <View style={styles.container}>\n      <Text style={styles.title}>Hello React Native!</Text>\n    </View>\n  );\n}\n\nconst styles = StyleSheet.create({\n  container: {\n    flex: 1,\n    backgroundColor: '#000',\n    alignItems: 'center',\n    justifyContent: 'center',\n  },\n  title: {\n    fontSize: 24,\n    fontWeight: 'bold',\n    color: '#0f0',\n  },\n});", 'filename' => 'App.tsx'],
                    ['type' => 'warning', 'text' => 'React Native では文字列は必ず <Text> コンポーネントで囲む必要があります。<View> の直下に文字列を置くとエラーになります。'],
                    ['type' => 'heading', 'level' => 3, 'text' => 'Flexbox のデフォルトの違い'],
                    ['type' => 'text', 'text' => 'Web の CSS では flexDirection のデフォルトが row（横並び）ですが、React Native では column（縦並び）がデフォルトです。モバイルの縦長画面に合わせた設計です。'],
                    ['type' => 'tip', 'text' => 'Laravel の Blade テンプレートから React に移行した経験があれば、HTML → React Native の変換は同じ感覚です。タグ名とスタイルの書き方が変わるだけで、ロジックの組み方は同じです。'],
                    ['type' => 'quiz', 'questions' => [
                        ['question' => 'HTML の <div> に相当する React Native コンポーネントは？', 'options' => ['View', 'Container', 'Box', 'Div'], 'correct' => 0, 'explanation' => 'React Native では View コンポーネントが div の役割を果たします。'],
                        ['question' => 'React Native の Flexbox のデフォルト flexDirection は？', 'options' => ['column', 'row', 'column-reverse', 'row-reverse'], 'correct' => 0, 'explanation' => 'React Native では flexDirection のデフォルトが column です。Web CSS では row がデフォルトです。'],
                        ['question' => 'React Native で文字列を表示するために必要なコンポーネントは？', 'options' => ['Text', 'Label', 'Span', 'Paragraph'], 'correct' => 0, 'explanation' => 'すべての文字列は <Text> コンポーネントで囲む必要があります。'],
                    ]],
                ],
            ],
            [
                'number' => 3,
                'title' => 'ナビゲーション',
                'summary' => 'React Navigationを導入し、ホーム画面とゲーム画面の画面遷移を実装します。',
                'content' => [
                    ['type' => 'heading', 'level' => 2, 'text' => 'React Navigation のインストール'],
                    ['type' => 'text', 'text' => 'React Web では react-router-dom を使いますが、React Native では React Navigation を使います。ブラウザの URL バーがないため、スタック（画面の積み重ね）で画面遷移を管理します。'],
                    ['type' => 'code', 'language' => 'bash', 'code' => "npx expo install @react-navigation/native @react-navigation/native-stack react-native-screens react-native-safe-area-context"],
                    ['type' => 'heading', 'level' => 3, 'text' => 'ナビゲーションの設定'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "import { NavigationContainer } from '@react-navigation/native';\nimport { createNativeStackNavigator } from '@react-navigation/native-stack';\nimport HomeScreen from './screens/HomeScreen';\nimport GameScreen from './screens/GameScreen';\n\ntype RootStackParamList = {\n  Home: undefined;\n  Game: undefined;\n};\n\nconst Stack = createNativeStackNavigator<RootStackParamList>();\n\nexport default function App() {\n  return (\n    <NavigationContainer>\n      <Stack.Navigator\n        initialRouteName=\"Home\"\n        screenOptions={{ headerShown: false }}\n      >\n        <Stack.Screen name=\"Home\" component={HomeScreen} />\n        <Stack.Screen name=\"Game\" component={GameScreen} />\n      </Stack.Navigator>\n    </NavigationContainer>\n  );\n}", 'filename' => 'App.tsx'],
                    ['type' => 'comparison', 'title' => '画面遷移の比較', 'react' => "// react-router-dom\nimport { useNavigate } from 'react-router-dom';\n\nfunction HomeScreen() {\n  const navigate = useNavigate();\n  return (\n    <button onClick={() => navigate('/game')}>\n      ゲーム開始\n    </button>\n  );\n}", 'reactNative' => "// React Navigation\nimport { NativeStackNavigationProp } from '@react-navigation/native-stack';\n\ntype Props = {\n  navigation: NativeStackNavigationProp<RootStackParamList, 'Home'>;\n};\n\nfunction HomeScreen({ navigation }: Props) {\n  return (\n    <TouchableOpacity onPress={() => navigation.navigate('Game')}>\n      <Text>ゲーム開始</Text>\n    </TouchableOpacity>\n  );\n}"],
                    ['type' => 'tip', 'text' => 'Laravel のルーティング (web.php) で URL とコントローラーを紐付けるように、React Navigation では Screen 名とコンポーネントを紐付けます。Inertia.js の router.visit() が navigation.navigate() に対応します。'],
                    ['type' => 'heading', 'level' => 3, 'text' => '画面コンポーネントの作成'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "// screens/HomeScreen.tsx\nimport { View, Text, TouchableOpacity, StyleSheet } from 'react-native';\nimport { NativeStackNavigationProp } from '@react-navigation/native-stack';\n\nexport default function HomeScreen({ navigation }: any) {\n  return (\n    <View style={styles.container}>\n      <Text style={styles.title}>SPACE INVADERS</Text>\n      <TouchableOpacity\n        style={styles.button}\n        onPress={() => navigation.navigate('Game')}\n      >\n        <Text style={styles.buttonText}>START</Text>\n      </TouchableOpacity>\n    </View>\n  );\n}\n\nconst styles = StyleSheet.create({\n  container: { flex: 1, backgroundColor: '#000', alignItems: 'center', justifyContent: 'center' },\n  title: { fontSize: 36, fontWeight: 'bold', color: '#0f0', marginBottom: 40 },\n  button: { backgroundColor: '#0f0', paddingHorizontal: 40, paddingVertical: 15, borderRadius: 8 },\n  buttonText: { fontSize: 20, fontWeight: 'bold', color: '#000' },\n});", 'filename' => 'screens/HomeScreen.tsx'],
                    ['type' => 'quiz', 'questions' => [
                        ['question' => 'React Native で画面遷移に使うライブラリは？', 'options' => ['React Navigation', 'react-router-dom', 'Next.js Router', 'Vue Router'], 'correct' => 0, 'explanation' => 'React Native では React Navigation が標準的なナビゲーションライブラリです。'],
                        ['question' => '画面を遷移するメソッドは？', 'options' => ['navigation.navigate()', 'router.push()', 'history.push()', 'window.location.href'], 'correct' => 0, 'explanation' => 'React Navigation では navigation.navigate("ScreenName") で画面を遷移します。'],
                    ]],
                ],
            ],
            [
                'number' => 4,
                'title' => 'ホーム画面の実装',
                'summary' => 'ゲームのタイトル画面を作成。スタートボタンとハイスコア表示を実装します。',
                'content' => [
                    ['type' => 'heading', 'level' => 2, 'text' => 'レトロゲーム風ホーム画面の設計'],
                    ['type' => 'text', 'text' => 'インベーダーゲームらしいレトロな見た目のホーム画面を作ります。黒背景に緑のテキスト、ドット風のフォント表現をスタイルで実現します。'],
                    ['type' => 'heading', 'level' => 3, 'text' => 'AsyncStorage でハイスコア保存'],
                    ['type' => 'text', 'text' => 'ブラウザの localStorage に相当する AsyncStorage を使って、ハイスコアを端末に保存します。'],
                    ['type' => 'code', 'language' => 'bash', 'code' => 'npx expo install @react-native-async-storage/async-storage'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "import { useEffect, useState } from 'react';\nimport { View, Text, TouchableOpacity, StyleSheet } from 'react-native';\nimport AsyncStorage from '@react-native-async-storage/async-storage';\n\nexport default function HomeScreen({ navigation }: any) {\n  const [highScore, setHighScore] = useState(0);\n\n  useEffect(() => {\n    loadHighScore();\n  }, []);\n\n  const loadHighScore = async () => {\n    const score = await AsyncStorage.getItem('highScore');\n    if (score) setHighScore(parseInt(score));\n  };\n\n  return (\n    <View style={styles.container}>\n      <Text style={styles.title}>👾 SPACE{\"\\n\"}INVADERS</Text>\n      <Text style={styles.highScore}>HIGH SCORE: {highScore}</Text>\n\n      <TouchableOpacity\n        style={styles.startButton}\n        onPress={() => navigation.navigate('Game')}\n      >\n        <Text style={styles.startText}>▶ START GAME</Text>\n      </TouchableOpacity>\n\n      <Text style={styles.credit}>React Native で作るインベーダーゲーム</Text>\n    </View>\n  );\n}\n\nconst styles = StyleSheet.create({\n  container: {\n    flex: 1,\n    backgroundColor: '#000',\n    alignItems: 'center',\n    justifyContent: 'center',\n    padding: 20,\n  },\n  title: {\n    fontSize: 42,\n    fontWeight: 'bold',\n    color: '#00ff00',\n    textAlign: 'center',\n    marginBottom: 20,\n    letterSpacing: 4,\n  },\n  highScore: {\n    fontSize: 18,\n    color: '#fff',\n    marginBottom: 40,\n  },\n  startButton: {\n    borderWidth: 2,\n    borderColor: '#00ff00',\n    paddingHorizontal: 40,\n    paddingVertical: 15,\n    borderRadius: 4,\n  },\n  startText: {\n    fontSize: 22,\n    fontWeight: 'bold',\n    color: '#00ff00',\n  },\n  credit: {\n    position: 'absolute',\n    bottom: 40,\n    color: '#555',\n    fontSize: 12,\n  },\n});", 'filename' => 'screens/HomeScreen.tsx'],
                    ['type' => 'tip', 'text' => 'AsyncStorage は localStorage と同じ Key-Value ストアですが、非同期（async/await）で動作します。Laravel の Cache::get() / Cache::put() に似た使い方です。'],
                    ['type' => 'quiz', 'questions' => [
                        ['question' => 'React Native で localStorage に相当するものは？', 'options' => ['AsyncStorage', 'LocalStorage', 'SecureStore', 'FileSystem'], 'correct' => 0, 'explanation' => 'AsyncStorage は React Native の Key-Value ストレージで、localStorage と同じ役割です。'],
                        ['question' => 'タッチ可能なボタンを作るコンポーネントは？', 'options' => ['TouchableOpacity', 'Button', 'Clickable', 'Tappable'], 'correct' => 0, 'explanation' => 'TouchableOpacity はタッチ時に透明度が変わるボタンコンポーネントです。Pressable も使えます。'],
                    ]],
                ],
            ],
            [
                'number' => 5,
                'title' => 'ゲーム画面の基礎',
                'summary' => 'ゲームエリアのレイアウトと自機（プレイヤー）の描画を行います。',
                'content' => [
                    ['type' => 'heading', 'level' => 2, 'text' => '画面サイズの取得'],
                    ['type' => 'text', 'text' => 'ゲームを作るには画面のサイズを知る必要があります。Dimensions API で端末の画面幅と高さを取得できます。'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "import { Dimensions } from 'react-native';\n\nconst { width: SCREEN_WIDTH, height: SCREEN_HEIGHT } = Dimensions.get('window');\n\n// ゲームエリアのサイズ\nconst GAME_WIDTH = SCREEN_WIDTH;\nconst GAME_HEIGHT = SCREEN_HEIGHT - 100; // ステータスバー分を引く"],
                    ['type' => 'heading', 'level' => 2, 'text' => '自機の描画'],
                    ['type' => 'text', 'text' => '自機を画面下部中央に配置します。position: absolute を使って座標で配置します。座標系は左上が原点 (0, 0) です。'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "import { View, StyleSheet, Dimensions } from 'react-native';\n\nconst { width: SCREEN_WIDTH, height: SCREEN_HEIGHT } = Dimensions.get('window');\nconst PLAYER_SIZE = 40;\n\nexport default function GameScreen() {\n  const playerX = SCREEN_WIDTH / 2 - PLAYER_SIZE / 2;\n  const playerY = SCREEN_HEIGHT - 120;\n\n  return (\n    <View style={styles.gameArea}>\n      {/* スコア表示 */}\n      <View style={styles.header}>\n        <Text style={styles.scoreText}>SCORE: 0</Text>\n        <Text style={styles.scoreText}>LIVES: 3</Text>\n      </View>\n\n      {/* 自機 */}\n      <View style={[\n        styles.player,\n        { left: playerX, top: playerY }\n      ]} />\n    </View>\n  );\n}\n\nconst styles = StyleSheet.create({\n  gameArea: {\n    flex: 1,\n    backgroundColor: '#000',\n  },\n  header: {\n    flexDirection: 'row',\n    justifyContent: 'space-between',\n    padding: 10,\n    paddingTop: 50,\n  },\n  scoreText: {\n    color: '#fff',\n    fontSize: 16,\n  },\n  player: {\n    position: 'absolute',\n    width: PLAYER_SIZE,\n    height: PLAYER_SIZE,\n    backgroundColor: '#0f0',\n    borderTopLeftRadius: PLAYER_SIZE / 2,\n    borderTopRightRadius: PLAYER_SIZE / 2,\n  },\n});", 'filename' => 'screens/GameScreen.tsx'],
                    ['type' => 'tip', 'text' => 'React Native の座標系は CSS の position: absolute と同じです。left と top で位置を指定します。Web のゲーム開発で Canvas を使った経験があれば同じ感覚です。'],
                    ['type' => 'quiz', 'questions' => [
                        ['question' => 'React Native で画面サイズを取得する API は？', 'options' => ['Dimensions', 'Screen', 'Window', 'Display'], 'correct' => 0, 'explanation' => "Dimensions.get('window') で画面の幅と高さを取得できます。"],
                        ['question' => 'React Native の座標系で原点 (0, 0) はどこ？', 'options' => ['左上', '左下', '中央', '右上'], 'correct' => 0, 'explanation' => 'React Native（およびほとんどのUI システム）では左上が原点です。'],
                    ]],
                ],
            ],
            [
                'number' => 6,
                'title' => '自機の操作',
                'summary' => 'タッチ操作で自機を左右に移動させる機能を実装します。',
                'content' => [
                    ['type' => 'heading', 'level' => 2, 'text' => 'PanResponder でタッチ操作'],
                    ['type' => 'text', 'text' => 'PanResponder は React Native のタッチジェスチャーを処理する API です。ドラッグ操作を検出して自機を移動させます。'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "import { useRef } from 'react';\nimport { View, PanResponder, Dimensions, StyleSheet } from 'react-native';\n\nconst SCREEN_WIDTH = Dimensions.get('window').width;\nconst PLAYER_SIZE = 40;\n\nexport default function GameScreen() {\n  const playerX = useRef(SCREEN_WIDTH / 2 - PLAYER_SIZE / 2);\n\n  const panResponder = useRef(\n    PanResponder.create({\n      onStartShouldSetPanResponder: () => true,\n      onPanResponderMove: (_, gestureState) => {\n        // タッチ位置に自機を移動\n        let newX = gestureState.moveX - PLAYER_SIZE / 2;\n        // 画面端の制限\n        newX = Math.max(0, Math.min(newX, SCREEN_WIDTH - PLAYER_SIZE));\n        playerX.current = newX;\n      },\n    })\n  ).current;\n\n  return (\n    <View style={styles.gameArea} {...panResponder.panHandlers}>\n      <View style={[\n        styles.player,\n        { left: playerX.current, top: SCREEN_HEIGHT - 120 }\n      ]} />\n    </View>\n  );\n}", 'filename' => 'screens/GameScreen.tsx'],
                    ['type' => 'text', 'text' => 'useRef を使って自機の X 座標を管理します。useState だと再レンダリングが頻繁に発生してパフォーマンスが低下するため、ゲームでは useRef が適しています。'],
                    ['type' => 'tip', 'text' => 'Web の addEventListener("mousemove") に相当するのが PanResponder です。React の onMouseMove と違い、モバイルのタッチイベントに最適化されています。'],
                    ['type' => 'warning', 'text' => 'useRef で管理する値は変更しても再レンダリングされません。画面更新にはゲームループ（setInterval）で定期的に state を更新する必要があります（第8章で実装）。'],
                    ['type' => 'quiz', 'questions' => [
                        ['question' => 'React Native でドラッグ操作を検出する API は？', 'options' => ['PanResponder', 'DragHandler', 'GestureDetector', 'TouchHandler'], 'correct' => 0, 'explanation' => 'PanResponder は React Native の標準的なジェスチャー処理 API です。'],
                        ['question' => 'ゲームで位置情報の管理に useState ではなく useRef を使う理由は？', 'options' => ['再レンダリングを避けてパフォーマンスを維持するため', 'useStateではobjectを保存できないため', 'useRefの方がメモリ効率が良いため', 'TypeScriptの型推論が効くため'], 'correct' => 0, 'explanation' => 'useRef は値を変更しても再レンダリングが発生しないため、60fpsで更新するゲームに適しています。'],
                    ]],
                ],
            ],
            [
                'number' => 7,
                'title' => '弾の発射',
                'summary' => 'Animated APIを使って弾のアニメーションを実装します。',
                'content' => [
                    ['type' => 'heading', 'level' => 2, 'text' => 'Animated API の基本'],
                    ['type' => 'text', 'text' => 'Animated API は React Native の標準アニメーションライブラリです。Animated.Value で値を管理し、Animated.timing で滑らかにアニメーションさせます。'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "import { useState, useRef } from 'react';\nimport { Animated, View, TouchableOpacity, Text, StyleSheet } from 'react-native';\n\ninterface Bullet {\n  id: number;\n  x: number;\n  y: Animated.Value;\n}\n\nlet bulletId = 0;\n\nexport default function GameScreen() {\n  const [bullets, setBullets] = useState<Bullet[]>([]);\n  const playerX = useRef(200);\n\n  const fireBullet = () => {\n    const newBullet: Bullet = {\n      id: bulletId++,\n      x: playerX.current + 18, // 自機の中央\n      y: new Animated.Value(SCREEN_HEIGHT - 130),\n    };\n\n    setBullets(prev => [...prev, newBullet]);\n\n    // 弾を上方向にアニメーション\n    Animated.timing(newBullet.y, {\n      toValue: -20,\n      duration: 1000,\n      useNativeDriver: false,\n    }).start(() => {\n      // アニメーション完了後に弾を削除\n      setBullets(prev => prev.filter(b => b.id !== newBullet.id));\n    });\n  };\n\n  return (\n    <View style={styles.gameArea}>\n      {/* 弾の描画 */}\n      {bullets.map(bullet => (\n        <Animated.View\n          key={bullet.id}\n          style={[\n            styles.bullet,\n            { left: bullet.x, top: bullet.y }\n          ]}\n        />\n      ))}\n\n      {/* 発射ボタン */}\n      <TouchableOpacity style={styles.fireButton} onPress={fireBullet}>\n        <Text style={styles.fireText}>FIRE</Text>\n      </TouchableOpacity>\n    </View>\n  );\n}\n\nconst styles = StyleSheet.create({\n  bullet: {\n    position: 'absolute',\n    width: 4,\n    height: 12,\n    backgroundColor: '#ff0',\n    borderRadius: 2,\n  },\n  fireButton: {\n    position: 'absolute',\n    bottom: 30,\n    alignSelf: 'center',\n    backgroundColor: '#f00',\n    paddingHorizontal: 30,\n    paddingVertical: 10,\n    borderRadius: 4,\n  },\n  fireText: { color: '#fff', fontWeight: 'bold' },\n});", 'filename' => 'screens/GameScreen.tsx'],
                    ['type' => 'tip', 'text' => 'useNativeDriver: true にするとアニメーションが JS スレッドではなくネイティブスレッドで実行され、パフォーマンスが向上します。ただし top/left のアニメーションには false が必要です（transform を使えば true にできます）。'],
                    ['type' => 'quiz', 'questions' => [
                        ['question' => 'Animated.timing のパラメータ useNativeDriver の役割は？', 'options' => ['ネイティブスレッドでアニメーションを実行してパフォーマンスを向上', 'ネイティブのUIコンポーネントを使用', 'デバイスのGPUを使用', 'アニメーションをキャッシュ'], 'correct' => 0, 'explanation' => 'useNativeDriver: true でアニメーションをネイティブ側で処理し、JS スレッドのブロックを防ぎます。'],
                    ]],
                ],
            ],
            [
                'number' => 8,
                'title' => '敵キャラクターの配置と移動',
                'summary' => '敵キャラクターの配置と一斉移動ロジックを実装します。',
                'content' => [
                    ['type' => 'heading', 'level' => 2, 'text' => '敵の配置'],
                    ['type' => 'text', 'text' => '敵を5行×8列のグリッドで配置します。各敵は位置情報と生存フラグを持ちます。'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "interface Enemy {\n  id: number;\n  x: number;\n  y: number;\n  alive: boolean;\n  type: number; // 0-2 で見た目を変える\n}\n\nconst ENEMY_ROWS = 5;\nconst ENEMY_COLS = 8;\nconst ENEMY_SIZE = 30;\nconst ENEMY_GAP = 10;\n\nfunction createEnemies(): Enemy[] {\n  const enemies: Enemy[] = [];\n  let id = 0;\n  const startX = (SCREEN_WIDTH - (ENEMY_COLS * (ENEMY_SIZE + ENEMY_GAP))) / 2;\n\n  for (let row = 0; row < ENEMY_ROWS; row++) {\n    for (let col = 0; col < ENEMY_COLS; col++) {\n      enemies.push({\n        id: id++,\n        x: startX + col * (ENEMY_SIZE + ENEMY_GAP),\n        y: 80 + row * (ENEMY_SIZE + ENEMY_GAP),\n        alive: true,\n        type: Math.min(row, 2),\n      });\n    }\n  }\n  return enemies;\n}"],
                    ['type' => 'heading', 'level' => 2, 'text' => 'ゲームループで敵を移動'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "const [enemies, setEnemies] = useState<Enemy[]>(createEnemies());\nconst direction = useRef(1); // 1: 右, -1: 左\nconst ENEMY_SPEED = 2;\n\nuseEffect(() => {\n  const gameLoop = setInterval(() => {\n    setEnemies(prev => {\n      const aliveEnemies = prev.filter(e => e.alive);\n      if (aliveEnemies.length === 0) return prev;\n\n      // 端に到達したか確認\n      const maxX = Math.max(...aliveEnemies.map(e => e.x));\n      const minX = Math.min(...aliveEnemies.map(e => e.x));\n      let newDirection = direction.current;\n      let dropDown = false;\n\n      if (maxX + ENEMY_SIZE >= SCREEN_WIDTH || minX <= 0) {\n        newDirection = -direction.current;\n        direction.current = newDirection;\n        dropDown = true;\n      }\n\n      return prev.map(enemy => ({\n        ...enemy,\n        x: enemy.x + ENEMY_SPEED * direction.current,\n        y: dropDown ? enemy.y + 20 : enemy.y,\n      }));\n    });\n  }, 50); // 50ms ごとに更新\n\n  return () => clearInterval(gameLoop);\n}, []);"],
                    ['type' => 'text', 'text' => 'setInterval でゲームループを実装し、50ms ごとに敵の位置を更新します。敵が画面端に到達したら方向を反転させ、1段下に降ります。'],
                    ['type' => 'warning', 'text' => 'useEffect のクリーンアップで必ず clearInterval を呼んでください。画面離脱時にゲームループが残るとメモリリークの原因になります。'],
                    ['type' => 'quiz', 'questions' => [
                        ['question' => 'ゲームループの実装に使う JavaScript の関数は？', 'options' => ['setInterval', 'setTimeout', 'requestAnimationFrame', 'setImmediate'], 'correct' => 0, 'explanation' => 'setInterval で一定間隔でゲームの状態を更新するのが最もシンプルなゲームループの実装です。'],
                    ]],
                ],
            ],
            [
                'number' => 9,
                'title' => '衝突判定',
                'summary' => '弾と敵、敵の弾と自機の当たり判定を実装します。',
                'content' => [
                    ['type' => 'heading', 'level' => 2, 'text' => 'AABB 衝突判定'],
                    ['type' => 'text', 'text' => 'AABB（Axis-Aligned Bounding Box）は最もシンプルな矩形同士の衝突判定です。2つの矩形が重なっているかを4つの条件で判定します。'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "interface Rect {\n  x: number;\n  y: number;\n  width: number;\n  height: number;\n}\n\nfunction isColliding(a: Rect, b: Rect): boolean {\n  return (\n    a.x < b.x + b.width &&\n    a.x + a.width > b.x &&\n    a.y < b.y + b.height &&\n    a.y + a.height > b.y\n  );\n}"],
                    ['type' => 'heading', 'level' => 3, 'text' => '弾と敵の衝突処理'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "// ゲームループ内で衝突判定を実行\nfunction checkCollisions() {\n  const currentBullets = [...bullets];\n  const currentEnemies = [...enemies];\n  let newScore = score;\n\n  currentBullets.forEach(bullet => {\n    const bulletRect = { x: bullet.x, y: bullet.y._value, width: 4, height: 12 };\n\n    currentEnemies.forEach(enemy => {\n      if (!enemy.alive) return;\n      const enemyRect = { x: enemy.x, y: enemy.y, width: ENEMY_SIZE, height: ENEMY_SIZE };\n\n      if (isColliding(bulletRect, enemyRect)) {\n        enemy.alive = false;\n        bullet.y.stopAnimation();\n        newScore += (3 - enemy.type) * 10; // 上の行ほど高得点\n      }\n    });\n  });\n\n  setScore(newScore);\n  setEnemies([...currentEnemies]);\n  setBullets(currentBullets.filter(b => /* 衝突していない弾のみ残す */));\n}"],
                    ['type' => 'tip', 'text' => 'ゲームプログラミングでは衝突判定が最も重要な要素の一つです。AABB は最もシンプルですが、矩形同士の判定には十分です。円形の判定が必要な場合は距離計算を使います。'],
                    ['type' => 'quiz', 'questions' => [
                        ['question' => 'AABB 衝突判定で確認する条件の数は？', 'options' => ['4つ', '2つ', '6つ', '8つ'], 'correct' => 0, 'explanation' => 'AABB は4つの条件（左右と上下の重なり）すべてが true の場合に衝突と判定します。'],
                    ]],
                ],
            ],
            [
                'number' => 10,
                'title' => 'スコアとゲームオーバー',
                'summary' => 'スコア管理、ライフ制、ゲームオーバー処理を実装してゲームを完成させます。',
                'content' => [
                    ['type' => 'heading', 'level' => 2, 'text' => 'ゲーム状態の管理'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "const [score, setScore] = useState(0);\nconst [lives, setLives] = useState(3);\nconst [gameOver, setGameOver] = useState(false);\nconst [gameStarted, setGameStarted] = useState(false);"],
                    ['type' => 'heading', 'level' => 3, 'text' => 'ゲームオーバー条件'],
                    ['type' => 'list', 'items' => ['ライフが 0 になった場合', '敵が画面下端に到達した場合', 'すべての敵を倒した場合（クリア）']],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "// ゲームオーバーチェック\nfunction checkGameOver() {\n  if (lives <= 0) {\n    handleGameOver();\n    return;\n  }\n\n  const aliveEnemies = enemies.filter(e => e.alive);\n  if (aliveEnemies.length === 0) {\n    handleGameClear();\n    return;\n  }\n\n  const maxEnemyY = Math.max(...aliveEnemies.map(e => e.y));\n  if (maxEnemyY + ENEMY_SIZE >= SCREEN_HEIGHT - 120) {\n    handleGameOver();\n  }\n}\n\nasync function handleGameOver() {\n  setGameOver(true);\n  // ハイスコア保存\n  const currentHigh = await AsyncStorage.getItem('highScore');\n  if (!currentHigh || score > parseInt(currentHigh)) {\n    await AsyncStorage.setItem('highScore', score.toString());\n  }\n}\n\nfunction restartGame() {\n  setScore(0);\n  setLives(3);\n  setGameOver(false);\n  setEnemies(createEnemies());\n  setBullets([]);\n}"],
                    ['type' => 'heading', 'level' => 3, 'text' => 'ゲームオーバーモーダル'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "{gameOver && (\n  <View style={styles.overlay}>\n    <Text style={styles.gameOverText}>GAME OVER</Text>\n    <Text style={styles.finalScore}>SCORE: {score}</Text>\n    <TouchableOpacity style={styles.retryButton} onPress={restartGame}>\n      <Text style={styles.retryText}>RETRY</Text>\n    </TouchableOpacity>\n    <TouchableOpacity onPress={() => navigation.navigate('Home')}>\n      <Text style={styles.homeText}>HOME</Text>\n    </TouchableOpacity>\n  </View>\n)}"],
                    ['type' => 'quiz', 'questions' => [
                        ['question' => 'AsyncStorage の操作は同期/非同期どちら？', 'options' => ['非同期（async/await）', '同期', '両方対応', 'コールバックのみ'], 'correct' => 0, 'explanation' => 'AsyncStorage は名前の通り非同期で動作します。await で値を取得・保存します。'],
                    ]],
                ],
            ],
            [
                'number' => 11,
                'title' => '仕上げとデプロイ',
                'summary' => 'パフォーマンス改善、効果音の追加、ビルドとストア申請の手順を学びます。',
                'content' => [
                    ['type' => 'heading', 'level' => 2, 'text' => 'パフォーマンス最適化'],
                    ['type' => 'text', 'text' => 'useCallback と useMemo でゲームのパフォーマンスを改善します。'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "// 関数のメモ化\nconst fireBullet = useCallback(() => {\n  // 弾の発射処理\n}, [playerX]);\n\n// 敵の描画をメモ化\nconst renderedEnemies = useMemo(() => (\n  enemies.filter(e => e.alive).map(enemy => (\n    <View key={enemy.id} style={[styles.enemy, { left: enemy.x, top: enemy.y }]} />\n  ))\n), [enemies]);"],
                    ['type' => 'heading', 'level' => 2, 'text' => '効果音の追加'],
                    ['type' => 'code', 'language' => 'bash', 'code' => 'npx expo install expo-av'],
                    ['type' => 'code', 'language' => 'tsx', 'code' => "import { Audio } from 'expo-av';\n\nconst playSound = async (soundFile: any) => {\n  const { sound } = await Audio.Sound.createAsync(soundFile);\n  await sound.playAsync();\n};\n\n// 使用例\nawait playSound(require('../assets/sounds/shoot.mp3'));\nawait playSound(require('../assets/sounds/explosion.mp3'));"],
                    ['type' => 'heading', 'level' => 2, 'text' => 'EAS Build でビルド'],
                    ['type' => 'code', 'language' => 'bash', 'code' => "# EAS CLI のインストール\nnpm install -g eas-cli\n\n# ログイン\neas login\n\n# ビルド設定の初期化\neas build:configure\n\n# iOS ビルド\neas build --platform ios\n\n# Android ビルド\neas build --platform android"],
                    ['type' => 'tip', 'text' => 'EAS Build は Laravel Forge でのデプロイに似た概念です。クラウド上でアプリをビルドし、ストアに提出可能なバイナリを生成します。'],
                    ['type' => 'warning', 'text' => 'iOS アプリをビルド・公開するには Apple Developer Program ($99/年) への登録が必要です。Android は Google Play Developer ($25/一回) です。'],
                    ['type' => 'heading', 'level' => 2, 'text' => 'おめでとうございます！🎉'],
                    ['type' => 'text', 'text' => 'これで React Native コンポーネント方式でのインベーダーゲーム開発チュートリアルは完了です。React と CSS の知識を活かして、View、StyleSheet、Animated API でモバイルゲームを作ることができました。次のステップとして、ゲームエンジン方式のコースにも挑戦してみてください！'],
                    ['type' => 'quiz', 'questions' => [
                        ['question' => 'EAS Build でアプリをビルドするコマンドは？', 'options' => ['eas build --platform ios', 'expo build:ios', 'react-native build ios', 'npm run build:ios'], 'correct' => 0, 'explanation' => 'EAS Build では eas build --platform ios/android でクラウドビルドを実行します。'],
                        ['question' => 'iOS アプリの公開に必要なのは？', 'options' => ['Apple Developer Program ($99/年)', 'Xcode のインストールのみ', 'Mac のみあれば無料', 'Expo Pro プラン'], 'correct' => 0, 'explanation' => 'iOS アプリの公開には Apple Developer Program への登録（年間$99）が必要です。'],
                    ]],
                ],
            ],
        ];
    }
}
