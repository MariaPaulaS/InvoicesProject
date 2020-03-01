<?php

namespace App\Imports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\ToModel;

class InvoiceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $invoice = new Invoice([
            'title' => $row[0],
             'ref' => $row[1],
            'id_companies' => $row[2],
            'id_clients' => $row[3],
            'state' => 'Sin pagar'
        ]);

        $invoice->duedate = date("Y-m-d H:i:s", strtotime($invoice->created_at . "+ 30 days"));
        return $invoice;
    }
}
