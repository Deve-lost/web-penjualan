<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Barang extends Model
{
    protected $table = 'tbl_barang';
    protected $fillable = [
    						'kd_barang',
    						'nm_barang',
    						'kategori',
    						'jml_barang',
    						'harga'
    					];

}
