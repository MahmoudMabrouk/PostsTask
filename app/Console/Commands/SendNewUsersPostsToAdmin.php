<?php

namespace App\Console\Commands;

use App\Domain\Services\PostService;
use App\Domain\Services\UserService;
use App\Mail\NewPostsUsersToAdminEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewUsersPostsToAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-new-users-posts-to-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send new users and posts to admin by email';

    private PostService $postService;
    private UserService $userService;

    public function __construct(UserService $userService, PostService $postService)
    {
        parent::__construct();
        $this->postService = $postService;
        $this->userService = $userService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date       = now();//->format('Y-m-d');
//        dd($date);
        $dailyUsers = $this->userService->getUsersByDate($date);
        $dailyPosts = $this->postService->getPostsByDate($date);
        $admin      = $this->userService->findAdmin();

        if ($admin){
            $daily_email = new NewPostsUsersToAdminEmail($dailyPosts, $dailyUsers);
            Mail::to($admin->email)->send($daily_email);
        }
    }
}
