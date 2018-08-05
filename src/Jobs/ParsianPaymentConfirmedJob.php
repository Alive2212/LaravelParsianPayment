<?php

namespace Alive2212\LaravelParsianPayment\Jobs;

use Alive2212\LaravelParsianPayment\AliveParsianPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class ParsianPaymentConfirmedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var
     */
    protected $payment;

    /**
     * Create a new job instance.
     * @param array $aliveParsianPayment
     */
    public function __construct(array $aliveParsianPayment)
    {
        $this->payment = $aliveParsianPayment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Log to check payments
        Log::info($this->payment);

        // Place your code
    }
}
