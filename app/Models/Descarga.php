<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    protected $table='descarga';

    protected $primarykey='id';

    protected $fillable= ['id','titulo','categoria','path'];

    
}