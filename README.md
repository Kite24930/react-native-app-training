# React Native App Training

React Nativeアプリ開発を学ぶためのゲーム形式の学習プラットフォームです。

## 技術スタック

- **バックエンド**: Laravel 12 (PHP 8.2+)
- **フロントエンド**: React 19 + TypeScript + Inertia.js
- **スタイリング**: Tailwind CSS 4
- **ビルドツール**: Vite 7
- **データベース**: MySQL 8.4
- **キャッシュ**: Redis
- **コンテナ**: Docker (Laravel Sail)

## セットアップ

### 前提条件

- PHP 8.2以上
- Composer
- Node.js / npm
- Docker & Docker Compose（Sail使用時）

### インストール

```bash
composer setup
```

このコマンドで以下が実行されます:

1. Composer依存パッケージのインストール
2. `.env`ファイルの作成
3. アプリケーションキーの生成
4. データベースマイグレーション
5. npm依存パッケージのインストール
6. フロントエンドのビルド

### Docker（Laravel Sail）を使う場合

```bash
docker compose up -d
```

## 開発

```bash
composer dev
```

以下のサービスが同時に起動します:

- Laravel開発サーバー
- キューワーカー
- ログビューア (Pail)
- Vite開発サーバー

## テスト

```bash
composer test
```

## プロジェクト構成

```
app/
├── Http/Controllers/      # コントローラー（公開・管理者用）
├── Models/                 # Eloquentモデル (Course, Chapter, Image, User)
resources/js/
├── Pages/                  # Inertia.jsページコンポーネント
│   ├── HomePage.tsx        # トップページ
│   ├── DashboardPage.tsx   # ダッシュボード
│   ├── Courses/            # コース一覧・詳細
│   ├── Chapters/           # チャプター表示
│   └── Admin/              # 管理画面
├── Components/             # 共通コンポーネント
└── hooks/                  # カスタムフック
database/
├── migrations/             # マイグレーション
└── seeders/                # シーダー（コース・チャプターデータ）
```

## ライセンス

MIT
