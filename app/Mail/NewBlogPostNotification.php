<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBlogPostNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function build()
    {
        $subscribers = $this->blog->categories->flatMap(function ($category) {
            return $category->subscribers;
        })->unique();

        return $this->view('emails.new-blog-post')
                    ->with([
                        'blog' => $this->blog,
                        'subscribers' => $subscribers,
                    ]);
    }
}
