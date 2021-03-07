<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FollowableSendNotifications extends Notification
{
    use Queueable;

    public $notifiable;

    public $type;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notifiable, $type)
    {
        $this->notifiable = $notifiable;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray()
    {
        return [
            'whoUser' => $this->notifiable,
            'type'    => $this->type
        ];
    }
}
