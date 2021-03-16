<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupApplicationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'codefy:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for setup codefy application';

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
        $urlFortify = "vendor/laravel/fortify/src/Contracts/UpdatesUserProfileInformation.php";
        
        $fileFortify = file_get_contents($urlFortify);
        $replaceFortify = str_replace(
                          'public function update($user, array $input);',
                          'public function update($user, array $input, array $account);',
                          $fileFortify);
        
        file_put_contents($urlFortify, $replaceFortify);
        
        $dataJet = ['ApiTokenManager',
                    'CreateTeamForm',
                    'DeleteTeamForm',
                    'DeleteUserForm',
                    'LogoutOtherBrowserSessionsForm',
                    'NavigationMenu',
                    'TeamMemberManager',
                    'TwoFactorAuthenticationForm',
                    'UpdatePasswordForm',
                    'UpdateProfileInformationForm',
                    'UpdateTeamNameForm'];
        
        for ($i = 0; $i < 11; $i++) {
          $urlJet = "vendor/laravel/jetstream/src/JetstreamServiceProvider.php";
          $fileJet = file_get_contents($urlJet);
          
          $replaceJet = str_replace(
                        'use Laravel\Jetstream\Http\Livewire\\' . $dataJet[$i] . ';',
                        'use App\Http\Livewire\\' . $dataJet[$i] . ';',
                        $fileJet);
                            
          file_put_contents($urlJet, $replaceJet);
        }
        
        $this->info('Application Codefy Success Setup');
        
        return 0;
    }
}
