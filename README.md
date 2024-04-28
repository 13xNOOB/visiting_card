To run the code:
1. create project folder by using 
	laravel new itooso_visiting_card

2. cd itooso_visiting_card

3. Create database in xampp
	itooso_visiting_card

3. Install breeze:    
    i. composer require laravel/breeze --dev
    ii. php artisan breeze:install	
    iv. go to .env file and uncomment DB part and set DB_CONNECTION=mysql
    iii. php artisan migrate
    iv. npm install
    v. npm run dev

4. enable extension=gd in php.ini from xampp
 
3. composer require simplesoftwareio/simple-qrcode

4. For pdf
	composer require barryvdh/laravel-dompdf
5. To use poppins fonts in pdf:
    php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"

4. To store qr code
	php artisan storage:link

6. php artisan migrate 

5. php artisan serve
