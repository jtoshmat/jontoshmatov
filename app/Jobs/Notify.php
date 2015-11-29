<?php

namespace app\Jobs;

use app\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
    
use app\cmwn\Services\Sms;
use app\cmwn\Services\MyMail;
use app\cmwn\Services\Notifier;

class Notify extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $notifier;
    
    public function __construct(Notifier $notifier)
    {
	    $this->notifier = $notifier;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
	    // if ($this->data['mailType']=='sms'){
		   //  return Sms::send($this->data);
	    // }

	   	MyMail::send($this->notifier->data);
    }

    public function failed()
    {

    }
}