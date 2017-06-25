<?php

Auth::routes();
/*//this just so that I know which routes are being implemented by the previous call
        // Authentication Routes...
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $this->post('password/reset', 'Auth\ResetPasswordController@reset');
 */

Route::get('/', function(){return view('welcome');});

Route::get('/home', function(){return redirect('contacts');});

Route::get('/contacts', 'AddressBook\ContactController@listContacts')->name('contact_list');

Route::get('/contact/create', 'AddressBook\ContactController@createContact')->name('contact_create');

Route::get('/contact/{id}/edit', 'AddressBook\ContactController@editContact')->name('contact_edit');

Route::post('/contact/{id}/edit', 'AddressBook\ContactController@saveContact')->name('contact_save');

Route::delete('/contact/{id}/delete', 'AddressBook\ContactController@deleteContact')->name('contact_delete');