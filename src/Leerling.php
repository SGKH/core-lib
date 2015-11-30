<?php namespace Hofkens\CoreLib;

use Illuminate\Database\Eloquent\Model;

class Leerling extends Model
{
    protected $table = 'leerling';

    public function klas(){
        return $this->belongsTo('Hofkens\CoreLib\Klas');
    }
}
