<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use Carbon\Carbon;

class SendProjectReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-project-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends email reminders for projects due in 3 days';


    public function handle()
{
    $targetDate = Carbon::today()->addDays(3);

    $projects = Project::whereDate('date_of_end', $targetDate->toDateString())->get();

    foreach ($projects as $project) {
        if ($project->user) {
            $project->user->notify(new \App\Notifications\ProjectDeadlineReminder($project));
        }
    }
}
}
