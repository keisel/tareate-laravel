<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SubirTarea extends Model
{
    protected $table='subirtarea';

    protected $primarykey='id';

    protected $fillable= ['id','titulo','categoria','path'];

    public function setPathAttribute($path){
        if(!empty($path))
        {
        $name = Carbon::now()->second.$path->getClientOriginalName();
        $this->attributes['path'] = $name;
        \Storage::disk('new')->put($name, \File::get($path));
        }
        
    }
}
