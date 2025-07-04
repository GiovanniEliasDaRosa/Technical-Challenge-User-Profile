# Technical-Challenge-User-Profile

## How it was made

This was made with Laravel and with a Laravel Mix([laravel-mix.com](https://laravel-mix.com/)) Node Module, which provides a clean, fluent API for defining basic webpack build steps for your applications. With support for several common CSS and JS pre-processors.

This project uses the database as MySQL, to run it, you should have some kind of MySQL server, I recommend XAMPP for Windows, which is a pretty easy to install and run.

## How to run

### 1. Verify you have PHP installed on the computer

An easy way to do that is by installing XAMPP, and it comes with MySQL, which will be used in this project

### 2. Verify you have MYSQL installed on the computer

An easy way to do that is by installing XAMPP, it comes with MySQL and PHP.

### 3. Start the XAMPP server

After installing and running the XAMPP app proceed

On the POPUP click on the line `MySQL` click the 'Start' button

(Optional) You can also start Apache to visualize the database in the browser by accessing `127.0.0.1/phpmyadmin`

### 4. Install the Laravel Application

Start a terminal and run this

```bash
composer intall
```

### 5. Install the node package

Still on the terminal run this

```bash
npm install
```

### 6. Copy the .env.example

On the root folder of project duplicate the `.env.example` and rename to `.env`

### 7. Create the database

Still on the terminal run this

```bash
php artisan migrate
```

### 8. Create the Application key

You need to run this, otherwise the Laravel will not work.

```bash
php artisan key:generate
```

### 8. Compile CSS and JS

This will compile the CSS and JS, you only need to run this once.

```bash
npm run prod
```

If you want to modify the project, running `npm run hot` will update the CSS and JS, and you need to keep the terminal open. Then on saving a file, it will automatically update the files under public/resource folder

### 9. Create the server

This will create the local server, which can be accessed by typing `127.0.0.1:8000` in the URL, or clicking the link the command returns.

```bash
php artisan serve
```

**LEAVE THE TERMINAL OPEN** - While the terminal is open the serve is online, in case of closing it the serve will be shut down.

**In a case of closing it accidentally** - You **only need to run the command from this step**
