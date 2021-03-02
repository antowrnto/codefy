<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        switch ($user->roles[0]->name) {
          case 'mentor':
            for ($cm = 0; $cm < $user->courseMentors->count(); $cm++) {
                for ($e = 0; $e < $user->courseMentors[$cm]->episodes->count(); $e++) {
                  $user->courseMentors[$cm]->episodes[$e]->delete();
                  
                }
              $user->courseMentors[$cm]->delete();
            }
            break;
            
          case 'student':
            foreach ($user->courses as $course) {
              $course->students()->detach($user->id);
            }
            break;
        }
        $user->removeRole($user->roles[0]->name);
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
