<x-app-layout>
    <div class="card mt-4" id="autores">


        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-end" v-on:click="crearUsuario()">
                Nuevo
            </button>
            <h2 class="text-center">Todos los autores</h2>
            <input type="text" class="form-control" placeholder="Buscar por nombre o apellidos" v-model="buscar">
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-1 p-lg-3" v-for="autor in filtroUsuarios">
                    <div class="card shadow">

                        <div class="card-header text-center">
                            <img src="{{ Storage::url('img.png') }}" width="70" height="70"
                                class="rounded-circle object-center object-cover" alt="">
                        </div>

                        <div class="card-body">
                            <h4>@{{ autor.nombre }} @{{ autor.apellidos }}</h4>

                            <p>
                                Libros asociados: 12
                            </p>

                        </div>

                        <div class="card-footer text-center">
                            <button class="btn btn-danger" v-on:click="editarUsuario(autor.id_autor)">
                                opciones
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Si no existen registros -->
                <h3 class="text-center my-4" v-show="filtroUsuarios[0] == null">No hay registros coincidentes</h3>

            </div>

        </div>

        <!-- Modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bienvenidos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="Nombre del usuario" v-model="nombre"
                            minlength="3">
                        <span class="text-danger text-sm fs-200"
                            v-show="validaciones.nombre != null">@{{ validaciones.nombre }}</span>

                        <input type="text" class="form-control mt-3" placeholder="Apellidos" v-model="apellidos"
                            minlength="3">
                        <span class="text-danger text-sm fs-200"
                            v-show="validaciones.apellidos != null">@{{ validaciones.apellidos }}</span>

                        <input type="text" class="form-control mt-3" placeholder="file" v-model="foto">
                    </div>
                    <div class="modal-footer">
                        <button type="btn btn-dark" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" v-show="id_autor === 0"
                            v-on:click="agregarUsuario()">Guadar</button>
                        <button type="button" class="btn btn-primary" v-show="id_autor != 0"
                            v-on:click="actualizarUsuario()">Actualizar</button>
                        <button type="button" class="btn btn-danger" v-show="id_autor != 0"
                            v-on:click="eliminarUsuario()">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Termina modal -->

    </div>


    @push('css')
        <style>
            .object-cover {
                object-fit: cover;
            }

            .object-center {
                object-position: center;
            }
        </style>
        <script src="{{ asset('assets/vue/vue.js') }}"></script>
        <script src="{{ asset('assets/vue/vue-resource.js') }}"></script>
    @endpush

    @push('js')
        <script src="{{ asset('assets/vue/autores.js') }}"></script>
    @endpush

</x-app-layout>
