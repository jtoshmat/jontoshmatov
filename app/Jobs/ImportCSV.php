<?php

namespace app\Jobs;

use app\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

//use Illuminate\Support\Facades\Mail;

use app\cmwn\Services\BulkImporter;
use Illuminate\Support\Facades\Log;

class ImportCSV extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    /**
     * Execute the job.
     *
     * @return void
     */
    protected $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function handle()
    {
        BulkImporter::$data = $this->data;
        return BulkImporter::migratecsv();
    }

    public function failed()
    {
        Log::info(__CLASS__." has failed with handling the queue request.");
    }
}
