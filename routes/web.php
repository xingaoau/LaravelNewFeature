<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use App\User;

Route::get('/', function () {
    Family::sayhello();
});

Route::middleware(['auth', 'role'])->prefix('admin')->group(function() {
    Route::get('dashboard', function() {
        return 'admin page';
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function(Request $request) {
    $user = $request->user();

    $user->profile()->firstOrCreate(['user_id'=>$user->id], [
        'phone' => '12121212'
    ]);
});

Route::get('/test2', function(Request $request) {
    $profile = \App\Profile::find(1);
    dd($profile->user);
});

Route::get('/createPost', function(Request $request) {
   $user = $request->user();
   $user->posts()->createMany([
        ['title' => 'coding01'],
        ['title' => 'coding011']
   ]);
});

Route::get('/createComments', function(Faker $faker, Request $request) {
    $user = $request->user();

    $targets = collect([
        $user->posts()->create(['title' => 'dish washer']),
        $user->posts()->create(['title' => 'hope washer']),
        $user->video()->create(['name' => 'noodle']),
        $user->video()->create(['name' => 'dumpling']),
    ]);

    for($i=0; $i<10; $i++) {
        $target = $targets->random();
        \App\Comment::create([
            'body' => $faker->sentence,
            'target_id' => $target->id,
            'target_type' =>$target->getMorphClass(),
        ]);
    }
});

Route::get('/createHabit', function(Request $request) {
   $user = $request->user();
   $user->habits()->sync([1,2,3,4]);
});

Route::get('/createCountry', function(Request $request) {
   \App\Country::create(['title' => 'china']);
   \App\Country::create(['title' => 'usa']);
});

Route::get('/admin', 'AdminController@admin')->name('admin');

Route::resource('/posts', 'PostController');

Route::get('/sendEmail', function() {
    $users = User::all();
    foreach($users as $key => $user) {
        if ($key >5) break;
        dispatch(new \App\Jobs\EmailUserNewPost($user));
    }
});