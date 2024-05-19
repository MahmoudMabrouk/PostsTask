<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostsUsersToAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    public collection $users;

    public collection $blogs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dailyPosts, $dailyUsers)
    {
        $this->blogs = $dailyPosts;
        $this->users = $dailyUsers;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        $subject = 'Daily Report';
        return $this->subject($subject)
            ->markdown('admin.emails.mails.daily_report_users_posts');
    }

}
