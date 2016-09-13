<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class PaymentReceived extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

   public function toSlack($notifiable)
   {
        return (new SlackMessage)
            ->success()
            ->content('Money Recived!')
            
            ->attachment(function ($attachment) {
                $attachment->title('payment', url('/payments/1'))
                    ->fields([
                        'Amount' =>'£9.00',
                        'From'   => $this->user->name
                    ])
            });
   }
   
}
