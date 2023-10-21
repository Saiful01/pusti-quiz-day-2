<?php

/*Route::redirect('/', '/login');*/

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;


Route::get('/', [Controller::class, 'home'])->name('home');
Route::get('/certificate', [Controller::class, 'certificate'])->name('certificate');
Route::get('/certificates/{value}', [Controller::class, 'urlRedirect'])->name('redirect.home');



Route::post('/quiz-save', [Controller::class, 'quizSave'])->name('quiz.save');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Applicant
    Route::delete('applicants/destroy', 'ApplicantController@massDestroy')->name('applicants.massDestroy');
    Route::post('applicants/media', 'ApplicantController@storeMedia')->name('applicants.storeMedia');
    Route::post('applicants/ckmedia', 'ApplicantController@storeCKEditorImages')->name('applicants.storeCKEditorImages');
    Route::resource('applicants', 'ApplicantController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::get('/clear-cache', function () {
    Artisan::call('optimize');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');

    return "Cache cleared successfully";
});
