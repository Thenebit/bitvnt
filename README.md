# BitVNT Event Management

BitVNT is a Laravel-based web application for managing events. It provides user authentication, event CRUD operations, and a dashboard to track event statuses.

## Features

- User registration, login, and password reset
- Email verification for new users
- Create, view, edit, and delete events
- Upload event images
- Dashboard with event statistics (total, active, pending, past)
- Responsive UI with Bootstrap and custom styles
- RESTful routing and controllers

## Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js & npm

### Installation

1. **Clone the repository**
    ```sh
    git clone <project>
    cd bitvnt
    ```

2. **Install PHP dependencies**
    ```sh
    composer install
    ```

3. **Install frontend dependencies**
    ```sh
    npm install
    ```

4. **Copy environment file**
    ```sh
    cp .env.example .env
    ```
    Edit `.env` with your settings.

5. **Generate application key**
    ```sh
    php artisan key:generate
    ```

6. **Run migrations**
    ```sh
    php artisan migrate
    ```

7. **Build frontend assets**
    ```sh
    npm run build
    ```

8. **Start the development server**
    ```sh
    php artisan serve
    ```

## Usage

- Register and log in to access event management features.
- Create new events with name, dates, image, and description.
- View all events, edit or delete them.
- Dashboard shows event statistics.

