<?php

namespace App\Exports;

use App\Penjualan;
use App\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penjualan::all();

    }

    public function map($penjualan): array
    {
        return [
            $penjualan->nm_pelanggan,
            $penjualan->kd_barang,
            $penjualan->jml_beli
            // Date::dateTimeToExcel($invoice->created_at),
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Pelanggan',
            'Kode Barang',
            'Jumlah Pembelian'
        ];
    }

}
