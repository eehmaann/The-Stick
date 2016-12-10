<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::resource('workouts', 'WorkoutController');
//Route::resource('goals', 'GoalController');
Route::resource('condition', 'ConditionController');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/workouts', 'WorkoutController@index');
Route::get('/workouts/create', 'WorkoutController@create');
Route::post('/workouts', 'WorkoutController@store');
Route::get('/workouts/{workdescription}', 'WorkoutController@show');
Route::get('/workouts/{id}/edit', 'WorkoutController@edit');
Route::put('/workouts/{id}', 'WorkoutController@update');
Route::get('/workouts/{id}/delete', 'WorkoutController@delete');
Route::delete('/workouts/{id}', 'WorkoutController@destroy');

Route::get('/goals', 'GoalController@index');
Route::get('/goals/create', 'GoalController@create');
Route::post('/goals', 'GoalController@store');

Route::get('/goals/{description}', 'GoalController@show');
Route::get('/goals/{id}/edit', 'GoalController@edit');
Route::put('/goals/{id}', 'GoalController@update');
Route::get('/goals/{id}/qapla', 'GoalController@qapla');

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database foobooks');
        DB::statement('CREATE database foobooks');

        return 'Dropped foobooks; created foobooks.';
    });

};