<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\TaskCreated;
use App\Mail\TaskAssignedEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskAssigned implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        $user = User::find($event->task->user_id);

        Mail::to($user->email)->send(new TaskAssignedEmail($event->task));
    }
}
