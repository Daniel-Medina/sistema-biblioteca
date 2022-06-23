<x-app-layout>
    <div class="card mt-4" id="autores">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" v-on:click="crearUsuario()">
            Nuevo
        </button>

        <div class="card-header">
            <h2 class="text-center">Todos los autores</h2>
            <input type="text" class="form-control">
        </div>

        <div class="card-body">
            <div class="row">

                <div class="card col-md-3" v-for="autor in autores">
                    <div class="card-header text-center">
                        <img src="http://dispositivo.test/storage/default.png" width="70" height="70"
                            class=" rounded-circle" alt="">
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
                        <input type="text" class="form-control" placeholder="Nombre del usuario" v-model="nombre"><br>
                        <input type="text" class="form-control" placeholder="Apellidos" v-model="apellidos"><br>
                        <input type="text" class="form-control" placeholder="file" v-model="foto"><br>
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
        <script src="{{ asset('assets/vue/vue.js') }}"></script>
        <script src="{{ asset('assets/vue/vue-resource.js') }}"></script>
    @endpush

    @push('js')
        <script src="{{ asset('assets/vue/autores.js') }}"></script>
    @endpush

</x-app-layout>
