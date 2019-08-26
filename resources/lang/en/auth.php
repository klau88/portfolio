<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    'admin' => [
        'create' => [
            'name' => 'What is your name?',
            'email' => 'What is your email address?',
            'password' => 'What is your password? The password must be at least 6 characters long and contain at least one capital letter and a digit.',
            'password_confirmation' => 'Confirm password:'
        ],
        'login' => [
            'name' => 'Name',
            'password' => 'Password',
            'submit' => 'Log in'
        ],
        'logout' => 'Log out'
    ]
];
