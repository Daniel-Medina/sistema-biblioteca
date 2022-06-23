var url = "http://dispositivo.test/api/autores"

new Vue({

    el: "#autores",

    data: {
        id_autor: 0,
        nombre: '',
        apellidos: '',
        foto: '',
        autores: [],
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
            this.nombre = "";
            this.apellidos = "";
            this.id_autor = 0;
        },

        listarUsuarios: function () {
            this.$http.get(url).then(function (json) {
                this.autores = json.data;
            }).catch(function (json) {
                console.log(json);
            });
        },

        crearUsuario: function() {
            this.resetUi();
            this.modal("show");
        },

        agregarUsuario: function () {

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
            }).catch(function (json) {
                //Mostrar los errores en consola
                console.log(json);
            });

            this.listarUsuarios();
            this.resetUi();

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

        actualizarUsuario: function() {
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
            });
        },

        eliminarUsuario: function() {
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
        

    } //Fin de methods


});