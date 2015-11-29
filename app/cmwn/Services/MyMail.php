<?php

namespace app\cmwn\Services;

use Illuminate\Support\Facades\Mail;

class MyMail
{
    public static function send($mailData)
    {
        Mail::send($mailData['template'], $mailData, function ($message) use ($mailData) {
            $message->from('admin@changemyworldnow.education', 'Jon Toshmatov');
            //$message->cc('jon@ginasink.com', 'Jon at Ginasink');
            $message->replyTo('admin@changemyworldnow.education', 'toshmatovus@gmail.com');
            $message->subject($mailData['subject']);
            $message->priority($mailData['priority']);
            $message->to($mailData['to']);
        });
    }
}
