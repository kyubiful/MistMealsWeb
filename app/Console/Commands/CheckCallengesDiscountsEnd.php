<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DiscountCode;
use Carbon\Carbon;

class CheckCallengesDiscountsEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:discounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if any discount end';

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
     * @return int
     */
    public function handle()
    {
        $discounts = DiscountCode::all();
        $today = Carbon::today();

        foreach($discounts as $discount) {

            $discount_code_end_date = Carbon::parse($discount->end);

            if($today > $discount_code_end_date) {
                $discount->delete();
            }
        }
    }
}
