# Posts Task

is a laravel API and Dashboard project you can register and login to create posts and show it

## Install

install composer

```bash
composer install
```

Create .env file
```bash
create a new file .env and copy from .env.example to .env file
```

Run Migration

```bash
create your database with this name 'posts_task' 
Or any another name but change it in env file
```

```bash
php artisan migrate
```

Run seeder to add admin row in DB

```bash
php artisan db:seed
```

install NPM

```bash
npm install 
npm run dev
```


now you can register your first user and create multiple posts
