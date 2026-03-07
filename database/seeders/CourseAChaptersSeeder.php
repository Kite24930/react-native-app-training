<?php

namespace Database\Seeders;

class CourseAChaptersSeeder
{
    /**
     * Course A のチャプターデータを返す
     * コース: React Nativeコンポーネント＋アニメーション方式
     * 対象: Laravel + React を使用しているWebエンジニア
     */
    public static function getChapters(): array
    {
        return [
            // Chapter 1
            self::chapter1(),
            // Chapter 2
            self::chapter2(),
            // Chapter 3
            self::chapter3(),
            // Chapter 4
            self::chapter4(),
            // Chapter 5
            self::chapter5(),
            // Chapter 6
            self::chapter6(),
            // Chapter 7
            self::chapter7(),
            // Chapter 8
            self::chapter8(),
            // Chapter 9
            self::chapter9(),
            // Chapter 10
            self::chapter10(),
            // Chapter 11
            self::chapter11(),
        ];
    }

    private static function chapter1(): array
    {
        return [
            'number' => 1,
            'title' => '環境構築',
            'summary' => 'Expoのセットアップとプロジェクト作成。React開発環境との違いを理解します。',
            'content' => [
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'React Native 開発環境を準備しよう',
                ],
                [
                    'type' => 'text',
                    'text' => 'React Native の開発には Expo というツールチェーンを使います。Expo を使うことで、Xcode や Android Studio の複雑な設定なしに、すぐにアプリ開発を始められます。Laravel で言えば、Homestead や Sail のような「すぐに開発を始められる環境」と考えてください。',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'Node.js の確認と Expo プロジェクトの作成',
                ],
                [
                    'type' => 'text',
                    'text' => 'まず、Node.js がインストールされていることを確認しましょう。React の開発で既にインストール済みのはずですが、バージョン 18 以上が推奨されます。',
                ],
                [
                    'type' => 'code',
                    'language' => 'bash',
                    'code' => "# Node.js のバージョン確認\nnode -v\n# v18.0.0 以上であることを確認\n\n# Expo プロジェクトの作成\nnpx create-expo-app@latest SpaceInvadersApp --template blank-typescript\n\n# プロジェクトディレクトリに移動\ncd SpaceInvadersApp\n\n# 開発サーバーの起動\nnpx expo start",
                ],
                [
                    'type' => 'comparison',
                    'title' => 'プロジェクト作成コマンドの比較',
                    'react' => "# React (Web) プロジェクト作成\nnpx create-react-app my-app --template typescript\ncd my-app\nnpm start",
                    'reactNative' => "# React Native (Expo) プロジェクト作成\nnpx create-expo-app@latest my-app --template blank-typescript\ncd my-app\nnpx expo start",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'プロジェクト構造の理解',
                ],
                [
                    'type' => 'text',
                    'text' => 'Expo プロジェクトの基本構造は React プロジェクトと似ていますが、いくつか重要な違いがあります。app.json が設定ファイルとして存在し、アプリ名やアイコン、スプラッシュスクリーンなどを管理します。',
                ],
                [
                    'type' => 'code',
                    'language' => 'json',
                    'code' => "{\n  \"expo\": {\n    \"name\": \"SpaceInvadersApp\",\n    \"slug\": \"space-invaders-app\",\n    \"version\": \"1.0.0\",\n    \"orientation\": \"portrait\",\n    \"icon\": \"./assets/icon.png\",\n    \"splash\": {\n      \"image\": \"./assets/splash.png\",\n      \"resizeMode\": \"contain\",\n      \"backgroundColor\": \"#000000\"\n    }\n  }\n}",
                    'filename' => 'app.json',
                ],
                [
                    'type' => 'text',
                    'text' => 'Expo Go アプリをスマートフォンにインストールすると、QRコードをスキャンするだけで実機でアプリをプレビューできます。iOS の場合はカメラアプリから、Android の場合は Expo Go アプリ内からスキャンしてください。',
                ],
                [
                    'type' => 'tip',
                    'text' => 'Laravel の php artisan serve に相当するのが npx expo start です。どちらもローカル開発サーバーを起動して、変更をリアルタイムで反映します。Expo の場合はホットリロードが標準で有効になっています。',
                ],
                [
                    'type' => 'list',
                    'items' => [
                        'App.tsx: アプリのエントリーポイント（React の index.tsx に相当）',
                        'app.json: アプリの設定ファイル（Laravel の .env に近い役割）',
                        'package.json: 依存パッケージの管理（Laravel の composer.json に相当）',
                        'assets/: 画像やフォントなどの静的ファイル（Laravel の public/ に相当）',
                        'tsconfig.json: TypeScript の設定ファイル',
                    ],
                ],
                [
                    'type' => 'quiz',
                    'questions' => [
                        [
                            'question' => 'Expo プロジェクトを新規作成するコマンドはどれですか？',
                            'options' => [
                                'npm create-expo-app my-app',
                                'npx create-expo-app@latest my-app',
                                'expo init my-app',
                                'npx react-native init my-app',
                            ],
                            'correct' => 1,
                            'explanation' => 'npx create-expo-app@latest がExpoプロジェクトを作成する最新の推奨コマンドです。expo init は旧バージョンのコマンドで、npx react-native init は Expo を使わない場合のコマンドです。',
                        ],
                        [
                            'question' => 'Expo の開発サーバーを起動するコマンドはどれですか？',
                            'options' => [
                                'npm start',
                                'expo run',
                                'npx expo start',
                                'npx react-native start',
                            ],
                            'correct' => 2,
                            'explanation' => 'npx expo start で開発サーバーが起動し、QRコードが表示されます。Expo Go アプリでこのQRコードをスキャンすると実機でプレビューできます。',
                        ],
                        [
                            'question' => 'Expo プロジェクトでアプリの名前やアイコンを設定するファイルはどれですか？',
                            'options' => [
                                'package.json',
                                'tsconfig.json',
                                'app.json',
                                '.env',
                            ],
                            'correct' => 2,
                            'explanation' => 'app.json はExpoプロジェクトのメイン設定ファイルです。アプリ名、バージョン、アイコン、スプラッシュスクリーンなどの設定を管理します。',
                        ],
                    ],
                ],
            ],
        ];
    }

    private static function chapter2(): array
    {
        return [
            'number' => 2,
            'title' => 'React Native 基礎',
            'summary' => 'React Native特有のコンポーネントとスタイリングの基礎を学びます。',
            'content' => [
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'HTML から React Native コンポーネントへ',
                ],
                [
                    'type' => 'text',
                    'text' => 'React Native では HTML タグの代わりに専用のコンポーネントを使います。普段 React で使っている div や span は使えません。しかし、対応関係を理解すればすぐに慣れるはずです。',
                ],
                [
                    'type' => 'list',
                    'items' => [
                        '<div> → <View>: レイアウト用のコンテナコンポーネント',
                        '<p>, <span> → <Text>: テキスト表示用。RN では文字列は必ず Text で囲む必要がある',
                        '<img> → <Image>: 画像表示用。source プロパティで画像を指定',
                        '<button> → <TouchableOpacity>: タップ可能な要素。onPress でイベント処理',
                        '<input> → <TextInput>: テキスト入力フィールド',
                        'overflow: scroll の div → <ScrollView> or <FlatList>: スクロール可能なコンテナ',
                        '<ul>/<li> → <FlatList>: リスト表示用の高パフォーマンスコンポーネント',
                    ],
                ],
                [
                    'type' => 'comparison',
                    'title' => 'ボタンコンポーネントの比較',
                    'react' => "<button\n  className=\"btn btn-primary\"\n  onClick={() => alert('Clicked!')}\n>\n  クリック\n</button>",
                    'reactNative' => "<TouchableOpacity\n  style={styles.button}\n  onPress={() => Alert.alert('Tapped!')}\n>\n  <Text style={styles.buttonText}>タップ</Text>\n</TouchableOpacity>",
                ],
                [
                    'type' => 'comparison',
                    'title' => 'レイアウトの比較',
                    'react' => "<div className=\"container\">\n  <h1>タイトル</h1>\n  <p>本文テキスト</p>\n  <img src=\"image.png\" alt=\"画像\" />\n</div>",
                    'reactNative' => "<View style={styles.container}>\n  <Text style={styles.title}>タイトル</Text>\n  <Text style={styles.body}>本文テキスト</Text>\n  <Image source={require('./image.png')} style={styles.image} />\n</View>",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'StyleSheet.create() によるスタイリング',
                ],
                [
                    'type' => 'text',
                    'text' => 'React Native では CSS ファイルの代わりに StyleSheet.create() を使ってスタイルを定義します。プロパティ名はキャメルケースになり、値は文字列ではなく数値で指定することが多いです。CSS の知識がそのまま活かせますが、いくつかの違いに注意が必要です。',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import React from 'react';\nimport { View, Text, StyleSheet } from 'react-native';\n\nconst MyComponent: React.FC = () => {\n  return (\n    <View style={styles.container}>\n      <Text style={styles.title}>スペースインベーダー</Text>\n      <Text style={styles.subtitle}>React Native で作るレトロゲーム</Text>\n    </View>\n  );\n};\n\nconst styles = StyleSheet.create({\n  container: {\n    flex: 1,\n    justifyContent: 'center',\n    alignItems: 'center',\n    backgroundColor: '#000000',\n  },\n  title: {\n    fontSize: 28,\n    fontWeight: 'bold',\n    color: '#00FF00',\n    marginBottom: 10,\n  },\n  subtitle: {\n    fontSize: 16,\n    color: '#AAAAAA',\n  },\n});\n\nexport default MyComponent;",
                    'filename' => 'MyComponent.tsx',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'Flexbox のデフォルトの違い',
                ],
                [
                    'type' => 'text',
                    'text' => 'React Native の Flexbox は Web の Flexbox とほぼ同じですが、重要な違いが1つあります。Web では flexDirection のデフォルトが row（横並び）ですが、React Native では column（縦並び）です。モバイルアプリは縦長の画面が基本なので、この設計は理にかなっています。',
                ],
                [
                    'type' => 'warning',
                    'text' => 'React Native では、文字列は必ず <Text> コンポーネントで囲む必要があります。<View> の直下にテキストを置くとエラーになります。React (Web) では <div>テキスト</div> と書けますが、RN では <View><Text>テキスト</Text></View> と書く必要があります。',
                ],
                [
                    'type' => 'tip',
                    'text' => 'StyleSheet.create() は Laravel の Blade テンプレートで @push(\"styles\") を使ってスタイルを定義するのに似ています。コンポーネントごとにスタイルを管理でき、React の CSS Modules にも近い概念です。',
                ],
                [
                    'type' => 'quiz',
                    'questions' => [
                        [
                            'question' => 'React Native で HTML の <div> に対応するコンポーネントはどれですか？',
                            'options' => [
                                'Container',
                                'Box',
                                'View',
                                'Div',
                            ],
                            'correct' => 2,
                            'explanation' => 'View は React Native の最も基本的なレイアウトコンポーネントで、HTML の div に対応します。Flexbox レイアウトをサポートし、他のコンポーネントをラップするコンテナとして使います。',
                        ],
                        [
                            'question' => 'React Native の Flexbox で flexDirection のデフォルト値は何ですか？',
                            'options' => [
                                'row',
                                'column',
                                'row-reverse',
                                'column-reverse',
                            ],
                            'correct' => 1,
                            'explanation' => 'React Native では flexDirection のデフォルトが column です。Web では row がデフォルトなので、この違いに注意が必要です。',
                        ],
                        [
                            'question' => '次のうち、React Native で正しいコードはどれですか？',
                            'options' => [
                                '<View>テキストを表示</View>',
                                '<Text><View>テキスト</View></Text>',
                                '<View><Text>テキストを表示</Text></View>',
                                '<div><Text>テキスト</Text></div>',
                            ],
                            'correct' => 2,
                            'explanation' => 'React Native では文字列は必ず Text コンポーネントで囲む必要があります。View の直下に文字列を置くとエラーになります。また、div などの HTML タグは使えません。',
                        ],
                    ],
                ],
            ],
        ];
    }

    private static function chapter3(): array
    {
        return [
            'number' => 3,
            'title' => 'ナビゲーション',
            'summary' => 'React Navigationを導入し、ホーム画面とゲーム画面の画面遷移を実装します。',
            'content' => [
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'React Navigation のセットアップ',
                ],
                [
                    'type' => 'text',
                    'text' => 'React Native にはブラウザのような URL ベースのルーティングがありません。代わりに React Navigation ライブラリを使って画面遷移を実装します。Laravel のルーティングや React Router に似た概念ですが、モバイル特有のスタック遷移やタブ遷移をサポートしています。',
                ],
                [
                    'type' => 'code',
                    'language' => 'bash',
                    'code' => "# React Navigation のインストール\nnpx expo install @react-navigation/native @react-navigation/native-stack react-native-screens react-native-safe-area-context",
                ],
                [
                    'type' => 'comparison',
                    'title' => 'ルーティングの比較',
                    'react' => "// React Router (Web)\nimport { BrowserRouter, Route, Routes } from 'react-router-dom';\n\n<BrowserRouter>\n  <Routes>\n    <Route path=\"/\" element={<Home />} />\n    <Route path=\"/game\" element={<Game />} />\n  </Routes>\n</BrowserRouter>",
                    'reactNative' => "// React Navigation (Mobile)\nimport { NavigationContainer } from '@react-navigation/native';\nimport { createNativeStackNavigator } from '@react-navigation/native-stack';\n\nconst Stack = createNativeStackNavigator();\n\n<NavigationContainer>\n  <Stack.Navigator>\n    <Stack.Screen name=\"Home\" component={HomeScreen} />\n    <Stack.Screen name=\"Game\" component={GameScreen} />\n  </Stack.Navigator>\n</NavigationContainer>",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'App.tsx にナビゲーションを設定する',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import React from 'react';\nimport { NavigationContainer } from '@react-navigation/native';\nimport { createNativeStackNavigator } from '@react-navigation/native-stack';\nimport HomeScreen from './screens/HomeScreen';\nimport GameScreen from './screens/GameScreen';\n\nexport type RootStackParamList = {\n  Home: undefined;\n  Game: undefined;\n};\n\nconst Stack = createNativeStackNavigator<RootStackParamList>();\n\nconst App: React.FC = () => {\n  return (\n    <NavigationContainer>\n      <Stack.Navigator\n        initialRouteName=\"Home\"\n        screenOptions={{\n          headerShown: false,\n          contentStyle: { backgroundColor: '#000000' },\n        }}\n      >\n        <Stack.Screen name=\"Home\" component={HomeScreen} />\n        <Stack.Screen name=\"Game\" component={GameScreen} />\n      </Stack.Navigator>\n    </NavigationContainer>\n  );\n};\n\nexport default App;",
                    'filename' => 'App.tsx',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '画面コンポーネントの雛形',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import React from 'react';\nimport { View, Text, TouchableOpacity, StyleSheet } from 'react-native';\nimport { NativeStackNavigationProp } from '@react-navigation/native-stack';\nimport { RootStackParamList } from '../App';\n\ntype HomeScreenNavigationProp = NativeStackNavigationProp<RootStackParamList, 'Home'>;\n\ntype Props = {\n  navigation: HomeScreenNavigationProp;\n};\n\nconst HomeScreen: React.FC<Props> = ({ navigation }) => {\n  return (\n    <View style={styles.container}>\n      <Text style={styles.title}>SPACE INVADERS</Text>\n      <TouchableOpacity\n        style={styles.button}\n        onPress={() => navigation.navigate('Game')}\n      >\n        <Text style={styles.buttonText}>ゲーム開始</Text>\n      </TouchableOpacity>\n    </View>\n  );\n};\n\nconst styles = StyleSheet.create({\n  container: {\n    flex: 1,\n    justifyContent: 'center',\n    alignItems: 'center',\n    backgroundColor: '#000000',\n  },\n  title: {\n    fontSize: 32,\n    fontWeight: 'bold',\n    color: '#00FF00',\n    marginBottom: 40,\n  },\n  button: {\n    backgroundColor: '#00FF00',\n    paddingHorizontal: 30,\n    paddingVertical: 15,\n    borderRadius: 5,\n  },\n  buttonText: {\n    fontSize: 18,\n    fontWeight: 'bold',\n    color: '#000000',\n  },\n});\n\nexport default HomeScreen;",
                    'filename' => 'screens/HomeScreen.tsx',
                ],
                [
                    'type' => 'text',
                    'text' => 'navigation.navigate(\"Game\") を呼ぶと、GameScreen に遷移します。スタックナビゲーションなので、自動的に「戻る」ジェスチャーやボタンが提供されます。これは Web の history.push() に似ています。',
                ],
                [
                    'type' => 'tip',
                    'text' => 'Laravel のルーティングでは web.php にルートを定義しますが、React Navigation では Stack.Navigator 内に Stack.Screen を並べることでルートを定義します。name プロパティがルート名で、navigation.navigate(name) で遷移できます。',
                ],
                [
                    'type' => 'warning',
                    'text' => 'React Navigation v6 以降は、必ず react-native-screens と react-native-safe-area-context をインストールしてください。これらがないと実行時エラーが発生します。',
                ],
                [
                    'type' => 'quiz',
                    'questions' => [
                        [
                            'question' => 'React Navigation で画面遷移するために使うメソッドはどれですか？',
                            'options' => [
                                'navigation.push()',
                                'navigation.navigate()',
                                'navigation.goto()',
                                'navigation.redirect()',
                            ],
                            'correct' => 1,
                            'explanation' => 'navigation.navigate() が画面遷移の基本メソッドです。push() も使えますが、navigate() は同じ画面への重複遷移を防ぐ点で推奨されます。',
                        ],
                        [
                            'question' => 'NavigationContainer は通常どこに配置しますか？',
                            'options' => [
                                '各画面コンポーネントの中',
                                'App.tsx のルートコンポーネント',
                                'index.ts の中',
                                'app.json の中',
                            ],
                            'correct' => 1,
                            'explanation' => 'NavigationContainer はアプリ全体を囲む形で App.tsx のルートに配置します。これはReact RouterのBrowserRouterに相当するものです。',
                        ],
                    ],
                ],
            ],
        ];
    }

    private static function chapter4(): array
    {
        return [
            'number' => 4,
            'title' => 'ホーム画面の実装',
            'summary' => 'ゲームのタイトル画面を作成。スタートボタンとハイスコア表示を実装します。',
            'content' => [
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'レトロゲーム風のタイトル画面を作ろう',
                ],
                [
                    'type' => 'text',
                    'text' => 'このチャプターでは、スペースインベーダーのタイトル画面を作成します。レトロゲーム風のデザイン（黒背景に緑のテキスト）を採用し、ゲーム開始ボタンとハイスコア表示を実装します。',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'AsyncStorage でデータを永続化する',
                ],
                [
                    'type' => 'text',
                    'text' => 'ハイスコアを保存するために AsyncStorage を使います。これは Web の localStorage に非常に似た API で、キーバリュー型のデータを端末に保存できます。',
                ],
                [
                    'type' => 'code',
                    'language' => 'bash',
                    'code' => "# AsyncStorage のインストール\nnpx expo install @react-native-async-storage/async-storage",
                ],
                [
                    'type' => 'comparison',
                    'title' => 'データ保存の比較',
                    'react' => "// Web: localStorage (同期)\nlocalStorage.setItem('highScore', '1000');\nconst score = localStorage.getItem('highScore');",
                    'reactNative' => "// React Native: AsyncStorage (非同期)\nawait AsyncStorage.setItem('highScore', '1000');\nconst score = await AsyncStorage.getItem('highScore');",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '完成版 HomeScreen コンポーネント',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import React, { useState, useEffect } from 'react';\nimport { View, Text, TouchableOpacity, StyleSheet } from 'react-native';\nimport AsyncStorage from '@react-native-async-storage/async-storage';\nimport { NativeStackNavigationProp } from '@react-navigation/native-stack';\nimport { RootStackParamList } from '../App';\n\ntype HomeScreenNavigationProp = NativeStackNavigationProp<RootStackParamList, 'Home'>;\n\ntype Props = {\n  navigation: HomeScreenNavigationProp;\n};\n\nconst HomeScreen: React.FC<Props> = ({ navigation }) => {\n  const [highScore, setHighScore] = useState<number>(0);\n\n  useEffect(() => {\n    loadHighScore();\n  }, []);\n\n  // 画面にフォーカスが戻った時にハイスコアを再読み込み\n  useEffect(() => {\n    const unsubscribe = navigation.addListener('focus', () => {\n      loadHighScore();\n    });\n    return unsubscribe;\n  }, [navigation]);\n\n  const loadHighScore = async () => {\n    try {\n      const savedScore = await AsyncStorage.getItem('highScore');\n      if (savedScore !== null) {\n        setHighScore(parseInt(savedScore, 10));\n      }\n    } catch (error) {\n      console.error('ハイスコアの読み込みに失敗しました:', error);\n    }\n  };\n\n  return (\n    <View style={styles.container}>\n      <Text style={styles.title}>SPACE</Text>\n      <Text style={styles.title}>INVADERS</Text>\n      <View style={styles.divider} />\n      <Text style={styles.highScore}>ハイスコア: {highScore}</Text>\n      <TouchableOpacity\n        style={styles.startButton}\n        onPress={() => navigation.navigate('Game')}\n      >\n        <Text style={styles.startButtonText}>ゲーム開始</Text>\n      </TouchableOpacity>\n      <Text style={styles.footer}>React Native で作るレトロゲーム</Text>\n    </View>\n  );\n};\n\nconst styles = StyleSheet.create({\n  container: {\n    flex: 1,\n    justifyContent: 'center',\n    alignItems: 'center',\n    backgroundColor: '#000000',\n    paddingHorizontal: 20,\n  },\n  title: {\n    fontSize: 48,\n    fontWeight: 'bold',\n    color: '#00FF00',\n    letterSpacing: 8,\n  },\n  divider: {\n    width: 200,\n    height: 2,\n    backgroundColor: '#00FF00',\n    marginVertical: 20,\n  },\n  highScore: {\n    fontSize: 18,\n    color: '#FFFFFF',\n    marginBottom: 40,\n  },\n  startButton: {\n    borderWidth: 2,\n    borderColor: '#00FF00',\n    paddingHorizontal: 40,\n    paddingVertical: 15,\n    borderRadius: 5,\n  },\n  startButtonText: {\n    fontSize: 20,\n    fontWeight: 'bold',\n    color: '#00FF00',\n  },\n  footer: {\n    position: 'absolute',\n    bottom: 40,\n    fontSize: 12,\n    color: '#666666',\n  },\n});\n\nexport default HomeScreen;",
                    'filename' => 'screens/HomeScreen.tsx',
                ],
                [
                    'type' => 'text',
                    'text' => 'navigation.addListener(\"focus\") を使うことで、ゲーム画面から戻ってきた時にハイスコアを再読み込みします。これは React Router の useEffect で location を監視するパターンに似ています。',
                ],
                [
                    'type' => 'tip',
                    'text' => 'AsyncStorage は Web の localStorage に非常に似ていますが、非同期（async/await）である点が異なります。Laravel でいうと Cache::get() や Cache::put() のような役割を果たします。',
                ],
                [
                    'type' => 'list',
                    'items' => [
                        'TouchableOpacity: タップ時に透明度が変化するボタン。activeOpacity プロパティで透明度を調整可能',
                        'letterSpacing: 文字間隔を広げてレトロ感を演出',
                        'position: absolute: フッターを画面下部に固定',
                        'borderWidth + borderColor: 枠線だけのボタンデザイン',
                    ],
                ],
                [
                    'type' => 'quiz',
                    'questions' => [
                        [
                            'question' => 'AsyncStorage でデータを保存するメソッドはどれですか？',
                            'options' => [
                                'AsyncStorage.save()',
                                'AsyncStorage.setItem()',
                                'AsyncStorage.store()',
                                'AsyncStorage.put()',
                            ],
                            'correct' => 1,
                            'explanation' => 'AsyncStorage.setItem(key, value) でデータを保存します。Web の localStorage.setItem() と同じ名前ですが、AsyncStorage は非同期なので await が必要です。',
                        ],
                        [
                            'question' => 'React Navigation で画面にフォーカスが戻った時にイベントを受け取るには？',
                            'options' => [
                                'navigation.onReturn()',
                                'navigation.addListener(\"focus\")',
                                'useEffect(() => {}, [])',
                                'navigation.onFocus()',
                            ],
                            'correct' => 1,
                            'explanation' => 'navigation.addListener(\"focus\") を使うと、画面がフォーカスされるたびにコールバックが実行されます。スタックナビゲーションで戻ってきた時のデータ再読み込みに便利です。',
                        ],
                    ],
                ],
            ],
        ];
    }

    private static function chapter5(): array
    {
        return [
            'number' => 5,
            'title' => 'ゲーム画面の基礎',
            'summary' => 'ゲームエリアのレイアウトと自機（プレイヤー）の描画を行います。',
            'content' => [
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'ゲームエリアのレイアウト設計',
                ],
                [
                    'type' => 'text',
                    'text' => 'ゲーム画面を実装する前に、画面のサイズを取得してゲームエリアを設計します。React Native の Dimensions API を使って端末の画面サイズを取得し、それに基づいてレイアウトを組み立てます。',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import { Dimensions } from 'react-native';\n\n// 画面サイズの取得\nconst { width: SCREEN_WIDTH, height: SCREEN_HEIGHT } = Dimensions.get('window');\n\n// ゲームエリアの定義\nconst GAME_WIDTH = SCREEN_WIDTH;\nconst GAME_HEIGHT = SCREEN_HEIGHT - 100; // スコア表示エリア分を引く\n\n// 自機のサイズ\nconst PLAYER_WIDTH = 40;\nconst PLAYER_HEIGHT = 30;",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '座標系の理解',
                ],
                [
                    'type' => 'text',
                    'text' => 'React Native の座標系は、Web と同じく左上が原点 (0, 0) です。X 軸は右方向に正、Y 軸は下方向に正となります。ゲーム開発では position: \"absolute\" を使って各オブジェクトを絶対座標で配置します。',
                ],
                [
                    'type' => 'list',
                    'items' => [
                        '左上が原点 (0, 0)、Web の CSS と同じ座標系',
                        'X 軸: 左から右に増加（0 ~ SCREEN_WIDTH）',
                        'Y 軸: 上から下に増加（0 ~ SCREEN_HEIGHT）',
                        '自機は画面下部に配置（Y 座標が大きい位置）',
                        '敵は画面上部に配置（Y 座標が小さい位置）',
                    ],
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '自機コンポーネントの作成',
                ],
                [
                    'type' => 'text',
                    'text' => '自機（プレイヤー）を三角形風の宇宙船として描画します。React Native には三角形の描画機能がないため、View の border プロパティを活用して三角形を作ります。',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import React from 'react';\nimport { View, StyleSheet } from 'react-native';\n\ntype PlayerProps = {\n  x: number;\n  y: number;\n};\n\nconst Player: React.FC<PlayerProps> = ({ x, y }) => {\n  return (\n    <View style={[styles.player, { left: x, top: y }]}>\n      {/* 宇宙船の本体 */}\n      <View style={styles.playerBody} />\n      {/* 宇宙船の先端（三角形） */}\n      <View style={styles.playerNose} />\n      {/* 左翼 */}\n      <View style={styles.playerWingLeft} />\n      {/* 右翼 */}\n      <View style={styles.playerWingRight} />\n    </View>\n  );\n};\n\nconst styles = StyleSheet.create({\n  player: {\n    position: 'absolute',\n    width: 40,\n    height: 30,\n    alignItems: 'center',\n  },\n  playerBody: {\n    width: 10,\n    height: 20,\n    backgroundColor: '#00FF00',\n    position: 'absolute',\n    bottom: 0,\n    alignSelf: 'center',\n  },\n  playerNose: {\n    width: 0,\n    height: 0,\n    borderLeftWidth: 5,\n    borderRightWidth: 5,\n    borderBottomWidth: 10,\n    borderLeftColor: 'transparent',\n    borderRightColor: 'transparent',\n    borderBottomColor: '#00FF00',\n    position: 'absolute',\n    top: 0,\n    alignSelf: 'center',\n  },\n  playerWingLeft: {\n    width: 15,\n    height: 8,\n    backgroundColor: '#00CC00',\n    position: 'absolute',\n    bottom: 0,\n    left: 0,\n  },\n  playerWingRight: {\n    width: 15,\n    height: 8,\n    backgroundColor: '#00CC00',\n    position: 'absolute',\n    bottom: 0,\n    right: 0,\n  },\n});\n\nexport default Player;",
                    'filename' => 'components/Player.tsx',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'ゲーム画面の初期コード',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import React, { useState } from 'react';\nimport { View, Text, StyleSheet, Dimensions } from 'react-native';\nimport Player from '../components/Player';\n\nconst { width: SCREEN_WIDTH, height: SCREEN_HEIGHT } = Dimensions.get('window');\nconst PLAYER_WIDTH = 40;\n\nconst GameScreen: React.FC = () => {\n  const [playerX, setPlayerX] = useState(SCREEN_WIDTH / 2 - PLAYER_WIDTH / 2);\n  const playerY = SCREEN_HEIGHT - 120;\n\n  return (\n    <View style={styles.container}>\n      {/* スコアエリア */}\n      <View style={styles.scoreArea}>\n        <Text style={styles.scoreText}>スコア: 0</Text>\n        <Text style={styles.scoreText}>ライフ: 3</Text>\n      </View>\n      {/* ゲームエリア */}\n      <View style={styles.gameArea}>\n        <Player x={playerX} y={playerY} />\n      </View>\n    </View>\n  );\n};\n\nconst styles = StyleSheet.create({\n  container: {\n    flex: 1,\n    backgroundColor: '#000000',\n  },\n  scoreArea: {\n    flexDirection: 'row',\n    justifyContent: 'space-between',\n    paddingHorizontal: 20,\n    paddingTop: 50,\n    paddingBottom: 10,\n  },\n  scoreText: {\n    color: '#FFFFFF',\n    fontSize: 16,\n  },\n  gameArea: {\n    flex: 1,\n    position: 'relative',\n  },\n});\n\nexport default GameScreen;",
                    'filename' => 'screens/GameScreen.tsx',
                ],
                [
                    'type' => 'tip',
                    'text' => 'Dimensions.get(\"window\") は、React で window.innerWidth や window.innerHeight を使うのと同じです。ただし、React Native では画面の向きが変わる可能性があるため、useWindowDimensions() フックを使うとより安全です。',
                ],
                [
                    'type' => 'quiz',
                    'questions' => [
                        [
                            'question' => 'React Native で画面サイズを取得する API はどれですか？',
                            'options' => [
                                'Screen.getSize()',
                                'window.innerWidth',
                                'Dimensions.get(\"window\")',
                                'StyleSheet.getScreenSize()',
                            ],
                            'correct' => 2,
                            'explanation' => 'Dimensions.get(\"window\") で端末の画面サイズ（width と height）を取得できます。Web の window.innerWidth/innerHeight に相当します。',
                        ],
                        [
                            'question' => 'ゲームオブジェクトを座標で自由に配置するために使うスタイルはどれですか？',
                            'options' => [
                                'display: \"flex\"',
                                'position: \"relative\"',
                                'position: \"absolute\"',
                                'float: \"left\"',
                            ],
                            'correct' => 2,
                            'explanation' => 'position: \"absolute\" を使うと、親要素からの相対位置で left と top を指定してオブジェクトを自由に配置できます。ゲーム開発では必須のテクニックです。',
                        ],
                        [
                            'question' => 'React Native の座標系で原点 (0, 0) はどこにありますか？',
                            'options' => [
                                '画面中央',
                                '画面左下',
                                '画面右上',
                                '画面左上',
                            ],
                            'correct' => 3,
                            'explanation' => 'React Native の座標系は Web の CSS と同じく、左上が原点 (0, 0) です。X 軸は右方向に、Y 軸は下方向に増加します。',
                        ],
                    ],
                ],
            ],
        ];
    }

    private static function chapter6(): array
    {
        return [
            'number' => 6,
            'title' => '自機の操作',
            'summary' => 'タッチ操作で自機を左右に移動させる機能を実装します。',
            'content' => [
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'PanResponder でタッチ操作を実装する',
                ],
                [
                    'type' => 'text',
                    'text' => 'React Native ではマウスイベントの代わりにタッチイベントを使います。PanResponder はドラッグ操作を簡単に実装できる API で、Web の onMouseMove や onTouchMove に相当します。プレイヤーの指の動きに合わせて自機を左右に移動させましょう。',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'PanResponder の基本概念',
                ],
                [
                    'type' => 'text',
                    'text' => 'PanResponder はジェスチャーの開始・移動・終了を検出するシステムです。onPanResponderGrant（タッチ開始）、onPanResponderMove（指の移動）、onPanResponderRelease（指を離す）の3つのイベントで操作を管理します。',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import React, { useRef, useState, useMemo } from 'react';\nimport {\n  View,\n  Text,\n  StyleSheet,\n  Dimensions,\n  PanResponder,\n  GestureResponderEvent,\n  PanResponderGestureState,\n} from 'react-native';\nimport Player from '../components/Player';\n\nconst { width: SCREEN_WIDTH, height: SCREEN_HEIGHT } = Dimensions.get('window');\nconst PLAYER_WIDTH = 40;\n\nconst GameScreen: React.FC = () => {\n  const playerXRef = useRef(SCREEN_WIDTH / 2 - PLAYER_WIDTH / 2);\n  const [playerX, setPlayerX] = useState(playerXRef.current);\n  const playerY = SCREEN_HEIGHT - 120;\n\n  const panResponder = useMemo(\n    () =>\n      PanResponder.create({\n        onStartShouldSetPanResponder: () => true,\n        onMoveShouldSetPanResponder: () => true,\n        onPanResponderMove: (\n          event: GestureResponderEvent,\n          gestureState: PanResponderGestureState\n        ) => {\n          // タッチ位置のX座標を取得し、自機を移動\n          const touchX = event.nativeEvent.pageX;\n          const newX = Math.max(\n            0,\n            Math.min(touchX - PLAYER_WIDTH / 2, SCREEN_WIDTH - PLAYER_WIDTH)\n          );\n          playerXRef.current = newX;\n          setPlayerX(newX);\n        },\n      }),\n    []\n  );\n\n  return (\n    <View style={styles.container}>\n      <View style={styles.scoreArea}>\n        <Text style={styles.scoreText}>スコア: 0</Text>\n        <Text style={styles.scoreText}>ライフ: 3</Text>\n      </View>\n      <View style={styles.gameArea} {...panResponder.panHandlers}>\n        <Player x={playerX} y={playerY} />\n      </View>\n    </View>\n  );\n};\n\nconst styles = StyleSheet.create({\n  container: {\n    flex: 1,\n    backgroundColor: '#000000',\n  },\n  scoreArea: {\n    flexDirection: 'row',\n    justifyContent: 'space-between',\n    paddingHorizontal: 20,\n    paddingTop: 50,\n    paddingBottom: 10,\n  },\n  scoreText: {\n    color: '#FFFFFF',\n    fontSize: 16,\n  },\n  gameArea: {\n    flex: 1,\n    position: 'relative',\n  },\n});\n\nexport default GameScreen;",
                    'filename' => 'screens/GameScreen.tsx',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '画面端の制限処理',
                ],
                [
                    'type' => 'text',
                    'text' => 'Math.max(0, Math.min(x, SCREEN_WIDTH - PLAYER_WIDTH)) を使うことで、自機が画面外に出ないように制限しています。最小値は 0（左端）、最大値は画面幅から自機の幅を引いた値（右端）です。',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '代替案: ボタンによる操作',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "// ボタンでの操作（PanResponder の代替案）\nconst MOVE_SPEED = 10;\n\nconst moveLeft = () => {\n  const newX = Math.max(0, playerXRef.current - MOVE_SPEED);\n  playerXRef.current = newX;\n  setPlayerX(newX);\n};\n\nconst moveRight = () => {\n  const newX = Math.min(SCREEN_WIDTH - PLAYER_WIDTH, playerXRef.current + MOVE_SPEED);\n  playerXRef.current = newX;\n  setPlayerX(newX);\n};\n\n// 画面下部にボタンを配置\n<View style={styles.controlArea}>\n  <TouchableOpacity style={styles.controlButton} onPress={moveLeft}>\n    <Text style={styles.controlText}>◀</Text>\n  </TouchableOpacity>\n  <TouchableOpacity style={styles.controlButton} onPress={moveRight}>\n    <Text style={styles.controlText}>▶</Text>\n  </TouchableOpacity>\n</View>",
                ],
                [
                    'type' => 'tip',
                    'text' => 'useRef を使って playerXRef で座標を管理している理由は、PanResponder のコールバック内で最新の値にアクセスするためです。useState だけだと、クロージャの問題で古い値を参照してしまうことがあります。これは React のイベントハンドラでもよく遭遇する問題です。',
                ],
                [
                    'type' => 'warning',
                    'text' => 'PanResponder を useMemo や useRef で作成しないと、レンダリングごとに新しいインスタンスが生成されパフォーマンスが低下します。必ずメモ化してください。',
                ],
                [
                    'type' => 'quiz',
                    'questions' => [
                        [
                            'question' => 'PanResponder で指の移動を検出するイベントはどれですか？',
                            'options' => [
                                'onPanResponderGrant',
                                'onPanResponderMove',
                                'onPanResponderRelease',
                                'onPanResponderStart',
                            ],
                            'correct' => 1,
                            'explanation' => 'onPanResponderMove は指が移動している間、継続的に呼ばれるイベントです。onPanResponderGrant はタッチ開始、onPanResponderRelease は指を離した時です。',
                        ],
                        [
                            'question' => '自機が画面外に出ないようにする正しいコードはどれですか？',
                            'options' => [
                                'if (x < 0) x = 0;',
                                'Math.max(0, Math.min(x, SCREEN_WIDTH))',
                                'Math.max(0, Math.min(x, SCREEN_WIDTH - PLAYER_WIDTH))',
                                'Math.clamp(x, 0, SCREEN_WIDTH)',
                            ],
                            'correct' => 2,
                            'explanation' => 'Math.max(0, Math.min(x, SCREEN_WIDTH - PLAYER_WIDTH)) が正解です。PLAYER_WIDTH を引くのは、自機の右端が画面外に出ないようにするためです。',
                        ],
                    ],
                ],
            ],
        ];
    }

    private static function chapter7(): array
    {
        return [
            'number' => 7,
            'title' => '弾の発射',
            'summary' => 'Animated APIを使って弾のアニメーションを実装します。',
            'content' => [
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'Animated API で弾を飛ばそう',
                ],
                [
                    'type' => 'text',
                    'text' => 'React Native の Animated API は、スムーズなアニメーションを実現するための標準ライブラリです。Web の CSS Transitions や requestAnimationFrame に相当しますが、ネイティブスレッドで実行されるためパフォーマンスが優れています。弾の発射アニメーションを通じて Animated API の基本を学びましょう。',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'Animated.Value の基本',
                ],
                [
                    'type' => 'text',
                    'text' => 'Animated.Value はアニメーション可能な値を保持するオブジェクトです。この値を View のスタイルにバインドし、Animated.timing() で時間経過に応じて変化させることでアニメーションを実現します。',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import { Animated } from 'react-native';\n\n// アニメーション値の作成\nconst bulletY = new Animated.Value(startY);\n\n// アニメーションの実行（弾を上方向に移動）\nAnimated.timing(bulletY, {\n  toValue: -20,            // 画面外（上端）まで移動\n  duration: 800,           // 800ミリ秒かけて移動\n  useNativeDriver: false,  // top/left のアニメーションには false を指定\n}).start(() => {\n  // アニメーション完了後のコールバック\n  // ここで弾を削除する処理を書く\n});",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '弾の発射システム全体の実装',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import React, { useState, useRef, useCallback } from 'react';\nimport { View, Animated, StyleSheet, Dimensions } from 'react-native';\n\nconst { height: SCREEN_HEIGHT } = Dimensions.get('window');\n\ntype Bullet = {\n  id: number;\n  x: number;\n  y: Animated.Value;\n  currentY: number; // 衝突判定用にY座標をトラッキング\n};\n\nlet bulletIdCounter = 0;\n\nconst useBulletSystem = (playerX: number, playerY: number) => {\n  const [bullets, setBullets] = useState<Bullet[]>([]);\n  const bulletsRef = useRef<Bullet[]>([]);\n\n  const fireBullet = useCallback(() => {\n    const bulletId = bulletIdCounter++;\n    const bulletY = new Animated.Value(playerY);\n\n    const newBullet: Bullet = {\n      id: bulletId,\n      x: playerX + 18, // 自機の中心に合わせる\n      y: bulletY,\n      currentY: playerY,\n    };\n\n    // Y座標をリスナーでトラッキング（衝突判定用）\n    bulletY.addListener(({ value }) => {\n      newBullet.currentY = value;\n    });\n\n    bulletsRef.current = [...bulletsRef.current, newBullet];\n    setBullets([...bulletsRef.current]);\n\n    // 弾を上方向にアニメーション\n    Animated.timing(bulletY, {\n      toValue: -20,\n      duration: 800,\n      useNativeDriver: false, // addListener でトラッキングするため false\n    }).start(() => {\n      // 画面外に出た弾を削除\n      bulletY.removeAllListeners();\n      bulletsRef.current = bulletsRef.current.filter(b => b.id !== bulletId);\n      setBullets([...bulletsRef.current]);\n    });\n  }, [playerX, playerY]);\n\n  return { bullets, bulletsRef, fireBullet };\n};\n\n// 弾コンポーネント\nconst BulletView: React.FC<{ bullet: Bullet }> = ({ bullet }) => {\n  return (\n    <Animated.View\n      style={[\n        styles.bullet,\n        {\n          left: bullet.x,\n          top: bullet.y, // useNativeDriver: false なので top で直接指定\n        },\n      ]}\n    />\n  );\n};\n\nconst styles = StyleSheet.create({\n  bullet: {\n    position: 'absolute',\n    width: 4,\n    height: 12,\n    backgroundColor: '#FFFF00',\n    borderRadius: 2,\n  },\n});",
                    'filename' => 'hooks/useBulletSystem.tsx',
                ],
                [
                    'type' => 'text',
                    'text' => '弾の配列を useState と useRef の両方で管理しています。useRef はアニメーションのコールバック内で最新の配列を参照するために必要です。useState は UI の再レンダリングをトリガーするために使います。',
                ],
                [
                    'type' => 'comparison',
                    'title' => 'アニメーションの比較',
                    'react' => "/* Web: CSS Transition */\n.bullet {\n  transition: transform 0.8s linear;\n}\n.bullet.fired {\n  transform: translateY(-100vh);\n}\n\n/* または requestAnimationFrame */\nfunction animate() {\n  bulletY -= speed;\n  element.style.transform = `translateY(\${bulletY}px)`;\n  requestAnimationFrame(animate);\n}",
                    'reactNative' => "/* React Native: Animated API */\nAnimated.timing(bulletY, {\n  toValue: -20,\n  duration: 800,\n  useNativeDriver: false,\n}).start();",
                ],
                [
                    'type' => 'tip',
                    'text' => 'useNativeDriver: true を指定すると、アニメーションがネイティブスレッドで実行され 60fps のスムーズな動作が実現できます。ただし、対応しているのは transform と opacity のみで、top/left は使えません。また、ゲームのように衝突判定で値を読み取る必要がある場合は useNativeDriver: false にして addListener() でトラッキングする方がJSスレッドで毎フレーム値を取得できるため確実です。',
                ],
                [
                    'type' => 'warning',
                    'text' => 'useNativeDriver: true を使用する場合、left や top を直接アニメーションすることはできません。代わりに transform の translateX や translateY を使ってください。',
                ],
                [
                    'type' => 'list',
                    'items' => [
                        'Animated.Value: アニメーション可能な値を保持するクラス',
                        'Animated.timing: 時間ベースのアニメーション（最も一般的）',
                        'Animated.spring: バネのような物理ベースのアニメーション',
                        'Animated.View: Animated 対応の View コンポーネント',
                        'useNativeDriver: ネイティブスレッドでの高速実行を有効化',
                    ],
                ],
                [
                    'type' => 'quiz',
                    'questions' => [
                        [
                            'question' => 'Animated.timing() で useNativeDriver: true を指定する主な理由は？',
                            'options' => [
                                'メモリ使用量を削減するため',
                                'アニメーションをネイティブスレッドで実行しパフォーマンスを向上させるため',
                                'TypeScript の型チェックを有効にするため',
                                'アニメーションの逆再生を可能にするため',
                            ],
                            'correct' => 1,
                            'explanation' => 'useNativeDriver: true を指定すると、アニメーション計算が JavaScript スレッドからネイティブスレッドに移行され、60fps のスムーズなアニメーションが実現できます。',
                        ],
                        [
                            'question' => 'Animated.timing() のコールバック（.start() の引数）はいつ実行されますか？',
                            'options' => [
                                'アニメーション開始時',
                                'アニメーション中の各フレーム',
                                'アニメーション完了時',
                                'コンポーネントのマウント時',
                            ],
                            'correct' => 2,
                            'explanation' => '.start(callback) のコールバックはアニメーションが完了した後に実行されます。弾が画面外に到達した後のクリーンアップ処理などに使います。',
                        ],
                        [
                            'question' => 'useNativeDriver: true を使用する場合、アニメーションできるプロパティはどれですか？',
                            'options' => [
                                'width と height',
                                'left と top',
                                'transform と opacity',
                                'backgroundColor と borderColor',
                            ],
                            'correct' => 2,
                            'explanation' => 'useNativeDriver: true が対応しているのは transform（translateX, translateY, scale, rotate など）と opacity のみです。レイアウトプロパティ（width, height, left, top など）はサポートされていません。',
                        ],
                    ],
                ],
            ],
        ];
    }

    private static function chapter8(): array
    {
        return [
            'number' => 8,
            'title' => '敵キャラクターの配置と移動',
            'summary' => '敵キャラクターの配置と一斉移動ロジックを実装します。',
            'content' => [
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '敵の配列データ構造を設計する',
                ],
                [
                    'type' => 'text',
                    'text' => 'スペースインベーダーでは、敵が格子状に並んでいます。これを2次元配列で管理します。各敵は座標、生存フラグ、種類などの情報を持ちます。Laravel でデータベースのテーブルを設計するように、敵のデータ構造を考えましょう。',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "// 敵の型定義\ntype Enemy = {\n  id: number;\n  row: number;\n  col: number;\n  x: number;\n  y: number;\n  alive: boolean;\n  type: 'top' | 'middle' | 'bottom'; // 種類によってポイントが異なる\n};\n\n// 定数\nconst ENEMY_ROWS = 5;\nconst ENEMY_COLS = 8;\nconst ENEMY_WIDTH = 30;\nconst ENEMY_HEIGHT = 24;\nconst ENEMY_PADDING = 8;\n\n// 敵の初期配列を生成する関数\nconst createEnemies = (): Enemy[] => {\n  const enemies: Enemy[] = [];\n  let id = 0;\n\n  for (let row = 0; row < ENEMY_ROWS; row++) {\n    for (let col = 0; col < ENEMY_COLS; col++) {\n      const type = row < 1 ? 'top' : row < 3 ? 'middle' : 'bottom';\n      enemies.push({\n        id: id++,\n        row,\n        col,\n        x: col * (ENEMY_WIDTH + ENEMY_PADDING) + 20,\n        y: row * (ENEMY_HEIGHT + ENEMY_PADDING) + 60,\n        alive: true,\n        type,\n      });\n    }\n  }\n\n  return enemies;\n};",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '敵コンポーネントの作成',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import React from 'react';\nimport { View, StyleSheet } from 'react-native';\n\ntype EnemyViewProps = {\n  enemy: Enemy;\n};\n\nconst EnemyView: React.FC<EnemyViewProps> = ({ enemy }) => {\n  if (!enemy.alive) return null;\n\n  const color = enemy.type === 'top' ? '#FF0000'\n    : enemy.type === 'middle' ? '#FF6600'\n    : '#FFCC00';\n\n  return (\n    <View style={[styles.enemy, { left: enemy.x, top: enemy.y }]}>\n      {/* ピクセルアート風の敵 */}\n      <View style={[styles.enemyBody, { backgroundColor: color }]} />\n      <View style={[styles.enemyEyeLeft, { backgroundColor: '#000' }]} />\n      <View style={[styles.enemyEyeRight, { backgroundColor: '#000' }]} />\n      <View style={[styles.enemyLegLeft, { backgroundColor: color }]} />\n      <View style={[styles.enemyLegRight, { backgroundColor: color }]} />\n    </View>\n  );\n};\n\nconst styles = StyleSheet.create({\n  enemy: {\n    position: 'absolute',\n    width: 30,\n    height: 24,\n  },\n  enemyBody: {\n    width: 24,\n    height: 16,\n    alignSelf: 'center',\n    borderRadius: 4,\n  },\n  enemyEyeLeft: {\n    position: 'absolute',\n    width: 4,\n    height: 4,\n    top: 4,\n    left: 8,\n    borderRadius: 2,\n  },\n  enemyEyeRight: {\n    position: 'absolute',\n    width: 4,\n    height: 4,\n    top: 4,\n    right: 8,\n    borderRadius: 2,\n  },\n  enemyLegLeft: {\n    position: 'absolute',\n    width: 6,\n    height: 6,\n    bottom: 0,\n    left: 4,\n  },\n  enemyLegRight: {\n    position: 'absolute',\n    width: 6,\n    height: 6,\n    bottom: 0,\n    right: 4,\n  },\n});\n\nexport default EnemyView;",
                    'filename' => 'components/EnemyView.tsx',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'ゲームループと一斉移動ロジック',
                ],
                [
                    'type' => 'text',
                    'text' => '敵の一斉移動は setInterval でゲームループを作成し、一定間隔で敵全体を移動させます。移動ロジックは「左右に移動→端に到達したら1段下降して方向を反転」というスペースインベーダーの伝統的なパターンです。',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import { useEffect, useRef, useState } from 'react';\nimport { Dimensions } from 'react-native';\n\nconst { width: SCREEN_WIDTH } = Dimensions.get('window');\nconst MOVE_SPEED = 5;\nconst DROP_DISTANCE = 20;\n\nconst useEnemyMovement = () => {\n  const [enemies, setEnemies] = useState<Enemy[]>(createEnemies());\n  const enemiesRef = useRef(enemies);\n  const directionRef = useRef<'left' | 'right'>('right');\n\n  useEffect(() => {\n    const gameLoop = setInterval(() => {\n      const currentEnemies = enemiesRef.current;\n      const aliveEnemies = currentEnemies.filter(e => e.alive);\n\n      if (aliveEnemies.length === 0) return;\n\n      // 端に到達したかチェック\n      const maxX = Math.max(...aliveEnemies.map(e => e.x));\n      const minX = Math.min(...aliveEnemies.map(e => e.x));\n      let shouldDrop = false;\n\n      if (directionRef.current === 'right' && maxX + ENEMY_WIDTH >= SCREEN_WIDTH - 10) {\n        directionRef.current = 'left';\n        shouldDrop = true;\n      } else if (directionRef.current === 'left' && minX <= 10) {\n        directionRef.current = 'right';\n        shouldDrop = true;\n      }\n\n      // 敵を移動\n      const updatedEnemies = currentEnemies.map(enemy => {\n        if (!enemy.alive) return enemy;\n        return {\n          ...enemy,\n          x: enemy.x + (directionRef.current === 'right' ? MOVE_SPEED : -MOVE_SPEED),\n          y: shouldDrop ? enemy.y + DROP_DISTANCE : enemy.y,\n        };\n      });\n\n      enemiesRef.current = updatedEnemies;\n      setEnemies(updatedEnemies);\n    }, 500); // 500ms ごとに移動\n\n    return () => clearInterval(gameLoop);\n  }, []);\n\n  return { enemies, setEnemies, enemiesRef };\n};",
                    'filename' => 'hooks/useEnemyMovement.tsx',
                ],
                [
                    'type' => 'text',
                    'text' => 'useEffect の return で clearInterval を呼ぶことで、コンポーネントがアンマウントされた時にゲームループを停止します。これは React のクリーンアップパターンで、メモリリークを防ぐために重要です。',
                ],
                [
                    'type' => 'tip',
                    'text' => 'setInterval によるゲームループは、Laravel のスケジューラ（app/Console/Kernel.php の schedule メソッド）に似ています。一定間隔で処理を実行する仕組みです。ただし、React Native ではコンポーネントのライフサイクルに合わせて適切にクリーンアップすることが重要です。',
                ],
                [
                    'type' => 'warning',
                    'text' => 'useEffect 内で setInterval を使う場合、必ずクリーンアップ関数で clearInterval を呼んでください。これを忘れると、画面遷移後もゲームループが動き続け、メモリリークの原因になります。',
                ],
                [
                    'type' => 'quiz',
                    'questions' => [
                        [
                            'question' => '敵が画面端に到達した時の正しい動作はどれですか？',
                            'options' => [
                                '即座に反対側に出現する',
                                '停止する',
                                '1段下降して移動方向を反転する',
                                '消滅する',
                            ],
                            'correct' => 2,
                            'explanation' => 'スペースインベーダーの敵は画面端に到達すると1段下降し、移動方向を反転します。このパターンにより、時間が経つにつれて敵がプレイヤーに近づいてきます。',
                        ],
                        [
                            'question' => 'useEffect のクリーンアップ関数で clearInterval を呼ぶ理由は何ですか？',
                            'options' => [
                                'アニメーションを高速化するため',
                                'コンポーネントのアンマウント時にゲームループを停止してメモリリークを防ぐため',
                                'TypeScript のコンパイルエラーを防ぐため',
                                'setInterval の実行速度を調整するため',
                            ],
                            'correct' => 1,
                            'explanation' => 'clearInterval を呼ばないと、コンポーネントがアンマウントされた後もゲームループが動き続け、メモリリークやエラーの原因になります。',
                        ],
                    ],
                ],
            ],
        ];
    }

    private static function chapter9(): array
    {
        return [
            'number' => 9,
            'title' => '衝突判定',
            'summary' => '弾と敵、敵の弾と自機の当たり判定を実装します。',
            'content' => [
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'AABB 衝突判定の基本',
                ],
                [
                    'type' => 'text',
                    'text' => '衝突判定はゲーム開発の核心部分です。ここでは AABB（Axis-Aligned Bounding Box）という最もシンプルな矩形ベースの衝突判定を使います。2つの矩形が重なっているかどうかを判定するだけなので、理解しやすく計算コストも低いです。',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'checkCollision 関数の実装',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "type Rect = {\n  x: number;\n  y: number;\n  width: number;\n  height: number;\n};\n\n// AABB 衝突判定: 2つの矩形が重なっているかチェック\nconst checkCollision = (rect1: Rect, rect2: Rect): boolean => {\n  return (\n    rect1.x < rect2.x + rect2.width &&\n    rect1.x + rect1.width > rect2.x &&\n    rect1.y < rect2.y + rect2.height &&\n    rect1.y + rect1.height > rect2.y\n  );\n};",
                    'filename' => 'utils/collision.ts',
                ],
                [
                    'type' => 'text',
                    'text' => 'この判定は「2つの矩形が重なっていない条件の否定」です。矩形Aが矩形Bの右側にある、左側にある、上にある、下にある、のいずれでもなければ重なっています。',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '弾と敵の衝突判定ロジック',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "const BULLET_WIDTH = 4;\nconst BULLET_HEIGHT = 12;\n\n// 弾と敵の衝突判定を行う\nconst checkBulletEnemyCollisions = (\n  bullets: Bullet[],\n  enemies: Enemy[],\n  onHit: (enemyId: number, bulletId: number) => void\n) => {\n  bullets.forEach(bullet => {\n    // 弾の現在のY座標を取得（Animated.Value から）\n    const bulletRect: Rect = {\n      x: bullet.x,\n      y: bullet.currentY, // 別途トラッキングが必要\n      width: BULLET_WIDTH,\n      height: BULLET_HEIGHT,\n    };\n\n    enemies.forEach(enemy => {\n      if (!enemy.alive) return;\n\n      const enemyRect: Rect = {\n        x: enemy.x,\n        y: enemy.y,\n        width: ENEMY_WIDTH,\n        height: ENEMY_HEIGHT,\n      };\n\n      if (checkCollision(bulletRect, enemyRect)) {\n        onHit(enemy.id, bullet.id);\n      }\n    });\n  });\n};",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '敵からの弾（ランダム発射）',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "type EnemyBullet = {\n  id: number;\n  x: number;\n  y: Animated.Value;\n  currentY: number;\n};\n\nlet enemyBulletId = 0;\n\n// 敵がランダムに弾を発射する\nconst fireEnemyBullet = (\n  enemies: Enemy[],\n  enemyBullets: EnemyBullet[],\n  setEnemyBullets: React.Dispatch<React.SetStateAction<EnemyBullet[]>>\n) => {\n  const aliveEnemies = enemies.filter(e => e.alive);\n  if (aliveEnemies.length === 0) return;\n\n  // ランダムに敵を選択\n  const shooter = aliveEnemies[Math.floor(Math.random() * aliveEnemies.length)];\n  const bulletY = new Animated.Value(shooter.y + ENEMY_HEIGHT);\n  const bulletId = enemyBulletId++;\n\n  const newBullet: EnemyBullet = {\n    id: bulletId,\n    x: shooter.x + ENEMY_WIDTH / 2,\n    y: bulletY,\n    currentY: shooter.y + ENEMY_HEIGHT,\n  };\n\n  // Y座標をリスナーでトラッキング\n  bulletY.addListener(({ value }) => {\n    newBullet.currentY = value;\n  });\n\n  setEnemyBullets(prev => [...prev, newBullet]);\n\n  // 弾を下方向にアニメーション\n  Animated.timing(bulletY, {\n    toValue: SCREEN_HEIGHT + 20,\n    duration: 1500,\n    useNativeDriver: false, // addListener でトラッキングするため false\n  }).start(() => {\n    bulletY.removeAllListeners();\n    setEnemyBullets(prev => prev.filter(b => b.id !== bulletId));\n  });\n};",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '敵の弾と自機の衝突判定',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "// 敵の弾と自機の衝突判定\nconst checkEnemyBulletPlayerCollision = (\n  enemyBullets: EnemyBullet[],\n  playerX: number,\n  playerY: number,\n  onPlayerHit: (bulletId: number) => void\n) => {\n  const playerRect: Rect = {\n    x: playerX,\n    y: playerY,\n    width: PLAYER_WIDTH,\n    height: PLAYER_HEIGHT,\n  };\n\n  enemyBullets.forEach(bullet => {\n    const bulletRect: Rect = {\n      x: bullet.x - 2,\n      y: bullet.currentY,\n      width: 4,\n      height: 12,\n    };\n\n    if (checkCollision(playerRect, bulletRect)) {\n      onPlayerHit(bullet.id);\n    }\n  });\n};",
                ],
                [
                    'type' => 'tip',
                    'text' => 'AABB 衝突判定は、Web ゲーム開発でも頻繁に使われるテクニックです。Canvas ゲームや DOM ベースのゲームでも同じアルゴリズムが使えます。Laravel のバリデーションで between ルールを使うのに似て、座標の範囲を確認しているだけです。',
                ],
                [
                    'type' => 'warning',
                    'text' => 'Animated.Value の現在値を直接読み取ることはできません。addListener() で値の変化をトラッキングするか、Animated.Value の __getValue() メソッド（非推奨）を使う必要があります。パフォーマンスのため、addListener() の使用を推奨します。',
                ],
                [
                    'type' => 'quiz',
                    'questions' => [
                        [
                            'question' => 'AABB 衝突判定で「2つの矩形が衝突している」と判定される条件は？',
                            'options' => [
                                '2つの矩形の中心点が一致している',
                                '2つの矩形の辺が1つでも交差している',
                                '2つの矩形が X 軸と Y 軸の両方で重なっている',
                                '2つの矩形の面積が等しい',
                            ],
                            'correct' => 2,
                            'explanation' => 'AABB 衝突判定では、2つの矩形が X 軸方向と Y 軸方向の両方で重なりがある場合に衝突と判定します。どちらか一方の軸でも重なりがなければ衝突していません。',
                        ],
                        [
                            'question' => 'Animated.Value の現在値をリアルタイムで追跡する方法は？',
                            'options' => [
                                'animatedValue.getValue()',
                                'animatedValue.addListener()',
                                'animatedValue.currentValue',
                                'animatedValue.toNumber()',
                            ],
                            'correct' => 1,
                            'explanation' => 'addListener() を使うと、Animated.Value の値が変化するたびにコールバックが呼ばれ、現在値を取得できます。衝突判定のために弾の座標を追跡する際に使用します。',
                        ],
                    ],
                ],
            ],
        ];
    }

    private static function chapter10(): array
    {
        return [
            'number' => 10,
            'title' => 'スコアとゲームオーバー',
            'summary' => 'スコア管理、ライフ制、ゲームオーバー処理を実装してゲームを完成させます。',
            'content' => [
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'ゲーム状態の管理',
                ],
                [
                    'type' => 'text',
                    'text' => 'ゲームの状態管理はアプリ開発の重要なパートです。スコア、ライフ、ゲームオーバー状態などを useState で管理します。Laravel の Session 管理や React の Context に似た概念で、ゲーム全体の状態を一元管理します。',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "// ゲーム状態の管理\nconst [score, setScore] = useState(0);\nconst [lives, setLives] = useState(3);\nconst [gameOver, setGameOver] = useState(false);\nconst [gameStarted, setGameStarted] = useState(false);\n\n// Ref でリアルタイムの値を保持\nconst scoreRef = useRef(0);\nconst livesRef = useRef(3);\nconst gameOverRef = useRef(false);",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '敵撃破時のスコア加算',
                ],
                [
                    'type' => 'text',
                    'text' => '敵の種類によって獲得ポイントが異なります。上段の敵ほど高得点です。オリジナルのスペースインベーダーに倣った配点にしましょう。',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "// 敵の種類ごとのポイント\nconst getEnemyPoints = (type: Enemy['type']): number => {\n  switch (type) {\n    case 'top': return 30;    // 上段: 30点\n    case 'middle': return 20; // 中段: 20点\n    case 'bottom': return 10; // 下段: 10点\n    default: return 10;\n  }\n};\n\n// 敵を撃破した時の処理\nconst onEnemyHit = (enemyId: number, bulletId: number) => {\n  // 敵を消滅させる\n  const updatedEnemies = enemiesRef.current.map(enemy =>\n    enemy.id === enemyId ? { ...enemy, alive: false } : enemy\n  );\n  enemiesRef.current = updatedEnemies;\n  setEnemies(updatedEnemies);\n\n  // スコアを加算\n  const hitEnemy = enemiesRef.current.find(e => e.id === enemyId);\n  if (hitEnemy) {\n    const points = getEnemyPoints(hitEnemy.type);\n    scoreRef.current += points;\n    setScore(scoreRef.current);\n  }\n\n  // 弾を削除\n  bulletsRef.current = bulletsRef.current.filter(b => b.id !== bulletId);\n  setBullets([...bulletsRef.current]);\n\n  // 全敵撃破チェック\n  const allDefeated = updatedEnemies.every(e => !e.alive);\n  if (allDefeated) {\n    handleGameClear();\n  }\n};",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'ゲームオーバー条件と処理',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "// プレイヤーが被弾した時\nconst onPlayerHit = (bulletId: number) => {\n  livesRef.current -= 1;\n  setLives(livesRef.current);\n\n  // 敵の弾を削除\n  setEnemyBullets(prev => prev.filter(b => b.id !== bulletId));\n\n  if (livesRef.current <= 0) {\n    handleGameOver();\n  }\n};\n\n// 敵が画面下端に到達した場合もゲームオーバー\nconst checkEnemyReachedBottom = (enemies: Enemy[]) => {\n  const reachedBottom = enemies.some(\n    e => e.alive && e.y + ENEMY_HEIGHT >= playerY\n  );\n  if (reachedBottom) {\n    handleGameOver();\n  }\n};\n\n// ハイスコア保存（共通処理）\nconst saveHighScore = async () => {\n  try {\n    const savedHighScore = await AsyncStorage.getItem('highScore');\n    const currentHighScore = savedHighScore ? parseInt(savedHighScore, 10) : 0;\n    if (scoreRef.current > currentHighScore) {\n      await AsyncStorage.setItem('highScore', scoreRef.current.toString());\n    }\n  } catch (error) {\n    console.error('ハイスコアの保存に失敗:', error);\n  }\n};\n\n// ゲームオーバー処理\nconst handleGameOver = async () => {\n  gameOverRef.current = true;\n  setGameOver(true);\n  await saveHighScore();\n};\n\n// ゲームクリア処理（全敵撃破時）\nconst handleGameClear = async () => {\n  gameOverRef.current = true;\n  setGameOver(true); // クリア時もゲームループを停止\n  await saveHighScore();\n};",
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'ゲームオーバーモーダルとリスタート',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "// ゲームオーバーモーダル\nconst GameOverModal: React.FC<{\n  score: number;\n  onRestart: () => void;\n  onGoHome: () => void;\n}> = ({ score, onRestart, onGoHome }) => {\n  return (\n    <View style={modalStyles.overlay}>\n      <View style={modalStyles.modal}>\n        <Text style={modalStyles.title}>GAME OVER</Text>\n        <Text style={modalStyles.score}>スコア: {score}</Text>\n        <TouchableOpacity style={modalStyles.button} onPress={onRestart}>\n          <Text style={modalStyles.buttonText}>もう一度プレイ</Text>\n        </TouchableOpacity>\n        <TouchableOpacity\n          style={[modalStyles.button, modalStyles.homeButton]}\n          onPress={onGoHome}\n        >\n          <Text style={modalStyles.buttonText}>ホームに戻る</Text>\n        </TouchableOpacity>\n      </View>\n    </View>\n  );\n};\n\nconst modalStyles = StyleSheet.create({\n  overlay: {\n    ...StyleSheet.absoluteFillObject,\n    backgroundColor: 'rgba(0, 0, 0, 0.8)',\n    justifyContent: 'center',\n    alignItems: 'center',\n  },\n  modal: {\n    backgroundColor: '#111111',\n    padding: 30,\n    borderRadius: 10,\n    borderWidth: 2,\n    borderColor: '#00FF00',\n    alignItems: 'center',\n  },\n  title: {\n    fontSize: 36,\n    fontWeight: 'bold',\n    color: '#FF0000',\n    marginBottom: 20,\n  },\n  score: {\n    fontSize: 24,\n    color: '#FFFFFF',\n    marginBottom: 30,\n  },\n  button: {\n    backgroundColor: '#00FF00',\n    paddingHorizontal: 30,\n    paddingVertical: 12,\n    borderRadius: 5,\n    marginBottom: 10,\n    width: 200,\n    alignItems: 'center',\n  },\n  homeButton: {\n    backgroundColor: '#666666',\n  },\n  buttonText: {\n    fontSize: 16,\n    fontWeight: 'bold',\n    color: '#000000',\n  },\n});",
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "// リスタート処理\nconst restartGame = () => {\n  // 全ての状態をリセット\n  scoreRef.current = 0;\n  livesRef.current = 3;\n  gameOverRef.current = false;\n\n  setScore(0);\n  setLives(3);\n  setGameOver(false);\n  setBullets([]);\n  setEnemyBullets([]);\n\n  // 敵を再配置\n  const newEnemies = createEnemies();\n  enemiesRef.current = newEnemies;\n  setEnemies(newEnemies);\n\n  // プレイヤー位置をリセット\n  playerXRef.current = SCREEN_WIDTH / 2 - PLAYER_WIDTH / 2;\n  setPlayerX(playerXRef.current);\n};",
                ],
                [
                    'type' => 'tip',
                    'text' => 'リスタート処理では、すべての state と ref をリセットする必要があります。これは Laravel のテストで setUp() メソッドでデータベースをリフレッシュするのと同じ考え方です。漏れなくリセットすることが重要です。',
                ],
                [
                    'type' => 'list',
                    'items' => [
                        'スコア管理: useState + useRef の二重管理でリアルタイム更新',
                        'ライフ制: 被弾するとライフが1減少、0でゲームオーバー',
                        'ゲームオーバー条件: ライフ0 または 敵が画面下端に到達',
                        'ハイスコア保存: AsyncStorage で永続化',
                        'リスタート: 全状態のリセットと敵の再配置',
                    ],
                ],
                [
                    'type' => 'quiz',
                    'questions' => [
                        [
                            'question' => 'この実装でゲームオーバーになる条件として正しくないものはどれですか？',
                            'options' => [
                                'ライフが0になった時',
                                '敵が画面下端に到達した時',
                                'スコアが0になった時',
                                '全敵を撃破した時（ゲームクリア）',
                            ],
                            'correct' => 2,
                            'explanation' => 'スコアが0になってもゲームオーバーにはなりません。ゲームオーバーの条件は「ライフが0」か「敵が画面下端に到達」の2つです。全敵撃破はゲームクリア（勝利）扱いです。',
                        ],
                        [
                            'question' => 'リスタート処理で最も重要なことは何ですか？',
                            'options' => [
                                'アニメーションを停止すること',
                                '全ての state と ref を初期値にリセットすること',
                                '画面を再描画すること',
                                'AsyncStorage をクリアすること',
                            ],
                            'correct' => 1,
                            'explanation' => 'リスタート時には、スコア、ライフ、敵の配列、弾の配列など、全ての state と ref を初期値にリセットすることが最も重要です。1つでもリセット漏れがあると、前回のゲーム状態が残ってバグの原因になります。',
                        ],
                    ],
                ],
            ],
        ];
    }

    private static function chapter11(): array
    {
        return [
            'number' => 11,
            'title' => '仕上げとデプロイ',
            'summary' => 'パフォーマンス改善、効果音の追加、ビルドとストア申請の手順を学びます。',
            'content' => [
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'パフォーマンスの最適化',
                ],
                [
                    'type' => 'text',
                    'text' => 'ゲームが完成したら、パフォーマンスを改善しましょう。React の useCallback や useMemo を活用して、不要な再レンダリングを防ぎます。Web アプリの最適化と同じアプローチですが、モバイルではリソースが限られているためより重要です。',
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import React, { useCallback, useMemo } from 'react';\n\n// useCallback: 関数のメモ化\nconst fireBullet = useCallback(() => {\n  if (gameOverRef.current) return;\n  // 弾の発射処理...\n}, [playerX, playerY]);\n\n// useMemo: 計算結果のメモ化\nconst aliveEnemyCount = useMemo(() => {\n  return enemies.filter(e => e.alive).length;\n}, [enemies]);\n\n// React.memo: コンポーネントのメモ化\nconst EnemyView = React.memo<EnemyViewProps>(({ enemy }) => {\n  if (!enemy.alive) return null;\n  return (\n    <View style={[styles.enemy, { left: enemy.x, top: enemy.y }]}>\n      {/* ... */}\n    </View>\n  );\n});",
                    'filename' => 'screens/GameScreen.tsx',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => '効果音の追加',
                ],
                [
                    'type' => 'code',
                    'language' => 'bash',
                    'code' => "# expo-av のインストール\nnpx expo install expo-av",
                ],
                [
                    'type' => 'code',
                    'language' => 'tsx',
                    'code' => "import { Audio } from 'expo-av';\n\n// 効果音の読み込みと再生\nconst useSoundEffects = () => {\n  const shootSoundRef = useRef<Audio.Sound | null>(null);\n  const explosionSoundRef = useRef<Audio.Sound | null>(null);\n\n  useEffect(() => {\n    const loadSounds = async () => {\n      const { sound: shootSound } = await Audio.Sound.createAsync(\n        require('../assets/sounds/shoot.wav')\n      );\n      shootSoundRef.current = shootSound;\n\n      const { sound: explosionSound } = await Audio.Sound.createAsync(\n        require('../assets/sounds/explosion.wav')\n      );\n      explosionSoundRef.current = explosionSound;\n    };\n\n    loadSounds();\n\n    return () => {\n      shootSoundRef.current?.unloadAsync();\n      explosionSoundRef.current?.unloadAsync();\n    };\n  }, []);\n\n  const playShootSound = useCallback(async () => {\n    await shootSoundRef.current?.replayAsync();\n  }, []);\n\n  const playExplosionSound = useCallback(async () => {\n    await explosionSoundRef.current?.replayAsync();\n  }, []);\n\n  return { playShootSound, playExplosionSound };\n};",
                    'filename' => 'hooks/useSoundEffects.tsx',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'EAS Build でのビルドとデプロイ',
                ],
                [
                    'type' => 'text',
                    'text' => 'Expo Application Services (EAS) は、Expo アプリのビルド・配布を管理するクラウドサービスです。ローカルに Xcode や Android Studio がなくても、クラウド上でネイティブアプリをビルドできます。',
                ],
                [
                    'type' => 'code',
                    'language' => 'bash',
                    'code' => "# EAS CLI のインストール\nnpm install -g eas-cli\n\n# Expo アカウントにログイン\neas login\n\n# EAS Build の初期設定\neas build:configure\n\n# 開発用ビルド\neas build --platform ios --profile development\neas build --platform android --profile development\n\n# 本番用ビルド\neas build --platform ios --profile production\neas build --platform android --profile production",
                ],
                [
                    'type' => 'code',
                    'language' => 'json',
                    'code' => "{\n  \"cli\": {\n    \"version\": \">= 3.0.0\"\n  },\n  \"build\": {\n    \"development\": {\n      \"developmentClient\": true,\n      \"distribution\": \"internal\"\n    },\n    \"preview\": {\n      \"distribution\": \"internal\"\n    },\n    \"production\": {\n      \"ios\": {\n        \"buildNumber\": \"1\"\n      },\n      \"android\": {\n        \"versionCode\": 1\n      }\n    }\n  },\n  \"submit\": {\n    \"production\": {\n      \"ios\": {\n        \"appleId\": \"your-apple-id@example.com\",\n        \"ascAppId\": \"your-app-store-connect-id\"\n      }\n    }\n  }\n}",
                    'filename' => 'eas.json',
                ],
                [
                    'type' => 'heading',
                    'level' => 2,
                    'text' => 'ストア申請の流れ',
                ],
                [
                    'type' => 'list',
                    'items' => [
                        'iOS: Apple Developer Program ($99/年) に登録 → App Store Connect でアプリを作成 → eas submit --platform ios で申請',
                        'Android: Google Play Console ($25 一回) に登録 → アプリを作成 → eas submit --platform android でアップロード',
                        'ストア掲載用のスクリーンショット（複数サイズ）を用意する',
                        'プライバシーポリシーのURLが必要（簡易的なものでも可）',
                        'アプリの説明文、カテゴリ、年齢制限の設定',
                        'iOS の審査は通常1〜3日、Android は数時間〜1日',
                    ],
                ],
                [
                    'type' => 'tip',
                    'text' => 'EAS Build は Laravel Forge でのデプロイに似ています。Forge がサーバーの設定やデプロイを自動化するように、EAS はモバイルアプリのビルドとストア申請を自動化します。CI/CD パイプラインとしても使えるため、GitHub と連携して push 時に自動ビルドも可能です。',
                ],
                [
                    'type' => 'warning',
                    'text' => 'Apple Developer Account は年間 $99 の費用がかかります。iOS アプリをストアに公開するには必須です。Android は Google Play Console の登録料 $25（一回のみ）が必要です。開発・テスト段階では Expo Go を使えば費用はかかりません。',
                ],
                [
                    'type' => 'text',
                    'text' => 'おめでとうございます！これで React Native を使ったスペースインベーダーゲームが完成しました。React と Laravel の知識を活かして、モバイルアプリ開発の基礎を習得できました。ここから先は、ステージ制の追加、ボス敵の実装、オンラインランキングなど、自由に機能を拡張してみてください。',
                ],
                [
                    'type' => 'quiz',
                    'questions' => [
                        [
                            'question' => 'React.memo の役割として正しいものはどれですか？',
                            'options' => [
                                'コンポーネントの状態を保存する',
                                'props が変化しない場合に再レンダリングをスキップする',
                                'コンポーネントをキャッシュに保存する',
                                'メモリ使用量を制限する',
                            ],
                            'correct' => 1,
                            'explanation' => 'React.memo は props が前回と同じ場合に再レンダリングをスキップする高階コンポーネントです。大量の敵コンポーネントなど、頻繁に親が再レンダリングされるケースで効果的です。',
                        ],
                        [
                            'question' => 'EAS Build の主な機能は何ですか？',
                            'options' => [
                                'コードの文法チェックを行う',
                                'クラウド上でネイティブアプリをビルドする',
                                'テストを自動実行する',
                                'データベースのマイグレーションを実行する',
                            ],
                            'correct' => 1,
                            'explanation' => 'EAS Build はクラウド上で iOS/Android のネイティブアプリをビルドするサービスです。ローカルに Xcode や Android Studio がなくてもアプリをビルドでき、ストアへの提出も自動化できます。',
                        ],
                        [
                            'question' => 'expo-av で効果音を再生する前に必要な処理は？',
                            'options' => [
                                'ファイルをサーバーにアップロードする',
                                'Audio.Sound.createAsync() で音声ファイルを読み込む',
                                'マイクの権限を取得する',
                                'AudioContext を初期化する',
                            ],
                            'correct' => 1,
                            'explanation' => 'Audio.Sound.createAsync() で音声ファイルを事前に読み込んでおく必要があります。読み込んだ Sound オブジェクトの replayAsync() メソッドで再生します。コンポーネントのアンマウント時には unloadAsync() でリソースを解放することも重要です。',
                        ],
                    ],
                ],
            ],
        ];
    }

}
