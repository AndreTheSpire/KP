<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifikasiWawancara extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($param,$param2,$param3)
    {
        $this->pengguna=$param;
        $this->link=$param2;
        $this->status=$param3;
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
                    ->line('anda berhasil diterima untuk diwawancari berikut adalah link wawancara: '.$this->link)
                    ->line('semoga anda datang wawancara tepat waktu  ');
        }else{
            return (new MailMessage)
                    ->greeting('Halo '.$this->pengguna->pengguna_nama)
                    ->line('mohon maaf anda kami anggap kurang mencukupi untuk menjadi guru di tempat kami ')
                    ->line('semoga beruntung lain kali ');
        }

                    // ->markdown('mail.welcome.index', ['user' => $this->user]);
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
