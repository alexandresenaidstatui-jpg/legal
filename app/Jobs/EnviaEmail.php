<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Usuario;
use App\Mail\BemVindoMail;

class EnviaEmail implements ShouldQueue
{
    use Queueable;
    public $usuario;

    /**
     * Create a new job instance.
     */
    public function __construct(Usuario $usuario)
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
