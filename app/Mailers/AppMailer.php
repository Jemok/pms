<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 6/3/16
 * Time: 12:05 PM
 */

namespace App\Mailers;

use Illuminate\Support\Facades\Mail;
use App\User;


class AppMailer {

    /**
     * Email sender
     * @var
     */
    protected $from = 'karokijames40@gmail.com';

    /**
     * Email receiver
     * @var
     */
    protected $to;

    /**
     * Email view
     * @var
     */
    protected $view;

    /**
     * Email subject
     * @var
     */
    protected $subject;

    /**
     * Email data
     * @var
     */
    protected $data;


    /**
     * Send the email confirmation link
     * @param User $user
     */
    public  function sendConfirmEmailLink(User $user){

        $this->to = $user->email;
        $this->view = 'emails.confirm';
        $this->subject = "PMS confirm email";
        $this->data = compact('user');
        $this->deliver();

    }

    /**
     * Handle sending of actual email
     */
    public function deliver(){

        Mail::send($this->view, $this->data, function($message){

            $message->from($this->from, 'Bongo Afrika Admin')
                ->to($this->to)
                ->subject($this->subject);
        });
    }
} 