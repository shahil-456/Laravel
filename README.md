# Setup Project

php >= 8.3

1. Clone the repository  
   git clone https://github.com/shahil-456/Laravel-

2. Go to project directory  
   cd C:\Users\YourUsername\Desktop\laravel

3. Install dependencies  
   composer install  
   npm install



4. set up db

    database name = test_db
    username = root
    password = ''



5. Run migrations and seeders  
   php artisan migrate  
   php artisan db:seed --class=TableDataSeeder

6. Start the development server  
   php artisan serve

7.  Link Storage

    php artisan storage:link




# Admin User

email-  admin@gmail.com

pw-     0123456789


# Notify Command for Users

php artisan app:notify-inactive-users





<!-- Notified mails can be seen Laravel Log File -->

storage\logs\laravel.log








