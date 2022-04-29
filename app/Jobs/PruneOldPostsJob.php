<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Post;
use Carbon\Carbon;


class PruneOldPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $post;

    public function __construct(Post $post)
    {
        $this->post=$post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $dateOlderTwoYears=Carbon::now()->subYears(2)->toDateTimeString();
        $oldPosts=Post::where('created_at','<=',$dateOlderTwoYears)->delete();
        return $oldPosts;
    }
}
