<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
   protected $table='categoria';

    protected $primarykey='id_categoria';

    protected $fillable= ['nombre'];
}
