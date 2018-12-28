<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Order;
class CheckOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check orders what were not finished';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set('Europe/Moscow');

        $currentDate = date('Y-m-d H:i:s');

        Order::where('date_of_the_travel', '<', $currentDate)
            ->where('license_number', '=', NULL)
            ->update(['is_cancelled' => true]);
    }
}
