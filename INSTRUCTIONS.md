# Itooso Visiting Card Project Setup Guide

This guide will walk you through the steps required to set up and run the Itooso Visiting Card project locally.

## Prerequisites

Before proceeding, ensure you have the following installed:

-   [Composer](https://getcomposer.org/) - Dependency Manager for PHP
-   [Node.js](https://nodejs.org/) - JavaScript runtime
-   [XAMPP](https://www.apachefriends.org/index.html) or any other local server environment with PHP and MySQL
-   [Git](https://git-scm.com/) - Version Control System (optional but recommended)

## Steps to Run the Code

1. Clone the project repository or create a new Laravel project:

    laravel new itooso_visiting_card

    cd itooso_visiting_card

2. Create a database in XAMPP named `itooso_visiting_card`.

3. Install Breeze for authentication:

    composer require laravel/breeze --dev
    php artisan breeze:install

4. Uncomment and set up the database connection in the `.env` file:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=itooso_visiting_card
    DB_USERNAME=root
    DB_PASSWORD=

5. Migrate the database and install npm dependencies:

    php artisan migrate
    npm install && npm run dev

6. Enable the GD extension in `php.ini` from XAMPP settings.

7. Install Simple-QRCode:

    composer require simplesoftwareio/simple-qrcode

8. Install DomPDF for PDF generation:

    composer require barryvdh/laravel-dompdf

9. Publish the fonts used in PDF:

    php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"

10. Create a symbolic link for storing QR codes:

    php artisan storage:link

11. Migrate the database once again:

    php artisan migrate

12. Finally, serve the application:

    php artisan serve

Now you can access the Itooso Visiting Card application by visiting `http://localhost:8000` in your web browser.
