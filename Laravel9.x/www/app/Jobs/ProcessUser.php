<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\User;
use App\Mail\ProcessUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class ProcessUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private readonly string $to;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->to = 'operation@example.com';
    }

    /**
     * Execute the job.
     * ユーザの登録と、完了通知メールを送信する
     * @return void
     */
    public function handle()
    {
        User::create(
            [
                'name' => 'Queue Job',
                'email' => 'queue+'. (User::max('id')+1). '@email.com',
                'password' => Hash::make('secret'),
            ]
        );
        Mail::to($this->to)->send(new ProcessUserMail);
    }
}
