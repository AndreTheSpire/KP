<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifikasiiPenerimaan extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($param,$param2,)
    {
        $this->pengguna=$param;
        $this->status=$param2;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
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
        if($this->status==true){
            return (new MailMessage)
                    ->greeting('Halo '.$this->pengguna->pengguna_nama)
                    ->line('anda berhasil diterima di tempat les zeta kami ')
                    ->line('dimohon kerja samanya selama bekerja di kami  ');
        }else{
            return (new MailMessage)
                    ->greeting('Halo '.$this->pengguna->pengguna_nama)
                    ->line('mohon maaf anda kami anggap kurang mencukupi untuk menjadi guru di tempat kami ')
                    ->line('semoga beruntung lain kali ');
        }
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
