# Display Vote Data
To do this we'll look at Laravel's Query Builder and how to pass data back to a view.

## Add a view
Create a new blade vote/results.blade.php. See above for code! 

> notice the @for or @foreach blade syntax

## Add a route to use it!
Add a route to web.php. This example used Query Builder to query the db directly in the routes function.

```php
//Display Vote Results
Route::get('/vote/results', function () {
    // TODO: Perhaps there is a more efficient way to handle this data?
    $data['votes'] = DB::table('votes')->get();
    
    //dd($data);
    //return $votes;
    return view('vote.results', ['data' => $data]);
});
```
> Test using `dd($data)` or `return $votes` but when we return the view notice we need to pass the data along too!

Hit the page directly to test /vote/results

> Notice this method totally circumvents the controller :grimacing:

## Update the controller
After we cast a vote we'll want to see the results. Normally we'd add to store@VoteController.php:
`return view('vote.results');`

BUT if we do that we never use the route and therefore don't get the data! So let's do a redirect instead:
`return redirect('/vote/results');`

## View Individual Votes
We populated the results table with some links in the blade. Go look! I'll wait.... Ok Let's wire em up... 

Create the view vote/single.blade.php (see above for code)

Now add to web.php:
```php
//Show individual vote
Route::get('/vote/show/{id}', function ($id) {

    $vote = DB::table('votes')->find($id);

   //dd($vote);

   return view('vote.single', ['vote' => $vote]);
});
```
> Notice the {id} placeholder in the url, we populate that with a specific id from the link using `function ($id)` and use it to query the DB!

> Then notice we pass the results on to the view using `['vote' => $vote]`

## Try Vue
Let's add a charts to display the totals. Let's do this with a Vue component!

First let's try Vue out with an example component.

Add to vote/results.php (wherever you'd like it to show up):
`<example-component></example-component>`

This component already exists in resources/components and is registered in /resources/js/app.js (See code in resources/js!)

## Add Visuals - Chart

Tally the votes! Add this to our results route in web.php
```php
$data['yesVotes'] = DB::table('votes')->where('vote', 1)->count('vote');
$data['noVotes'] = DB::table('votes')->where('vote', 0)->count('vote');
```

Create a new component resources/ChartComponent.vue (See code in resources/js!)

> Note the use of Props to store our data. You might find the vue devtools extension handy for chrome.

Register it in /resources/js/app.js:
`Vue.component('chart-component', require('./components/ChartComponent.vue').default);`

Add chart.js for results view
`npm install chart.js --save`

