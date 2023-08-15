# Laravel Product Importer

This is a Laravel application that allows you to import product data from a CSV file into a database. It utilizes Laravel's queue system for efficient batch processing and includes an event listener to handle duplicate SKUs.

## Features

- Import product data from a CSV file.
- Batch insert products into the database for performance optimization.
- Notify users via email if a product with the same SKU already exists.
- Custom facade to encapsulate import logic.

## Requirements

- PHP >= 8.1
- Laravel >= 8.0
- Composer

## Installation

1. Clone this repository to your local machine:

```bash
git clone https://github.com/your-username/your-laravel-product-importer.git
Install project dependencies:
bash
Copy code
cd your-laravel-product-importer
composer install
Configure your environment by copying the .env.example file to .env and updating the database connection settings and mail configuration.

Generate the application key:

bash
Copy code
php artisan key:generate
Run the database migrations:
bash
Copy code
php artisan migrate
Start the Laravel development server:
bash
Copy code
php artisan serve
Access the application in your web browser: http://localhost:8000
Usage
Navigate to the import form by visiting http://localhost:8000/import.

Upload a CSV file containing product data with the specified columns: Title, Description, SKU, Type, Publish Status.

Click the "Import" button to start the import process.

The application will process the CSV file in batches, using the queue system for background processing. If a product with the same SKU already exists, an email notification will be sent.