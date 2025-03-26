<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/auth/saml/login', function () {
    return Socialite::driver('saml2')->redirect();
})->name("saml.login");

Route::any('/auth/callback', function () {
    $saml = Socialite::driver('saml2')->user();

    $user = User::updateOrCreate([
        'email' => $saml->getEmail(),
    ], [
        'u_fname' => $saml->first_name,
        'u_lname' => $saml->last_name,
        'auth_type' => 'saml2',
        'password' => "thisisatest",
    ]);

    Auth::login($user);

    return redirect('/dashboard');
})->name("saml.callback");

Route::get('/auth/saml/metadata', function () {
    return Socialite::driver('saml2')->getServiceProviderMetadata();
})->name("saml.metadata");
