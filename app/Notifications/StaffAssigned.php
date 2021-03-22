<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Process_Item;

class StaffAssigned extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     private $processitem;

    public function __construct(Process_Item $processitem)   //Data you want to pass. For example a Process_Items model can be passed here.
    {
        $this->processitem = $processitem;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)        //Channels through which you want to send notifications
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)     //The function to mail. As mentioned in the via method.
    // {
    //     $status = $this->processitem->status->type;
    //     $type = $this->processitem->form_type->type;

    //     return (new MailMessage)
    //                 ->subject('Your Request Has Been Placed')
    //                 ->line('Your request type is: '.$type )
    //                 ->action('Track Your Order From', url('/'))
    //                 ->line('Your request status is: '.$status )
    //                 ->line('Thank you for using our application!');
    // }

    public function toDatabase($notifiable)     //The function to database. As mentioned in the via method.
    {
        return [
            'id'     => $this->processitem->form_id,
            'type'   => $this->processitem->form_type->type,
            'requestor' => $this->processitem->created_by_user_id,
            'action' =>$this->processitem->status->type,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)    //The default notification
    {
        return [
            
        ];
    }
}
