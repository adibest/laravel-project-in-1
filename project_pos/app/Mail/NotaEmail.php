<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\OrderDetail;

class NotaEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order_details = OrderDetail::all();
        return $this->from('ahmadjayadibya@gmail.com')
                    ->view('orders.print', compact('order_details'));
                    // ->with(
                    // [
                    //     'nama' => 'Diki Alfarabi Hadi',
                    //     'website' => 'www.malasngoding.com',
                    // ]);
    }
}
