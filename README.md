# Laravel Inertia Vue3 CV-App

## Summary

This project is a CV management application built using Laravel and Inertia.js with Vue 3. It allows users to create, update, view, and delete their curriculum vitae (CV) in a user-friendly web interface.

## Features
- Create, read, update, and delete CV entries

## Installation

### Prerequisites

- Docker and Docker Compose
- PHP >= 8.1 (if not using Docker)
- Composer
- Node.js and npm

### Steps

1. **Clone the Repository**

    ```bash
    git clone https://github.com/yourusername/cv-app.git
    cd cv-app
    ```

2. **Install Laravel Dependencies**

    Install project's dependencies

    ```bash
    composer install
    ```

   You can now start Sail:

    ```bash
    ./vendor/bin/sail up -d
    ```

   This command will build the Docker containers for your application. 

   Enter application's bash:
   ```bash
    ./vendor/bin/sail bash
    ```

3. **Install NPM Dependencies**

    ```bash
    npm install
    npm run dev
    ```

4. **Setup Environment**

   Copy `.env.example` to `.env` and configure your environment settings, especially the database settings.

    ```bash
    cp .env.example .env
    ```

5. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

6. **Run Migrations and Seeders**

    ```bash
    php artisan migrate:fresh --seed
    ```

7. **Serve the Application**

   The application should be running on your Docker environment, accessible via `http://localhost`.

## TODO

- User Authentication
- Check that end date can't be less than start date
- Add skill levels
- Restyle CV preview
- Implement advanced user profile management.
- Add multi-language support.
- Enhance the UI/UX for a more engaging user experience.
