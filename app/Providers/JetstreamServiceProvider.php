<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use App\Http\Livewire\ApiTokenManager;
use App\Http\Livewire\CreateTeamForm;
use App\Http\Livewire\DeleteTeamForm;
use App\Http\Livewire\DeleteUserForm;
use App\Http\Livewire\LogoutOtherBrowserSessionsForm;
use App\Http\Livewire\NavigationDropdown;
use App\Http\Livewire\TeamMemberManager;
use App\Http\Livewire\TwoFactorAuthenticationForm;
use App\Http\Livewire\UpdatePasswordForm;
use App\Http\Livewire\UpdateProfileInformationForm;
use App\Http\Livewire\UpdateProfileInformationAccount;
use App\Http\Livewire\UpdateTeamNameForm;
use Livewire\Livewire;
use Laravel\Jetstream\Features;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
            if (config('jetstream.stack') === 'livewire' && class_exists(Livewire::class)) {
                Livewire::component('navigation-dropdown', NavigationDropdown::class);
                Livewire::component('profile.update-profile-information-form', UpdateProfileInformationForm::class);
                Livewire::component('profile.update-profile-information-account', UpdateProfileInformationAccount::class);
                Livewire::component('profile.update-password-form', UpdatePasswordForm::class);
                Livewire::component('profile.two-factor-authentication-form', TwoFactorAuthenticationForm::class);
                Livewire::component('profile.logout-other-browser-sessions-form', LogoutOtherBrowserSessionsForm::class);
                Livewire::component('profile.delete-user-form', DeleteUserForm::class);

                if (Features::hasApiFeatures()) {
                    Livewire::component('api.api-token-manager', ApiTokenManager::class);
                }

                if (Features::hasTeamFeatures()) {
                    Livewire::component('teams.create-team-form', CreateTeamForm::class);
                    Livewire::component('teams.update-team-name-form', UpdateTeamNameForm::class);
                    Livewire::component('teams.team-member-manager', TeamMemberManager::class);
                    Livewire::component('teams.delete-team-form', DeleteTeamForm::class);
                }
            }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
