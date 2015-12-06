<?php namespace Hofkens\CoreLib;

use Illuminate\Database\Eloquent\Model;
use DB;

class Klas extends Model
{
    protected $table = 'klas';

    /**
     * Geef alle lln van deze klas terug
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leerlingen(){
        return $this->hasMany('Hofkens\CoreLib\Leerling');
    }

    /**
     * ? hoort dat in dit model thuis ?
     * @param array $klassen
     * @return array
     */
    public static function getLeerlingenUitKlassen(array $klassen){
        //querybuilder
        return DB::table('leerling')
                    ->join('klas','leerling.klas_id','=','klas.id')
                    ->whereIn('klas.code',$klassen)
                    ->select('leerling.*')
                    ->get();

        //ruwe query
        $klassenstr = implode("','",$klassen);
        $query = <<<SQL
          SELECT l.*
          FROM leerling as l
          JOIN klas as k
          ON l.klas_id = k.id
          WHERE k.code IN ('$klassenstr')
SQL;
        return DB::select($query);
    }
}
