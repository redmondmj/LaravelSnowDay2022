# Add User Management

## Create new controller and model for Usermanagement

`sail artisan make:controller \\Admin\\UserController --resource --model=User`
    * -r means this will be a ["Resource Controller"](https://laravel.com/docs/9.x/controllers#resource-controllers) and it will get all the typical "CRUD" routes automatically. 
    * Remove unwanted methods (show, create, store)

## Add routes as "resources" for new controller to web.php
```php
// Add routes for User resource controller
Route::resource('/users', 'App\Http\Controllers\Admin\UserController', ['except'=>['show', 'create', 'store']])
```

Check the routes!

`sail artisan route:list`

## Edit the controller
First we need the Role model, add to top:
```php
use App\Models\Role;
```

For index()
```php
$users = User::all();
return view('admin.users.index')->with('users', $users);
```
For edit(User $user)
```php
//this gets the users roles
$roles = Role::all();
return view('admin.users.edit')->with([
    'user' => $user,
    'roles'=> $roles
]);

return redirect()->route('admin.users.index');
```

## Add User Management link 
Add to app.blade.php inside the existing dropdown:

```php
{{-- Added User Management Link --}}
    <!-- TODO: Should we show this link to everyone? Or should we use an auth gate?-->
    <a href="{{ route('users.index') }}" class="dropdown-item">
        User Management
    </a>
```

## Create a Role model for assigning roles
`sail artisan make:model Role -m`
> -m will create a migration at the same time

Add feild to migration file:
```php
$table->string('name');
```
Add another table to handle the association of roles and users:

`sail artisan make:migration create_role_user_table`
> this will simply keep track of which users are assigned are assigned which roles, add fields as needed

Add feild to migration file:
```php
$table->integer('role_id')->unassigned();
$table->integer('user_id')->unassigned();
```
Update your Database!

`sail artisan migrate`

create relationships in Role.php model
```php
public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
```
Create relationships in User.php model
```php
public function roles()
{
    return $this->belongsToMany('App\Models\Role');
}

public function hasAnyRoles($roles)
{
    if ($this->roles()->where('name', $roles)->first()) 
    {
        return true;
    }
    return false;
}
public function hasRole($role)
{
    if ($this->roles()->where('name', $role)->first()) 
    {
        return true;
    }
    return false;
}
```


## Add view for user management index.blade.php
> Note: the routes for our edit and delete buttons

>ID must be passed in for the current user.



## Create DB seeder
`sail artisan make:seed RolesTableSeeder`

And add it to DatabaseSeeder.php
```php
$this->call(RolesTableSeeder::class);
```


## Run DB seeder
`sail artisan migrate:fresh`