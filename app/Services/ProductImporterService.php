<?php

namespace App\Services;

use App\Events\ProductImported;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use App\Jobs\ProcessProductImport;

class ProductImporterService
{
    public function importFromCsv($csvFilePath)
    {
        $csvData = array_map('str_getcsv', file($csvFilePath));
        
        $chunks = array_chunk($csvData, 100);
        
        foreach ($chunks as $chunk) {
            ProcessProductImport::dispatch($this->transformProducts($chunk));
        }
    }
    
    protected function transformProducts($data)
    {
        // Transform CSV data into an array of products
        // Map CSV columns to database fields
        return array_map(function ($item) {
            return [
                'title' => $item[0],
                'description' => $item[1],
                'sku' => $item[2],
                'type' => $item[3],
                'cost_price' => 0.00, // Set your logic for cost price
                'status' => $item[4],
            ];
        }, $data);
    }
}