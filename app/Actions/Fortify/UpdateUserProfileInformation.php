<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @param  array  $account
     * @return void
     */
    public function update($user, array $input, array $account)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input, $account);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
            $user->account->forceFill([
                'username' => $account['username'],
                'school' => $account['school'],
                'bio' => $account['bio'],
                'birth_day' => $account['birth_day'],
                'city' => $account['city'],
                'link_twitter' => $account['link_twitter'],
                'link_facebook' => $account['link_facebook'],
                'link_instagram' => $account['link_instagram'],
                'link_linkedin' => $account['link_linkedin'],
                'language' => $account['language'],
                'role' => $account['role'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();
        
        $user->account->forceFill([
                'username' => $account['username'],
                'school' => $account['school'],
                'bio' => $account['bio'],
                'birth_day' => $account['birth_day'],
                'city' => $account['city'],
                'link_twitter' => $account['link_twitter'],
                'link_facebook' => $account['link_facebook'],
                'link_instagram' => $account['link_instagram'],
                'link_linkedin' => $account['link_linkedin'],
                'language' => $account['language'],
                'role' => $account['role'],
            ])->save();

        $user->sendEmailVerificationNotification();
    }
}
