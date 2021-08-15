![banner](https://banners.beyondco.de/Kodekus.png?theme=light&packageManager=&packageName=https%3A%2F%2Fgithub.com%2Fsherwinchia%2Fkodekus&pattern=architect&style=style_1&description=Laravel+Blogging+Web+Application&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

Laravel Blogging Web Application

Guest
1. View content
2. Comment on content
3. Register as user

Customer
1. Login
2. Bookmark content
3. Like content
4. Edit profile
5. Logout

Content-Writer
1. Login
2. Manage content
3. Logout

Admin 
1. Login
2. Manage content
3. Manage user
4. Manage web static information
5. Manage comment
6. Logout

### Installation

1. Clone the repository using the command "git clone [link]"
2. Setup XAMPP or Valet
3. Create database in MySQL
4. Configure the .env file accordingly (need SMTP for email verification)
5. Run command 
```
$composer install
$npm install
$php artisan migrate
$php artisan db:seed
$php artisan serve
$php artisan storage:link
```

## Built With
Backend: Laravel
Frontend: Livewire & Tailwind
Database: MySQL
