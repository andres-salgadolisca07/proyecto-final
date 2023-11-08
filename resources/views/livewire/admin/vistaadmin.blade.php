<div>
    @section('title', __('Solicitudes'))
    <div class="container-fluid">
        <div class="solicitud justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <h4><i class="fab fa-laravel text-info"></i>
                                    Tabla de Solicitudes De PQRSID </h4>
                            </div>
                            <div>
                                <button wire:click="exportarExcel" class="btn btn-primary">Exportar a Excel</button>
                            </div>
                            @if (session()->has('message'))
                                <div wire:poll.4s class="btn btn-sm btn-success"
                                    style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
                            @endif
                            <div>
                                <input wire:model='buscador' type="text" class="form-control" name="search"
                                    id="search" placeholder="Buscar Solicitud">
                            </div>
                            <div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
                                <i class="fa fa-plus"></i> Agregar Solicitudes
                            </div>
                        </div>
                    </div>



                    <div class="card-body">
                        @include('livewire.admin.modals')
                        <div class="table-responsive table-lg">
                            <table class="table table-bordered table-sm">
                                <thead class="thead">
                                    <tr>

                                        <td>#</td>
                                        <th>Nombres</th>
                                        <th>Documento</th>
                                        <th>Correp</th>
                                        <th>Telefono</th>
                                        <th>tipo Persona</th>
                                        <th>Nombre Empresa</th>
                                        <th>Tipo De Solicitud</th>
                                        <th>Solicitud</th>
                                        <th>Documento</th>
                                        <th>Metodo De Respuesta</th>
                                        <th>Respuesta</th>
                                        <th>Plazo Respuesta</th>
                                        <th>Dependencia</th>
                                        <th>Opcion De Solicitud</th>
                                        <th>Estado Solicitud</th>

                                        <td>ACCIONES</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($solicitudes as $solicitu)
                                        <tr>
                                            <td>{{ $solicitu->id }}</td>
                                            <td>{{ $solicitu->name }}</td>
                                            <td>{{ $solicitu->iden }}</td>
                                            <td>{{ $solicitu->email }}</td>
                                            <td>{{ $solicitu->tel }}</td>
                                            <td>{{ $solicitu->tipo_p }}</td>
                                            <td>{{ $solicitu->nom_empresa }}</td>
                                            <td>{{ $solicitu->tipo_solicitud }}</td>
                                            <td>{{ $solicitu->solicitud }}</td>
                                            <td>{{ $solicitu->documento }}</td>
                                            <td>{{ $solicitu->metodo_repuesta }}</td>
                                            <td>{{ $solicitu->respuesta }}</td>
                                            <td>{{ $solicitu->plazo_respuesta }}</td>
                                            <td>{{ $solicitu->depe }}</td>
                                            <td>{{ $solicitu->opci }}</td>
                                            <td>{{ $solicitu->esta }}</td>
                                            <td width="90">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-secondary dropdown-toggle" href="#"
                                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Acciones
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                                                class="dropdown-item"
                                                                wire:click="edit({{ $solicitu->id }})"><i
                                                                    class="fa fa-edit"></i> Editar </a></li>
                                                        <li><a class="dropdown-item"
                                                                onclick="confirm('Confirmar Eliminar ID de solicitud {{ $solicitu->id }}? \n¡Las Solicitudes eliminadas no se pueden recuperar!\n Ademas eliminara la asignacion de esta solicitud')||event.stopImmediatePropagation()"
                                                                wire:click="destroy({{ $solicitu->id }})"><i
                                                                    class="fa fa-trash"></i> Borrar </a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">Datos no encontrados </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="float-end">{{ $solicitudes->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
