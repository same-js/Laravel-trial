<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
class GetUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:user {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $email = $this->argument('email');
        $user = $this->getUser(email: $email);
        echo $user->name . "\n";
    }
    
    public function getUser(string $email): User
    {
        $result = User::select()
            ->where('email', 'LIKE', "%{$email}%")
            ->first();
        return $result ?? new User;
    }
}
