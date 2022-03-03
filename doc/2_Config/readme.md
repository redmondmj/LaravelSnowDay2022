# Initial Config
## Setup database
 - Edit .env file for sqlite
   - Find this:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    - Replace with this:
    ```
    DB_CONNECTION=sqlite
    ```
 - create a new sqlite file database\database.sqlite
 - Migrate! `php artisan migrate` to wipe and reload `php artisan migrate:fresh`
 - remember... if you're using docker re[;ace `php` with `sail`
 - add the alias if needed `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`
---
## Building this Demo App
### Add Auth
- add the ui installer `composer require laravel/ui`
- add the Auth ui `php artisan ui vue --auth`
- test it! you should now be able to register a user and log in. that was easy!

### Add "School" to user registration/user
- We'll need to make some changes to each of the following files:
`\resources\views\auth\register.blade.php`
`\app\Http\Controllers\Auth\RegisterController.php`
`\app\User.php`
`\database\migrations\2014_10_12_000000_create_users_table.php`

### Add a seeder for the Users Table
- make the file `php artisan make:seed UserTableSeeder`
- populate the `run()` function to add users
- remember to to update the namespace for required resources!
- add your seeder to `run()` in DatabaseSeeder.php
    - add `$this->call(UserTableSeeder::class);`

### A few helpful utilities:
- to check existing routes - `php artisan route:list`
- to access the database cli - `php artisan db`
- to seed the database - `php artisan db:seed --class=UserSeeder`
- to run full seed, first update DatabaseSeeder.php:
- then just run `php artisan db:seed`
- or migrate AND seed `php artisan migrate:fresh --seed`
- add a user manually? `php artisan tinker`
    - build a user `$user = new App\Models\User;`
    - add attribute `$user->name = "itstudent";`
    - add attribute `$user->school = "GBHS";`
    - add attribute `$user->email = "students@email.com";`
    - set password `$user->password=bcrypt('123456');`
    - save user `$user->save();`
___
