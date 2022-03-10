## Use Roles to Restrict Access

## Define Roles
Add to AuthServiceProvider.php

```php
        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles('admin', 'author');
        });

        Gate::define('edit-users', function($user){
            return $user->hasRole('admin');
        });
        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });
```

## Update Routes
Add a prefix and assign middleware to routes in web.php

```php
// Add routes for User resource controller
// First we add an admin prefix and auth middleware to check for the role.
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function() {
    // Now we add the routes
    Route::resource('/users', 'UserController', ['except'=>['show', 'create', 'store']]);
});
```

## Fix Namespace
Add namespace to RouteServiceProvider.php
```php

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';
```
AND inseert the namespace into the web middlware group:
```php
            Route::middleware('web')
                ->namespace($this->namespace)  // add namespace!
                ->group(base_path('routes/web.php'));
        });
```

## Update Paths!
Obviously this breaks stuff... Update redirects in UserController.php the views!