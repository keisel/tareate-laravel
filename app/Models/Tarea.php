<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table='tarea';

    protected $primarykey='id';

    protected $fillable= ['id','idUsuario','titulo','descripcion','categoria','fechaEntrega','path','estado','precio'];

    protected $dates = ['created_at', 'updated_at', 'fecha'];

    public function setPathAttribute($path){
    	if(!empty($path))
    	{
    	$name = Carbon::now()->second.$path->getClientOriginalName();
    	$this->attributes['path'] = $name;
    	\Storage::disk('public')->put($name, \File::get($path));
    	}
    	
    }

    public function usuario()
    {
    	return $this->belongsto(Usuario::class);
    }
}
