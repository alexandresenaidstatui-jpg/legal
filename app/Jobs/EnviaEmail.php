<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\BemVindoMail;
use Illuminate\Support\Facades\Mail;
use App\Models\usuario;

class EnviaEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->usuario = $usuario;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->usuario->email)->send(new BemVindoMail($this->usuario));
    }
}
