<div>
    <div
        style="position: relative; height: 100vh; background-image: url('/imagenes/alcaldia2.jpg'); background-size: cover; background-position: center; ">
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="col-sm-3 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="form">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link {{ $activeTab === 'signup' ? 'active' : '' }}"
                                            wire:click="setActiveTab('signup')" href="#signup">Regístrate</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $activeTab === 'login' ? 'active' : '' }}"
                                            wire:click="setActiveTab('login')" href="#login">Inicio de sesión</a>
                                    </li>
                                </ul>



                                <div class="tab-content">
                                    <div id="signup" class="tab-pane {{ $activeTab === 'signup' ? 'active' : '' }}">
                                        <div style="height: 600px;">
                                            <h1>Regístrate</h1>
                                            <form wire:submit.prevent="register">
                                                <div class="form-group">
                                                    <label for="name"> Nombre <span
                                                            class="text-danger">*</span></label>
                                                    <input wire:model="name" type="text" class="form-control"
                                                        id="name" required autocomplete="off">
                                                </div>



                                                <div class="form-group">
                                                    <label for="tipo_iden">Tipo De Identificación <span
                                                            class="text-danger">*</span></label>
                                                    <select wire:model="tipo_iden" class="form-control" id="tipo_iden">
                                                        <option value=""> Seleccione Una Opcion</option>
                                                        <option value="cedula">Cedula De Ciudadania</option>
                                                        <option value="cedulaextranjera">Cedula Extranjera</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="iden">Numero Identificación <span
                                                            class="text-danger">*</span></label>
                                                    <input wire:model="iden" type="number" class="form-control"
                                                        id="iden" required autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Correo Electronico <span
                                                            class="text-danger">*</span></label>
                                                    <input wire:model="email" type="email" class="form-control"
                                                        id="email" required autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tel">Teléfono<span
                                                            class="text-danger">*</span></label>
                                                    <input wire:model="tel" type="number" class="form-control"
                                                        id="tel" required autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="direccion">Dirección <span
                                                            class="text-danger">*</span></label>
                                                    <input wire:model="direccion" type="text" class="form-control"
                                                        id="direccion" required autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="genero">Género <span
                                                            class="text-danger">*</span></label>
                                                    <select wire:model="genero" class="form-control" id="genero">
                                                        <option value=""> Seleccione Una Opcion</option>
                                                        <option value="mujer">Femenino</option>
                                                        <option value="hombre">Masculino</option>
                                                        <option value="nose">Otro</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Contraseña<span
                                                            class="text-danger">*</span></label>
                                                    <input wire:model="password" type="password" class="form-control"
                                                        id="password" required autocomplete="off">
                                                </div>



                                                <button type="submit"
                                                    class="btn btn-primary btn-block">Registrarme</button>
                                            </form>
                                        </div>





                                    </div>



                                    <div id="login" class="tab-pane {{ $activeTab === 'login' ? 'active' : '' }}">

                                        <div style="height: 300px;">
                                            <h1>Bienvenidos al sistema de PQRS</h1>



                                            <form wire:submit.prevent="login">
                                                <div>
                                                    @if (session()->has('error'))
                                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Correo Electronico<span
                                                            class="text-danger">*</span></label>
                                                    <input wire:model="email" type="email" class="form-control"
                                                        id="email" required autocomplete="off">
                                                </div>



                                                <div class="form-group">
                                                    <label for="password">Contraseña<span
                                                            class="text-danger">*</span></label>
                                                    <input wire:model="password" type="password" class="form-control"
                                                        id="password" required autocomplete="off">
                                                </div>



                                                <p class="forgot"><a href="#">Olvido Su Contraseña?</a></p>



                                                <button type="submit" class="btn btn-primary btn-block">Iniciar
                                                    Sesión</button>
                                            </form>
                                        </div>

                                    </div>
                                </div><!-- tab-content -->
                            </div> <!-- /form -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
