<?php

namespace App\Console\Commands;

use App\Models\Tasks;
use App\Mail\TaskDueTomorrow;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TaskDue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:due';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inform users that there tasks are dew.';

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
        $date = date('Y-m-d',strtotime("+1 day"));
        $tasks = Tasks::where('end_date',$date)->get();
        foreach($tasks as $t){
            Mail::to($t->user->email)->send(new TaskDueTomorrow($t));
        }
    }
}
