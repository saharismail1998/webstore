<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class newOrderNotifcation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
    // mail ,database,broadcast,nexmo(sms),slack
    /*
    $via=['database'];
    if($notifiable->notify_mail){
      $via[]= ['mail'];
    }

    if($notifiable->notify_nexmo){
        $via[]= [''];
      }
      return $via;
    }*/
    return ['mail'];
    }

   
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('New order')
        //->greeting('Hello,',.$notifiable->name)// username as database
                    ->line('notification to new order')
                    ->from('notifay@localhost','Maan Billing')
                   ->action('Notification Action', url('/'))
                    ->line('Thank you ');
                   // ->view('malis.new-order',[
                     //   'name'=>($notifiable->name ?? ''),
                       // 'url'=>url('/'),
                    //]);
                   
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
