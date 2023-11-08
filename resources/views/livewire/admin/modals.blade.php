<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nueva Solicitud</h5>
                <button wire:click.prevent="cancel()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input type="text" id="name" wire:model="user.name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" wire:model="user.email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="tipo_p" class="form-label">Tipo De Persona</label>
                                <select id="tipo_p" wire:model="tipo_p" wire:change="opcionpersona"
                                    class="form-control">
                                    <option value="">Seleccione Una Opcion</option>
                                    <option value="natural">Persona Natural</option>
                                    <option value="juridica">Persona Juridica</option>
                                    <!-- Opciones para el select -->
                                </select>

                            </div>
                            @if ($tipo_p === 'juridica')
                                <div class="mb-3">
                                    <label for="nom_empresa" class="form-label">Nombre de la
                                        empresa:</label>
                                    <input type="text" id="nom_empresa" wire:model="nom_empresa"
                                        class="form-control"@if ($tipo_p === 'natural') style="display: none" @endif>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="dependencia_id" class="form-label">Dependencia:</label>
                                <select id="dependencia_id" wire:model="dependencia_id" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach ($dependencias as $id => $nombres)
                                        <option value="{{ $id }}">{{ $nombres }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($opciones)
                                <div class="mb-3">
                                    <label for="opcion_id" class="form-label">Opción:</label>
                                    <select id="opcion_id" wire:model="opcion_id" class="form-control">
                                        <option value="">Seleccionar</option>
                                        @foreach ($opciones as $id => $nombres)
                                            <option value="{{ $id }}">{{ $nombres }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            @endif


                            <div class="mb-3">
                                <label for="solicitud" class="form-label">Solicitud:</label>
                                <textarea id="solicitud" wire:model="solicitud" class="form-control"></textarea>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="iden" class="form-label">Identificación:</label>
                                <input type="number" id="iden" wire:model="user.iden" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Teléfono:</label>
                                <input type="number" id="tel" wire:model="user.tel" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="tipo_solicitud" class="form-label">Tipo de
                                    solicitud:</label>
                                <select id="tipo_solicitud" wire:model="tipo_solicitud" class="form-control">
                                    <option value="">Seleccionar</option>
                                    <option value="P">Peticion</option>
                                    <option value="Q">Quejas</option>
                                    <option value="R">Reclamos</option>
                                    <option value="S">Sugerencias</option>
                                    <option value="I">Informativas</option>
                                    <option value="D">Denuncias</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Metodo De Respuesta:</label>
                                <br>
                                <label for="metodo_correo" class="form-check-label">
                                    Correo:</label>
                                <input type="checkbox" id="metodo_correo" wire:model="metodo_correo"
                                    class="form-check-input" @if ($metodo_presencial) disabled @endif>

                                <label for="metodo_presencial" class="form-check-label">
                                    Presencial:</label>
                                <input type="checkbox" id="metodo_presencial" wire:model="metodo_presencial"
                                    class="form-check-input" @if ($metodo_correo) disabled @endif>


                            </div>
                            <div class="mb-3">
                                <label for="documento" class="form-label">Documento:</label>
                                <input type="file" id="documento" wire:model="documento" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="plazo_respuesta" class="form-label">Plazo de
                                    respuesta:</label>
                                <input type="text" id="plazo_respuesta" wire:model="plazo_respuesta"
                                    class="form-control">
                            </div>

                        </div>


                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                <button wire:click.prevent="register()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- modals editar -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Solicitud</h5>
                <button wire:click.prevent="cancel()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input type="text" id="name" wire:model="user.name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" wire:model="user.email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="tipo_p" class="form-label">Tipo De Persona</label>
                                <select id="tipo_p" wire:model="tipo_p" wire:change="opcionpersona"
                                    class="form-control">
                                    <option value="">Seleccione Una Opcion</option>
                                    <option value="natural">Persona Natural</option>
                                    <option value="juridica">Persona Juridica</option>
                                    <!-- Opciones para el select -->
                                </select>

                            </div>
                            @if ($tipo_p === 'juridica')
                                <div class="mb-3">
                                    <label for="nom_empresa" class="form-label">Nombre de la
                                        empresa:</label>
                                    <input type="text" id="nom_empresa" wire:model="nom_empresa"
                                        class="form-control"@if ($tipo_p === 'natural') style="display: none" @endif>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="dependencia_id" class="form-label">Dependencia:</label>
                                <select id="dependencia_id" wire:model="dependencia_id" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach ($dependencias as $id => $nombres)
                                        <option value="{{ $id }}">{{ $nombres }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($opciones)
                                <div class="mb-3">
                                    <label for="opcion_id" class="form-label">Opción:</label>
                                    <select id="opcion_id" wire:model="opcion_id" class="form-control">
                                        <option value="">Seleccionar</option>
                                        @foreach ($opciones as $id => $nombres)
                                            <option value="{{ $id }}">{{ $nombres }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            @endif


                            <div class="mb-3">
                                <label for="solicitud" class="form-label">Solicitud:</label>
                                <textarea id="solicitud" wire:model="solicitud" class="form-control"></textarea>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="iden" class="form-label">Identificación:</label>
                                <input type="number" id="iden" wire:model="user.iden" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Teléfono:</label>
                                <input type="number" id="tel" wire:model="user.tel" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="tipo_solicitud" class="form-label">Tipo de
                                    solicitud:</label>
                                <select id="tipo_solicitud" wire:model="tipo_solicitud" class="form-control">
                                    <option value="">Seleccionar</option>
                                    <option value="P">Peticion</option>
                                    <option value="Q">Quejas</option>
                                    <option value="R">Reclamos</option>
                                    <option value="S">Sugerencias</option>
                                    <option value="I">Informativas</option>
                                    <option value="D">Denuncias</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Metodo De Respuesta:</label>
                                <br>
                                <label for="metodo_correo" class="form-check-label">
                                    Correo:</label>
                                <input type="checkbox" id="metodo_correo" wire:model="metodo_correo"
                                    class="form-check-input" @if ($metodo_presencial) disabled @endif>

                                <label for="metodo_presencial" class="form-check-label">
                                    Presencial:</label>
                                <input type="checkbox" id="metodo_presencial" wire:model="metodo_presencial"
                                    class="form-check-input" @if ($metodo_correo) disabled @endif>


                            </div>
                            <div class="mb-3">
                                <label for="documento" class="form-label">Documento:</label>
                                <input type="file" id="documento" wire:model="documento" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="plazo_respuesta" class="form-label">Plazo de
                                    respuesta:</label>
                                <input type="text" id="plazo_respuesta" wire:model="plazo_respuesta"
                                    class="form-control">
                            </div>

                        </div>


                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-bs-dismiss="modal">Cerrar</button>
                <button wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
