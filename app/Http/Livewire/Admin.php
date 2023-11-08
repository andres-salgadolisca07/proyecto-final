<?php

namespace App\Http\Livewire;

use App\Models\Dependencia;
use App\Models\Opcion;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\ValidationException;

class Admin extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $estados_id,$buscador,$selected_id;
    public $user,$tipo_p,$nom_empresa,$tipo_solicitud,$dependencia_id,$opcion_id,$metodo_respuesta,$solicitud,$metodo_correo=false,$metodo_presencial=false,$plazo_respuesta,$documento;
    protected $rules = [ 'user.name' => 'required|string','user.iden' => 'required|number','user.email' => 'required|email','user.tel' => 'required|number' ];

    public $opciones;

    public function render()
    {
        $dependencias = Dependencia::pluck('nombres', 'id');
        $this->opciones = Opcion::where('dependencia_id', $this->dependencia_id)->pluck('nombres', 'id');

        $buscador='%'.$this->buscador .'%';
        $solicitudes=Solicitud::join('estados','estados.id','=','solicitudes.estados_id')
        ->join('dependencias','dependencias.id','=','solicitudes.dependencia_id')
        ->join('opciones','opciones.id','=','solicitudes.opcion_id')

        ->select('solicitudes.*','estados.nombre as esta','dependencias.nombres as depe','opciones.nombres as opci')
        ->where(function ($query)use($buscador){
            $query->where('solicitudes.name','LIKE',$buscador)
            ->orWhere('solicitudes.iden','LIKE',$buscador)
            ->orWhere('solicitudes.email','LIKE',$buscador)
            ->orWhere('solicitudes.tel','LIKE',$buscador)
            ->orWhere('solicitudes.tipo_p','LIKE',$buscador)
            ->orWhere('solicitudes.nom_empresa','LIKE',$buscador)
            ->orWhere('solicitudes.tipo_solicitud','LIKE',$buscador)
            ->orWhere('solicitudes.solicitud','LIKE',$buscador)
            ->orWhere('solicitudes.documento','LIKE',$buscador)
            ->orWhere('solicitudes.metodo_respuesta','LIKE',$buscador)
            ->orWhere('solicitudes.respuesta','LIKE',$buscador)
            ->orWhere('solicitudes.plazo_respuesta','LIKE',$buscador)
            ->orWhere('estados.nombre','LIKE',$buscador)
            ->orWhere('dependencias.nombres','LIKE',$buscador)
            ->orWhere('opciones.nombres','LIKE',$buscador);
        })->paginate(10);


        return view('livewire.admin.vistaadmin',['solicitudes'=>$solicitudes],compact('dependencias'));
    }
    public function register() {

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


                public function cancel()
                {
                    $this->resetInput();
                }

                private function resetInput() {
                $this->user['name']= null;
                $this->user['email'] = null;
                $this->tipo_p = null;
                $this->nom_empresa = null;
                $this->dependencia_id = null;
                $this->opcion_id = null;
                $this->solicitud = null;
                $this->user['iden']= null;
                $this->user['tel'] = null;
                $this->tipo_solicitud=null;
                }

                public function update()
    { try {
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
       // $file = $this->imagen->store('imagencel', 'archivos');
       if ($validator->fails()) {
        // Capturar los errores de validación y mostrarlos si es necesario
        $errors = $validator->errors()->messages();
        dd($errors);
        return; }
         // Acceder a los valores validados
        if ($this->selected_id) {
            $record = Solicitud::find($this->selected_id);
            $record->update([
                'name' => $this->user['name'],
                'email' => $this->user['email'],
                'tipo_p' => $this->tipo_p,
                'nom_empresa' => $this->nom_empresa,
                'dependencia_id' => $this->dependencia_id,
                'opcion_id' => $this->opcion_id,
                'metodo_respuesta' => $this->metodo_respuesta,
                'solicitud' => $this->solicitud,
                'iden' => $this->user['iden'],
                'tel '=> $this->user['tel'],
                'tipo_solicitud' => $this->tipo_solicitud,


            ]);


            $this->cancel();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Solicitud Actualizado exitosamente.');
        }
    } catch (\Throwable $th) {
        report($th);
    }

    }
    public function edit($id)
    {
        $record = Solicitud::findOrFail($id);
        $this->selected_id = $id;
        $this->user['name'] = $record-> name;
        $this->user['email'] = $record-> email ;
        $this->tipo_p = $record-> tipo_p;
        $this->nom_empresa = $record-> nom_empresa;
        $this->dependencia_id = $record->dependencia_id;
        $this->opcion_id = $record-> opcion_id ;
        $this->metodo_respuesta = $record-> metodo_respuesta;
        $this->solicitud= $record-> solicitud;
        $this->user['iden'] = $record-> iden;
        $this->user['tel'] = $record-> tel;
        $this->tipo_solicitud  = $record-> tipo_solicitud;

    }
    public function destroy($id)
    {
        if ($id) {
            Solicitud::where('id', $id)->delete();
        }
    }
   /*  public function exportarExcel()
    {
        return Excel::download(new SolicitudsExport(), 'solicituds.xlsx');
    } */
}
