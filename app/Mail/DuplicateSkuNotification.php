<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DuplicateSkuNotification extends Mailable
{
    use Queueable, SerializesModels;

    use Queueable, SerializesModels;

    protected $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function build()
    {
        return $this->subject('Duplicate SKU Detected')
            ->markdown('emails.duplicate_sku', [
                'product' => $this->product,
            ]);
    }
}
