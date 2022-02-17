## Setup database
 - edit .env as follows:
    - `DB_CONNECTION=sqlite`
 - create file database\database.sqlite
 - Before we migrate, let’s catch one bug before it throws an error, go to App/Providers/AppServiceProvider.php
and add `Schema::defaultstringLength(191);` to the boot function, also add `use Illuminate\Support\Facades\Schema;` to the top.

## Building this Demo App

### Add Auth
`composer require laravel/ui`
`php artisan ui vue --auth`

### Edit Registration form as needed, i.e.:
`\resources\views\auth\register.blade.php`
`\app\Http\Controllers\Auth\RegisterController.php`
`\app\User.php`
`\database\migrations\2014_10_12_000000_create_users_table.php`

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