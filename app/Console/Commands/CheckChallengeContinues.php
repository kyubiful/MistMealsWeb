<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CheckChallengeContinues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:challenges';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if users are continuing with his challenges';

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

        // $today = Carbon::parse()->next('monday')->addDays(8);
        $today = Carbon::today();
        $users = User::all()->whereNotNull('challenge_update');

        foreach($users as $user) {

            $user_challenge_update_date = Carbon::parse($user->challenge_update);

            if($today > $user_challenge_update_date) {

                $user->challenge_week = 0;
                $user->challenge_update = null;
                $user->save();

            }
        } 

        $text = "[". date('Y-m-d H:i:s') ."]: Cron reinicio de retos lanzado";
        Storage::append("cron-status.txt", $text);

    }
}
