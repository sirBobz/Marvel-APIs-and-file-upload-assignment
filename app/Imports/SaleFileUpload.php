<?php

namespace App\Imports;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Log;

class SaleFileUpload implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue, WithValidation
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new Sale([
            'InvoiceNo'   => $row['InvoiceNo'],
            'StockCode'   => $row['StockCode'],
            'Description' => $row['Description'],
            'Quantity'    => $row['Quantity'],
            'InvoiceDate' => $row['InvoiceDate'],
            'UnitPrice'   => $row['UnitPrice'],
            'CustomerID'  => $row['CustomerID'],
            'Country'     => $row['Country'],
        ]);
    }

    public function rules(): array
    {
        return [
            // '*.InvoiceNo' => 'required|string',
            // '*.StockCode' => 'required|string',
            // '*.Description' => 'required|string',
            // '*.Quantity' => 'required|string',
            // '*.InvoiceDate' => 'required|string',
            // '*.UnitPrice' => 'required|string',
            // '*.CustomerID' => 'required|string',
            // '*.Country' => 'required|string',
        ];
    }
    // Check the best config for your machine
    public function batchSize(): int
    {
        return 5000;
    }

    // Check the best config for your machine
    public function chunkSize(): int
    {
        return 10000;
    }
}
