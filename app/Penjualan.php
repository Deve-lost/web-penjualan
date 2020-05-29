<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'tbl_penjualan';
    protected $fillable = [
    						'nm_pelanggan',
    						'kd_barang',
    						'jml_beli',
    						'tgl_transaksi'
    					];
}
