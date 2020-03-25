<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateSuperUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a super user for this portfolio website.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $credentials = [
            'name' => $this->ask(trans('auth.admin.create.name')),
            'email' => $this->ask(trans('auth.admin.create.email')),
            'password' => $this->secret(trans('auth.admin.create.password')),
            'password_confirmation' => $this->secret(trans('auth.admin.create.password_confirmation'))
        ];

        $validator = Validator::make($credentials, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:6|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/',
            'password_confirmation' => 'required|same:password'
        ]);

        if ($validator->fails()) {

            foreach ($validator->errors()->keys() as $key) {
                foreach ($validator->errors()->get($key) as $error) {
                    $this->error($error);
                }

                $credentials[$key] = ($key === 'password' || 'password_confirm') ? $this->secret(trans('auth.admin.create.' . $key)) : $this->ask(trans('auth.admin.create.' . $key));
            }
        }

        $credentials['password'] = bcrypt($credentials['password']);

        User::create($credentials);

        $this->info('Super user created.');
    }
}
