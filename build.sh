#!/usr/bin/env bash

set -e

echo "🚧 Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader

echo "⚙️ Building frontend..."
npm install && npm run build

echo "📂 Linking storage..."
php artisan storage:link

echo "🔑 Generating app key..."
php artisan key:generate

echo "✅ Build complete"
