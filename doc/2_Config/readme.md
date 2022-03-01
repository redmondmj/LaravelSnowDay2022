# Initial Config
## Setup database
 - edit .env as follows:
    - `DB_CONNECTION=sqlite`
 - create file database\database.sqlite
 - Migrate! `php artisan migrate` to wipe and reload `php artisan migrate:fresh`
 - remember... if you're using docker re[;ace `php` with `sail`
 - add the alias if needed `alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'`

## Building this Demo App
### Add Auth
- add the ui installer `composer require laravel/ui`
- add the Auth ui `php artisan ui vue --auth`
- test it! you should now be able to register a user and log in. that was easy!

### Add "School" to user registration/user
We'll need to make some changes to each of the following files:
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
Comming soon...
### Add the voting View & Controller

`php artisan make:controller VoteController`

`php artisan make:model Votes`

#### Set up views as needed

### Add chart.js for results view
`npm install chart.js --save`

### Add User Management
1. Create new controller and model for Usermanagement

    * `php artisan make:controller \\Admin\\UserController -r -mUser`
    * -r means this will be a ["Resource Controller"](https://laravel.com/docs/5.7/controllers#resource-controllers) and it will get all the typical "CRUD" routes automatically. 
    * Remove unwanted methods (show, create, store)
2. Add routes as "resources" for new controller to web.php
    * `php artisan route:list`

2. Add User Management link to app.blade.php

4. Create a Role model for assigning roles
    * `php artisan make:model Role -m`
    * -m will create a migration at the same time
    * add feilds to migration as needed
    * add another table to handle the association of roles and users
    * `php artisan make:migration create_role_user_table`
    * this will simply keep track of which users are assigned are assigned which roles, add fields as needed
    * `php artisan migrate`
    * create relationships in Laravel in Role.php model
    * `return $this->belongsToMany('App\User');`
    * create relationships in Laravel in User.php model
    * `return $this->belongsToMany('App\Role');`
5. Add view for user management index.blade.php
    * note the routes for our edit and delete buttons. ID must be passed in for the current user.

### Create DB seeder
`php artisan make:seed RolesTableSeeder`
`php artisan make:seed UserTableSeeder`

### Run DB seeder