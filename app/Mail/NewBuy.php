<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBuy extends Mailable
{
    use Queueable, SerializesModels;

    public $total;
    public $userName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName,$total)
    {
        $this->total = $total;
        $this->userName = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('euquefiz.e21@gmail.com', 'EuQueFiz - Nova Compra')
            ->subject('Compra Recebida')
            ->view('others.newBuy.newBuy');
    }
}
