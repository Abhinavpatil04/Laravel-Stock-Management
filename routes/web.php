<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Library\AjaxController;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('library.home')->with('status', session('status'));
    }

    return redirect()->route('library.home');
});

Route::get('/library/transactions/getBookDetails/{id}',[AjaxController::class, 'getBookDetails']);
Route::get('/library/transactions/getmemberDetails/{id}',[AjaxController::class, 'getmemberDetails']);
Route::get('/library/transactions/getRfidTag/{id}',[AjaxController::class, 'getRfidTag']);
Route::get('/library/transactions/getmember/{id}',[AjaxController::class, 'getMember']);
Auth::routes();
// Library


Route::group(['prefix' => 'library', 'as' => 'library.', 'namespace' => 'Library', 'middleware' => ['auth']], function () {
    Route::redirect('/', '/login')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Assets
    Route::delete('assets/destroy', 'AssetsController@massDestroy')->name('assets.massDestroy');
    Route::resource('assets', 'AssetsController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Stocks
    Route::delete('stocks/destroy', 'StocksController@massDestroy')->name('stocks.massDestroy');
    Route::resource('stocks', 'StocksController');

    //
    Route::resource('dashboard', 'DashboardController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::post('transactions/{stock}/storeStock', 'TransactionsController@storeStock')->name('transactions.storeStock');
    Route::resource('transactions', 'TransactionsController');

});

//register
Route::post('registration', 'RegisterController@index')->name('registration.register');
//Route::get('registration', 'RegisterController@index')->name('registration.register');
Route::get('/Register',[RegisterController::class, 'index'])->name('registration.register');

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }

});
