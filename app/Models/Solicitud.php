<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{

    use HasFactory;
    public $timestamps = true;
    public $table='solicitudes';
    public $fillable=['name','iden','email','tel','tipo_p','nom_empresa','tipo_solicitud','documento','metodo_respuesta','respuesta','plazo_respuesta','dependencia_id','opcion_id','estados_id'];

     /**

     * @return \Illuminate\Database\Eloquent\Relations\HasOne

     */
    public function opcion()
    {
        return $this->hasOne('App\Models\Opcion','id','opcion_id');
    }
/**

     * @return \Illuminate\Database\Eloquent\Relations\HasOne

     */
    public function dependencia()
    {
        return $this->hasOne('App\Models\Dependencia','id','dependencia_id');
    }

    /**

     * @return \Illuminate\Database\Eloquent\Relations\HasOne

     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado','id','estados_id');
    }



}
