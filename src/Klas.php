<?php namespace Hofkens\CoreLib;

use Illuminate\Database\Eloquent\Model;

class Klas extends Model
{
    protected $table = 'klas';

    public function leerlingen(){
        return $this->hasMany('Hofkens\CoreLib\Leerling');
    }
}
