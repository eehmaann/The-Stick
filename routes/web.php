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


Route::get('/', function () {
    return view('welcome');
});
Route::get('/workouts', 'WorkoutController@index')->middleware('auth');
Route::get('/workouts/create', 'WorkoutController@create')->middleware('auth');
Route::post('/workouts', 'WorkoutController@store')->middleware('auth');
Route::get('/workouts/{workdescription}', 'WorkoutController@show')->middleware('auth');
Route::get('/workouts/{id}/edit', 'WorkoutController@edit')->middleware('auth');
Route::put('/workouts/{id}', 'WorkoutController@update')->middleware('auth');
Route::get('/workouts/{id}/delete', 'WorkoutController@delete')->middleware('auth');
Route::delete('/workouts/{id}', 'WorkoutController@destroy')->middleware('auth');;

Route::get('/goals', 'GoalController@index');
Route::get('/goals/create', 'GoalController@create');
Route::post('/goals', 'GoalController@store');
Route::get('/goals/{description}', 'GoalController@show')->middleware('auth');
Route::get('/goals/{id}/edit', 'GoalController@edit')->middleware('auth');
Route::put('/goals/{id}', 'GoalController@update')->middleware('auth');
Route::get('/goals/{id}/qapla', 'GoalController@qapla')->middleware('auth');

Route::get('/areas/create', 'AreaController@create');
Route::post('/areas', 'AreaController@store');

Route::get('/conditions/create', 'ConditionController@create');
Route::post('/conditions', 'ConditionController@store');

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
Auth::routes();
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index');
