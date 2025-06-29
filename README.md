# EasyBook

> **Note:** This project is for my personal training and learning purposes only. It is built with Laravel 12.19.3 and PHP 8.2.12. As of Laravel 11+, the traditional HTTP kernel file is no longer present due to the new application structure.

EasyBook is a web-based booking platform for local services such as spas, barbers, and clinics. It allows users to easily find, book, and manage appointments, while providing admins with tools to manage shops, users, and view analytics.

## Features

-   User registration and login
-   Browse and search for shops (spas, barbers, clinics)
-   Book and manage appointments (multi-service booking supported)
-   Admin dashboard for managing users, shops, and bookings
-   Role-based access (admin, store owner, user)
-   Responsive and modern UI
-   Dynamic shop creation with unlimited services
-   Activity logging for admin actions (e.g., shop creation)
-   Admin dashboard shows recent activities with performer name and timestamp
-   User dashboard shows only user's own bookings and stats
-   Notification alerts for key actions (e.g., shop creation)

## Getting Started

### Prerequisites

-   PHP 8.2.12 or higher
-   Composer
-   A database (MySQL, SQLite, etc.)

### Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/rodeldichoso/easybook-laravel.git
    cd Booking_System
    ```
2. Install PHP dependencies:
    ```sh
    composer install
    ```
3. Copy the example environment file and set your configuration:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```
4. Set up your database in `.env`, then run migrations:
    ```sh
    php artisan migrate
    ```
5. (Optional) Seed the database:
    ```sh
    php artisan db:seed
    ```
6. Start the development server:
    ```sh
    php artisan serve
    ```

## Project Status

This project is under active development. Some features may be incomplete or in progress.

## License

This project is open-sourced under the MIT license.
