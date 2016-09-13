<?php

use App\Notifications\LessonPublished;
use App\Notifications\SubscriptionCancelled;
use App\Notifications\PaymentReceived;

Auth::loginUsingId(1);
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
	//$user = App\User::first();
	//$lesson = App\Lesson::first();

    //$user->notify(new LessonPublished($lesson));
    //return view('welcome');

    //Auth::user()->notify(new SubscriptionCancelled);
	$user = App\User::find(2);

    $admin = App\User::find(1);

    $admin->notify(new PaymentReceived($user));

});
