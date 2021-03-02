<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DatabaseRefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh database rollback, migrate an seed';

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
     * @return int
     */
    public function handle()
    {
      $this->call('migrate:rollback');
      $this->call('migrate');
      $user = User::create(['name' => 'Anto Wiranto', 'email' => 'antow0808@gmail.com', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi']);
      $this->call('db:seed');
      
      $user->assignRole('administrator');
      return 0;
    }
}
