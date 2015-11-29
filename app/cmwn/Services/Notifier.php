<?php

namespace app\cmwn\Services;

use app\Jobs\Notify;
use Illuminate\Foundation\Bus\DispatchesJobs;

class Notifier
{
    use DispatchesJobs;

    public $data = [];
    public $from = 'admin@changemyworldnow.education';
    public $template = 'email';
    public $subject = 'Default email template';
    public $priority = 'Normal';
    public $mailType = 'email';

    public function prepData()
    {
        $this->data['to'] = $this->to;
        $this->data['subject'] = $this->subject;
        $this->data['priority'] = $this->priority;
        $this->data['template'] = $this->template;
    }

    public function send()
    {
        $this->prepData();
        $this->dispatch(new Notify($this));
    }

    public function attachData(array $data)
    {
        $this->data = array_merge($this->data, $data);
    }
}
