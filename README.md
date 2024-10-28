# Opportunities

# Laravel Application Setup with Docker

This guide will help you set up and run a Laravel application using Docker and Docker Compose. It covers starting the
application, running database migrations, seeding the database, and accessing the application in the browser.

## Prerequisites

Ensure you have the following installed:

- Docker
- Docker Compose

## Getting Started

### 1. Clone the Repository

Clone this repository to your local machine:

```bash
git clone https://github.com/aliqasemi/Opportunities
cd Opportunities
```

### 2. Configure Environment Variables

Make a copy of the .env.example file and rename it to .env:

```bash
cp .env.example .env
```

Edit .env and set up your database credentials, app URL, and other environment variables as needed. Ensure the database
host points to the Docker service (e.g., DB_HOST=mysql if using MySQL with Docker).

### 3. Start Docker Containers

Once the containers are running, install the PHP dependencies:

```bash
docker-compose up -d
docker-compose exec opp-laravel composer install
```

### 4. Generate Application Key

Generate the Laravel application key:

```bash
docker-compose exec opp-laravel php artisan key:generate
```

### 5. Run Database Migrations

Run the migrations to set up your database schema:

```bash
docker-compose exec opp-laravel php artisan migrate
```

### 6. Seed the Database

Seed the database with initial data:

```bash
docker-compose exec opp-larave php artisan db:seed --class=ItemsTableSeeder
```

### 7. Access the Application

Open your web browser and navigate to 'http://localhost:yourPort/opportunities' to access the Laravel application.
Replace yourPort with the port number you configured in the docker-compose.yml file.


