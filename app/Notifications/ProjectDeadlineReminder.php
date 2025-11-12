<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectDeadlineReminder extends Notification
{
    use Queueable;
    protected $project;
    
    public function __construct($project)
    {
        $this->project = $project;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
{
    return (new MailMessage)
        ->subject('Reminder: Project "' . $this->project->name . '" deadline approaching')
        ->greeting('Hello ' . $notifiable->name . ',')
        ->line('This is a reminder that your project "' . $this->project->name . '" is due on ' . $this->project->date_of_end->format('Y-m-d') . '.')
        ->line('Please make sure everything is ready before the deadline.')
        ->action('View Project', url('./projects/' . $this->project->id))
        ->line('Thank you for using ProjectManagerV2!');
}

}
