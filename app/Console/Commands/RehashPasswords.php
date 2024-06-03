<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RehashPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rehash:passwords';

    protected $description = 'Rehash all passwords using the Bcrypt algorithm';
    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->password = Hash::make($user->password);
            $user->save();
        }

        $this->info('All passwords have been rehashed.');
    }
}
