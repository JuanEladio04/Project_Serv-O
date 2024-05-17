<?php

namespace App\Jobs;

use App\Events\PingPerformed;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PerformPing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $server_dir;

    /**
     * Create a new job instance.
     */
    public function __construct(string $server_dir)
    {
        $this->server_dir = $server_dir;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            exec("ping -c 5 $this->server_dir", $output, $result);

            if ($result == 0) {
                PingPerformed::dispatch(true, $this->server_dir);
            } else {
                PingPerformed::dispatch(false, $this->server_dir);
            }
        } catch (\Throwable $th) {
            PingPerformed::dispatch(false, $this->server_dir);
        }
    }
}
