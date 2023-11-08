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
use PhpParser\Node\Stmt\TryCatch;

class Formulario extends Component
{
    use WithFileUploads;
public $opciones;
public $estados_id;
public $user,$name, $iden, $email,$tel,$tipo_p,$nom_empresa,$tipo_solicitud,$dependencia_id,$opcion_id,$metodo_respuesta,$solicitud,$metodo_correo=false,$metodo_presencial=false,$plazo_respuesta,$documento;
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


        return view('livewire.formulario',compact('dependencias'));
    }
    public function opcionpersona (){
        if ($this->tipo_p==='natural'){
            $this->nom_empresa='';
        }
    }
    public function enviar(){
        try {
            $validatedData = $this->validate([
                'user.name'=>'required',
                'user.email'=>'required|email',
                'tipo_p'=>'required',
                'nom_empresa'=>'required',
                'dependencia_id'=>'required',
                'opcion_id'=>'required',
                'solicitud'=>'required',
                'user.iden'=>'required',
                'user.tel'=>'required',
                'tipo_solicitud'=>'required',
                //'documento'=>'required',


            ]);
            $soli=new Solicitud ();
            $soli->name=$this->name;
             $soli->iden=$this->iden;
            $soli->email=$this->email;
            $soli->tel=$this->tel;
            $soli->tipo_p=$this->tipo_p;
            $soli->nom_empresa=$this->nom_empresa;
            $soli->tipo_solicitud=$this->tipo_solicitud;
            $soli->dependencia_id=$this->dependencia_id;
            $soli->opcion_id=$this->opcion_id;
            $soli->metodo_respuesta=$this->metodo_respuesta;
            $soli->solicitud=$this->solicitud;
            //$soli->documento=$this->documento;

            $soli->save();

        } catch (\Throwable $th) {
            report($th);
        }

    }





}



