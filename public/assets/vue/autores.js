var host = window.location.hostname;

if (host == '127.0.0.1') {
    host = host + ":8000";
}

var url = "http://" + host + "/api/autores";

new Vue({

    el: "#autores",

    data: {
        id_autor: 0,
        nombre: '',
        apellidos: '',
        foto: '',
        buscar: '',
        autores: [],
        validaciones: new Object,
    },

    created() {
        //Al crearse el componente
        this.listarUsuarios();
    },

    methods: {

        modal: function (action) {
            $("#exampleModal").modal(action);
        },

        resetUi: function () {
            this.validaciones = new Object,
            this.nombre = "";
            this.apellidos = "";
            this.id_autor = 0;
        },

        //Validar
        validar: function () {

            //Se debe regresar un true o un false
            this.validaciones = new Object;

            //Validar el nombre
            if (!this.nombre) {
                //Si esta vacio
                this.validaciones['nombre'] = 'El nombre no puede ser nulo';
            } else if (this.nombre.length < 3) {
                this.validaciones['nombre'] = 'El nombre debe tener al menos 3 caracteres';
            }

            //Validar los apellidos
            if (!this.apellidos) {
                //Si esta vacio
                this.validaciones['apellidos'] = 'Los apellidos no puede ser nulo';
            } else if (this.apellidos.length < 3) {
                this.validaciones['apellidos'] = 'Los apellidos debe tener al menos 3 caracteres';
            }


            if (this.validaciones.nombre || this.validaciones.apellidos) {
                //True si existe algun error
                return true;
            } else {
                //false si todos los campos son correctos
                return false;
            }
        }, //Fin de validar

        listarUsuarios: function () {
            this.$http.get(url).then(function (json) {
                this.autores = json.data;
            }).catch(function (json) {
                console.log(json);
            });
        },

        crearUsuario: function () {
            this.resetUi();
            this.modal("show");
        },

        agregarUsuario: function () {
            //Realizar validaciones
            if (this.validar()) {
                //si existe un error cancelar proceso 
                return;
            }

            //Array con los datos
            autor = {
                nombre: this.nombre,
                apellidos: this.apellidos,
            };

            //Realizar la peticion
            this.$http.post(url, autor).then(function (json) {
                //Si es exitoso cerrar la modal
                this.modal("hide")
                this.listarUsuarios();
                this.resetUi();
            }).catch(function (json) {
                //Mostrar los errores en consola
                console.log(json);
                this.validaciones['nombre'] = json.data.errors.nombre[0];
                this.validaciones['apellidos'] = json.data.errors.apellidos[0];
            });

            this.listarUsuarios();
            
        },

        editarUsuario: function (id) {
            //Realizar la peticion
            this.$http.get(url + '/' + id).then(function (json) {
                //Llenar los datos
                this.nombre = json.body.nombre;
                this.apellidos = json.body.apellidos;
                this.id_autor = json.body.id_autor;
            }).catch(function (json) {
                console.log(json);
            });

            //Mostrar modal
            this.modal("show")
        },

        actualizarUsuario: function () {
            //Realizar validaciones
            if (this.validar()) {
                //si existe un error cancelar proceso 
                return;
            }

            //Array con los datos
            autor = {
                nombre: this.nombre,
                apellidos: this.apellidos,
            };

            this.$http.patch(url + '/' + this.id_autor, autor).then(function (json) {
                //Si es exitoso cerrar la modal
                this.modal("hide")
                this.listarUsuarios();
                this.resetUi();
            }).catch(function (json) {
                //Mostrar los errores en consola
                console.log(json);
                this.validaciones['nombre'] = json.data.errors.nombre[0];
                this.validaciones['apellidos'] = json.data.errors.apellidos[0];
            });
            this.listarUsuarios();
        },

        eliminarUsuario: function () {
            //Confirmar eliminación
            if (!confirm('Desea eliminar este usuario')) {
                return;
            }

            
            this.$http.delete(url + '/' + this.id_autor).then(function (json) {
                //Si es exitoso cerrar la modal
                this.modal("hide")
                this.listarUsuarios();
                this.resetUi();
            }).catch(function (json) {
                //Mostrar los errores en consola
                console.log(json);
            });
        }


    }, //Fin de methods

    computed: {
        filtroUsuarios: function () {
            return this.autores.filter((usuario) => {
                return usuario.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) ||
                    usuario.apellidos.toLowerCase().match(this.buscar.toLowerCase().trim());

            });
        },

    }

});