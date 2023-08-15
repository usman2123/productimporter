<?php

namespace App\Listeners;

use App\Events\ProductImported;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\DuplicateSkuNotification;
class DuplicateSkuListener
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

 

    public function handle(ProductImported $event)
    {
        // Check if SKU exists and send email if it does
        // Assuming the product data is stored in the event
        if (Product::where('sku', $event->product['sku'])->count() > 1) {
            Mail::to($event->user->email)->send(new DuplicateSkuNotification($event->product));
        }
    }
}
