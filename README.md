# アプリケーション名
Pigly - 体重管理システム

---

## 環境構築手順
- `git clone` から始まり、Dockerビルド、マイグレーション、シーディング、ログイン確認までの流れを記述：

```bash
git clone git@github.com:xxxxx/yyyyy.git
cd yyyyy
mv laravel-docker-template Pigly
cd Pigly
git remote set-url origin 作成したリポジトリのURL
docker-compose up -d --build
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed

使用技術（実行環境）
Laravel 8.x / PHP 7.4 / MySQL 8.0 / Nginx / Docker

Laravel Fortify（認証機能

URL
開発環境：http://localhost:81

phpMyAdmin：http://localhost:8080

ログイン後画面：http://localhost:81/weight_logs


---

### 🔧 補足

- `README.md` に上記をそのまま貼り付けて使えます。
- ER図の画像を添付したい場合は、画像ファイルをリポジトリに入れて `![説明](相対パス)` で表示。
- よければ「機能概要」「使用方法」や「ディレクトリ構成」などもあとで追記できます。

---

この形式でファイルとして出力したい場合は「READMEファイルにして」と伝えてくれれば`.md`形式で出力します！

ER図
![image](https://github.com/user-attachments/assets/94b7ea77-b8b7-426a-a853-0afe270dc719)
