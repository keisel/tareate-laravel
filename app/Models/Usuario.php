<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Model
{
    protected $table='users';

    protected $primarykey='id';

    protected $fillable= ['id','name','email','password','telefono','pago','tipo','descargas'];

    public function tarea()
    {
    	return $this->hasmany(Tarea::class);
    }
}
