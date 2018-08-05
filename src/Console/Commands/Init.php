<?php

namespace Alive2212\LaravelParsianPayment\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class Init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parsian_payment:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To initialize laravel parsian payment';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        if (is_file(app_path('Jobs/ParsianPaymentConfirmedJob.php'))) {
            $content = file_get_contents(app_path('Jobs/ParsianPaymentConfirmedJob.php'));
            $search = "Alive2212\LaravelParsianPayment\Jobs";
            $replace = "App\Jobs";
            $content = str_replace($search, $replace, $content);
            file_put_contents(app_path('Jobs/ParsianPaymentConfirmedJob.php'), $content);
            echo PHP_EOL;
            echo 'namespace of ParsianPaymentConfirmedJob was changed';
            echo PHP_EOL;
        } else {
            echo PHP_EOL;
            echo 'Please run following';
            echo PHP_EOL;
            echo '    ';
            echo 'php artisan vendor:publish --tag laravel-parsian-payment.job';
            echo PHP_EOL;
        }
    }
}

