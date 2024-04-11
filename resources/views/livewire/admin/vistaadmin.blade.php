<div>
    @section('title', __('Solicitudes'))
    <div class="container-fluid">
        <div class="solicitud justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4><i class="fab fa-laravel text-info"></i> Tabla de Solicitudes De PQRSID </h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <button wire:click="exportarExcel" class="btn btn-primary me-2">Exportar a Excel</button>
                                @if (session()->has('message'))
                                    <div wire:poll.4s class="btn btn-sm btn-success">{{ session('message') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <label for="fecha_inicio">Fecha Inicio:</label>
                                    <input type="date" id="fecha_inicio" wire:model="fecha_inicio" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="fecha_fin">Fecha Fin:</label>
                                    <input type="date" id="fecha_fin" wire:model="fecha_fin" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="filtro_tipo_solicitud">Tipo de Solicitud:</label>
                                    <select id="filtro_tipo_solicitud" wire:model="filtro_tipo_solicitud" class="form-control">
                                        <option value="">Seleccionar</option>
                                        <option value="P">Peticion</option>
                                        <option value="Q">Quejas</option>
                                        <option value="R">Reclamos</option>
                                        <option value="S">Sugerencias</option>
                                        <option value="I">Informativas</option>
                                        <option value="D">Denuncias</option>
                                        <option value="QU">Querella</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="filtro_dependencia_id">Dependencia:</label>
                                    <select id="filtro_dependencia_id" wire:model="filtro_dependencia_id" class="form-control">
                                        <option value="">Seleccionar</option>
                                        @foreach ($dependencias as $id => $nombre)
                                            <option value="{{ $id }}">{{ $nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2">
                                <!--<button type="submit" class="btn btn-primary">Filtrar</button>-->
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
                                    <i class="fa fa-plus"></i> Agregar Solicitudes
                                </button>
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
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Tipo de Persona</th>
                                        <th>Nombre Empresa</th>
                                        <th>Tipo De Solicitud</th>
                                        <th>Solicitud</th>
                                        <th>Archivo</th>
                                        <th>Método De Respuesta</th>
                                        <th>Respuesta</th>
                                        <th>Plazo Respuesta</th>
                                        <th>Dependencia</th>
                                        <th>Opción De Solicitud</th>
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
                                            <td>{{ $solicitu->metodo_respuesta }}</td>
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
