<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserWithPrompt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createUserWithPrompt';

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
        $email = $this->ask('Email');
        $password = $this->ask('Password');
        $firstName = $this->ask('First Name');
        $lastName = $this->ask('First Name');
        $company = $this->ask("Company");
        $country = $this->ask("Country");

        $user = new User();

        $user->email = $email;
        $user->password = $password;
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->company = $company;
        $user->country = $country;

        $user->save();
    }
}
