Trafficxion Project
==================

Welcome to the Trafficxion project! This repository is built using the latest version of Laravel 11, designed to provide you with a robust foundation for web applications.

* * *

🚀 Quick Start Guide
--------------------

### 1\. **Clone the Repository**

Start by cloning the repository to your local machine:

    git clone https://github.com/rshme/trafficxion-be.git
    cd trafficxion-be

### 2\. **Install Dependencies**

Trafficxion requires Composer to install its dependencies. Run the following command to install them:

    composer install

This will install all necessary PHP packages specified in `composer.json`.

### 3\. **Set Up the Environment File**

Create a copy of the `.env.example` file and rename it to `.env`. This file will hold all of your environment-specific settings, such as database configurations, API keys, and app settings.

    cp .env.example .env

You can then adjust the settings in the `.env` file to match your local environment (database, mail configuration, etc.).

### 4\. **Generate Application Key**

Generate a new application key by running:

    php artisan key:generate

This will set the `APP_KEY` in the `.env` file, which is required for secure sessions and encrypted data.

* * *

🛠️ Database Setup
------------------

### 5\. **Configure Your Database**

In the `.env` file, set your database connection details:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

Replace `your_database_name`, `your_database_user`, and `your_database_password` with your actual database information.

### 6\. **Run Migrations**

Once your database is configured, run the migrations to set up the required tables:

    php artisan migrate

This will apply all database migrations defined in the `database/migrations` directory.

### 7\. **Seed the Database**

If you want to seed your database with sample data, run the following command:

    php artisan db:seed

You can customize the data inserted by modifying the seeders located in `database/seeders`.

* * *

🌍 Running the Application
--------------------------

Once the above steps are completed, you can start the Laravel development server:

    php artisan serve

Visit [http://localhost:8000](http://localhost:8000) in your browser to see the application in action.

* * *

### 🧪 Setting Up for Testing
------------------

If you want to run tests in your local development environment, you'll need to configure a separate `.env.testing` file for the testing environment.

#### 1\. **Create .env.testing File**

First, copy the `.env` file to create a `.env.testing` file:

    cp .env .env.testing

#### 2\. **Configure Testing Environment**

Create `.env.testing` file, update the configuration to match your testing environment. Typically, you will want to use a separate database to avoid conflicts with your local data.

For example, you can configure the database for testing:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_test_database_name
    DB_USERNAME=your_test_database_user
    DB_PASSWORD=your_test_database_password

Make sure to replace `your_test_database_name`, `your_test_database_user`, and `your_test_database_password` with appropriate test values.

#### 3\. **Run Tests**

Once you've set up your `.env.testing` file, you can run the tests with the following Artisan command:

    php artisan test

This will run the tests using the configurations from the `.env.testing` file.

#### 4\. **Optional: Running Specific Test Suite**

If you want to run a specific test or test suite, you can use the `--filter` option to specify a test name:

    php artisan test --filter=TestClassName

This allows you to isolate tests if you're working on a specific feature or bug fix.

By setting up the `.env.testing` file and running the tests, you can ensure that your changes won't affect your production or development environment. Happy testing! 🎉

* * *
⚙️ Additional Commands
----------------------

### Running Migrations with Seeder

If you want to run both migrations and seeders in one command, you can use:

    php artisan migrate --seed

### Resetting Migrations

To rollback and re-run your migrations (if needed), you can use:

    php artisan migrate:refresh

This command will roll back all migrations and then re-run them, including the seeding process if specified.

* * *

🔧 Troubleshooting
------------------

*   **Missing `.env` file**: Ensure that you've copied `.env.example` to `.env`.
*   **Database connection errors**: Double-check your `.env` database settings.
*   **Cache issues**: If you encounter issues with old cached configurations, clear the cache using:

    php artisan config:clear
    php artisan cache:clear

* * *

Enjoy developing with Trafficxion! 🎉