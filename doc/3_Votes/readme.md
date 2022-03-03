# Adding Votes

Incremental files can be found in this folder. Using these files best demonstrates incremental progress of this tutorial. Links below will redirect to the completed versions for the final app.

## Set Up the Routes
Add a route for the create vote form to web.php:

`Route::get('/vote/create', 'App\Http\Controllers\VoteController@index')->name('vote.create');`

We'll also need a route to handle the post data when we submit the form:

`Route::post('/vote/create', 'App\Http\Controllers\VoteController@store')->name('vote.store');`

You can verify these:
`sail artisan route:list --method=GET`

## Create the View

Ok, now we can hit http://localhost/vote/create we need a form to display. These go in Resources/Views/Auth. We'll make a new "vote" folder for all our vote related views. 

You'll find the [Create Vote blade file here](https://github.com/redmondmj/LaravelSnowDay2022/blob/main/resources/views/auth/vote/create.blade.php)!

## Add Controller and Model
Well... our Post is looking for a store function in our controller, but we don't even have a controller. Let's make one:

`sail artisan make:controller VoteController`

Update the controller as follows like this [HTTP/Controllers/VoteController.php](https://github.com/redmondmj/LaravelSnowDay2022/blob/main/app/Http/Controllers/VoteController.php) 

Adding a Model is just as easy:

`sail artisan make:model Vote` (actually we could have done both at once using the -M switch on the controller)

Add some fillable feilds to [app/Models/Vote.php](https://github.com/redmondmj/LaravelSnowDay2022/blob/main/app/Models/Vote.php)


## Database Migration

Amazing! Now we just need a table. To make that we need a migration file:

`sail artisan make:migration create_votes_table`

We define the fields by populating the [2022_02_24_172613_create_vote_table.php](https://github.com/redmondmj/LaravelSnowDay2022/blob/main/database/migrations/2022_02_24_172613_create_vote_table.php)

Like this:

``` 
    $table->bigIncrements('id');
    $table->integer('user_id')->nullable();
    $table->string('name')->nullable();
    $table->string('school')->nullable();
    $table->integer('vote');
    $table->timestamps();
```
Then just run the migration!

`sail artisan migrate`

## Next Up... Show Results!
