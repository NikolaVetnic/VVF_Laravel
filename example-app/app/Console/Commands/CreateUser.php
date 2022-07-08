<?php

namespace App\Console\Commands;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createUser {email : User\'s email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user with a stated email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = new User();

        $user->email = $this->argument('email');
        $user->password = 'adMIN1234!';
        $user->first_name = fake()->firstName();
        $user->last_name = fake()->lastName();
        $user->company = fake()->company();
        $user->country = fake()->country();

        $user->save();
    }
}
