new Vue ({

    el:"#autores",

    data: {
        nombre:'',
        apellidos:'',
        foto:'',
    },

    methods:{
        agregarUsuario:function() {
            $("#exampleModal").modal("show");
        },

        editarUsuario:function() {
            $("#exampleModal").modal("show");
        },

        eliminarUsuario:function() {
            $("#exampleModal").modal("show")
        },

        

    } //Fin de methods


});