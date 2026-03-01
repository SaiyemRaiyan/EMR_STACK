## .:: EMR  ::.

## Project setup
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).


#### Downloading composer package and dumping
~~~bash
composer install
~~~

### Copy code from `.env.example` to `.env` file
~~~bash
cp .env.example .env
~~~

#### Configure project
~~~bash
php artisan cache:clear
~~~
~~~bash
php artisan config:cache
~~~
~~~bash
php artisan key:generate
~~~

#### NPM Package
~~~npm
npm install
npm run dev
~~~

### Create a database name and change credential in `.env` file

### migrate and seed database
~~~bash
php artisan migrate --seed
~~~

### Composer load now
~~~bash
composer dump-autoload
~~~

### Serving laravel project
~~~bash
php artisan serve
~~~


