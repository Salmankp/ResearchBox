<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BuyedArticle extends Notification
{
    use Queueable;

        protected $follower_name;

        /**
         * Create a new notification instance.
         *
         * @return void
         */
        public function __construct($follower_name)
        {
            $this->buyed_article = $follower_name;
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
                'buyed_article' =>$this->buyed_article
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
