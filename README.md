# Technical Challenge User Profile

[![en](https://img.shields.io/badge/lang-en-red.svg)](/README.md)
[![pt-br](https://img.shields.io/badge/lang-pt--br-green.svg)](/README.pt-BR.md)

## Table of Contents

1. [Overview](#overview)
2. [Technologies Used](#technologies-used)
3. [Prerequisites](#prerequisites)
4. [Installation Steps](#installation-steps)
5. [Troubleshooting](#troubleshooting)

## Overview

This project was built with Laravel and focuses on registering users and showing other users.

## Technologies Used

- **Laravel**: PHP framework for building web applications.
- **MySQL**: relational database management system.
- **Laravel Mix**: a compiler assets using Webpack. [Learn more](https://laravel-mix.com/).

## Prerequisites

Before running the application, you need to install the following:

- **XAMPP**: Includes PHP and MySQL. You can use other applications if you prefer, but you need PHP and MySQL.
- **Composer**: A dependency manager for PHP
- **npm**: Required for managing JavaScript packages.
- **laravel-mix**: Required to compile CSS and JavaScript assets.

## Installation Steps

### 1. Install XAMPP

Download and install PHP and MySQL with [XAMPP](https://www.apachefriends.org/index.html).

### 2. Start the XAMPP Server

- Open the XAMPP Control Panel.
- Click the 'Start' button next to **MySQL**.
- (Optional) Start **Apache** to access phpMyAdmin at `http://127.0.0.1/phpmyadmin`.
  > This is optional, and allows you to view your database through phpMyAdmin. You can also use other database tools like TablePlus, HeidiSQL and others.

### 3. Download this Repository

Download this repository by clicking the `<> Code` button and selecting `Download ZIP`.

### 4. Install Laravel Dependencies

Navigate to the project root directory in your terminal and run:

```bash
composer install
```

### 5. Install Node Packages

In the same terminal, run:

```bash
npm install
```

### 6. Configure Environment Variables

Duplicate the `.env.example` file and rename it to `.env`:

```bash
cp .env.example .env
```

### 7. Create the Database

Run the following command to create the database, generate the tables, and populate them with data.

```bash
php artisan migrate --seed
```

### 8. Generate Application Key

```bash
php artisan key:generate
```

### 9. Link Storage

Link the storage to make image uploads accessible

```bash
php artisan storage:link
```

### 10. Compile Assets

Compile the CSS and JS files

```bash
npm run production
```

For development, use:

```bash
npm run hot
```

### 11. Start the Local Server

Run the following command to start the local server:

```bash
php artisan serve
```

Access the application at `http://127.0.0.1:8000`.

**Note**: Keep the terminal open while the server is running. If you close it, the server will shut down.
**If you close the terminal**, run this step again and ensure that XAMPP is still running.

#### Host and Port Options

- `--host[=HOST]` => Defines the **host** address where the application will run (default: `127.0.0.1`).
- `--port[=PORT]` => Defines the **port** where the application will run (default: `8000`).

For example, to execute the server in a different host or port:

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

This way, your application will be accessible at http://127.0.0.1:8800.

## Troubleshooting

- If you encounter issues, ensure that the XAMPP services are running.
- Check for any error messages in the terminal.
