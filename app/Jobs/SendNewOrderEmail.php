<?php

namespace App\Jobs;

use App\Mail\NewBuy;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewOrderEmail
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userName;
    public $total;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userName, $total)
    {
        $this->userName = $userName;
        $this->total = $total;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new NewBuy($this->userName, $this->total);

        $euQueFizEmail = (object)['email' => 'euquefiz.e21@gmail.com', 'name' => 'Nova Compra'];

        Mail::to($euQueFizEmail)->send($email);
    }
}
