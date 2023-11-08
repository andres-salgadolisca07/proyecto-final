<?php

namespace App\Http\Livewire;

use App\Models\Dependencia;
use App\Models\Estado;
use App\Models\Opcion;
use App\Models\Solicitud;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Formu extends Component
{
    use WithFileUploads;
public $opciones;
public $estados_id;
public $user,$tipo_p,$nom_empresa,$tipo_solicitud,$dependencia_id,$opcion_id,$metodo_respuesta,$solicitud,$metodo_correo=false,$metodo_presencial=false,$plazo_respuesta,$documento;
protected $rules = [ 'user.name' => 'required|string','user.iden' => 'required|number','user.email' => 'required|email','user.tel' => 'required|number' ];

public function mount(){
    $userid=Auth::id();
    $this->user=User::find($userid);
    $estados=Estado::all();

}
    public function render()
    {
        $dependencias = Dependencia::pluck('nombres', 'id');
        $this->opciones = Opcion::where('dependencia_id', $this->dependencia_id)->pluck('nombres', 'id');


        return view('livewire.formu',compact('dependencias'));
    }
    public function opcionpersona (){
        if ($this->tipo_p==='natural'){
            $this->nom_empresa='';
        }
    }
    public function register() {
        try {
            // Validar los datos ingresados
            $validator = Validator::make(['user'=> $this->user], [
                'user.name' => 'required',
                'user.email' => 'required|email',
                //'tipo_p' => 'required',
                //'nom_empresa' => 'required',
                //'dependencia_id' => 'required',
                //'opcion_id' => 'required',
                //'solicitud' => 'required',
                'user.iden' => 'required',
                'user.tel' => 'required',
                //'tipo_solicitud' => 'required',
            ]);
            // Verificar si la validación falla
            if ($validator->fails()) {
                // Capturar los errores de validación y mostrarlos si es necesario
                $errors = $validator->errors()->messages();
                dd($errors);
                return; }
                 // Acceder a los valores validados
                $nombre = $this->user['name'];
                $email = $this->user['email'];
                $tipo_p = $this->tipo_p;
                $nom_empresa = $this->nom_empresa;
                $dependencia_id = $this->dependencia_id;
                $opcion_id = $this->opcion_id;
                $soli = $this->solicitud;
                $iden = $this->user['iden'];
                $tel = $this->user['tel'];
                $tipo_solicitud = $this->tipo_solicitud;
                // Crear una nueva instancia del modelo Solicitud
                $solicitud = new Solicitud();
                $solicitud->name = $nombre;
                $solicitud->email = $email;
                $solicitud->tipo_p = $tipo_p;
                $solicitud->nom_empresa = $nom_empresa;
                $solicitud->dependencia_id = $dependencia_id;
                $solicitud->opcion_id = $opcion_id;
                $solicitud->solicitud = $soli;
                $solicitud->iden = $iden;
                $solicitud->tel = $tel;
                $solicitud->tipo_solicitud = $tipo_solicitud;
                $solicitud->metodo_respuesta = $this->metodo_respuesta;
                $solicitud->estados_id=1;
            // Guardar el modelo Solicitud en la base de datos
             //  dd($solicitud);
                $solicitud->save();
                $solicitud->makeHidden(['opcion', 'dependencia', 'estado']);
                // Convertir el modelo a JSON
                $solicitudJson = $solicitud->toJson();
             // Restablecer los valores del formulario
                //$this->resetform();
            // Mostrar un mensaje de éxito
                session()->flash('success', 'Registro exitoso.');
                }
                catch (ValidationException $e){
             // Capturar los errores de validación y mostrarlos si es necesario
                $errors = $e->validator->errors()->messages();
                dd($errors);
                return; } }

    private function reserform(){
        $this->solicitud='si hace algo';
    }





}
