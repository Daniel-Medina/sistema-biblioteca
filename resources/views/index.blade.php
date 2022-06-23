<x-app-layout>
    <div class="card mt-4" id="autores">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" v-on:click="agregarUsuario()">
            Nuevo
        </button>

        <div class="card-header">
            <h2 class="text-center">Todos los autores</h2>
            <input type="text" class="form-control">
        </div>

        <div class="card-body">
            <div class="row">

                @forelse ($autores as $autor)
                    <div class="card col-md-3">
                        <div class="card-header text-center">
                            <img src="{{ Storage::url('utc.jpg') }}" width="70" height="70"
                                class=" rounded-circle" alt="">
                        </div>

                        <div class="card-body">
                            <h4>{{ $autor->apellidos . ' ' . $autor->nombre }}</h4>

                            <p>
                                Libros asociados: {{ rand(1, 10) }}
                            </p>

                        </div>

                        <div class="card-footer text-center">
                            <button type="button" class="btn btn-danger" v-on:click="editarUsuario()">
                                opciones
                            </button>
                        </div>
                    </div>

                @empty
                @endforelse

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
                        <input type="text" class="form-control" placeholder="Nombre del usuario"
                            v-model="nombre"><br>
                        <input type="text" class="form-control" placeholder="Apellidos"
                            v-model="apellidos"><br>
                        <input type="text" class="form-control" placeholder="file"
                            v-model="foto"><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background:lime" class="btn btn-secondary"
                            data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                       
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
