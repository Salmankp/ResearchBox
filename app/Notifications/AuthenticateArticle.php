<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AuthenticateArticle extends Notification
{
    use Queueable;


        protected $researcher_name;

        /**
         * Create a new notification instance.
         *
         * @return void
         */
        public function __construct($researcher_name)
        {
            $this->authenticate_article = $researcher_name;
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
        public function toDatabase($notifiable)
        {

            return [
                'authenticate_article' =>$this->authenticate_article
            ];
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
