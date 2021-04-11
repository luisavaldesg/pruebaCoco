var url = "bd/crud.php";
var appProductos= new Vue({
    el: "#appProducts",
    data: {
        products:[],
        titulo:"",
        descripcion:"",
        precio:"",
        total:0
    },
    methods:{
      //botones
    btnAgg:async function(){                    
        const {value: formValues} = await Swal.fire({
        title: 'Registrar nuevo producto',
        html:
        '<div class="row"><label class="col-sm-4 col-form-label">Titulo</label><div class="col-sm-7"><input id="titulo" type="text" class="form-control"></div></div><div class="row"><label class="col-sm-4 col-form-label">Descripción</label><div class="col-sm-7"><input id="descripcion" type="text" class="form-control"></div></div><div class="row"><label class="col-sm-4 col-form-label">Precio</label><div class="col-sm-7"><input id="precio" type="number" min="0" class="form-control"></div></div>',              
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Save',          
        confirmButtonColor:'#1cc88a',          
        cancelButtonColor:'#3085d6',  
        preConfirm: () => {            
            return [
              this.titulo = document.getElementById('titulo').value,
              this.descripcion = document.getElementById('descripcion').value,
             this.precio = document.getElementById('precio').value                    
            ]
          }
        })        
        if(this.titulo == "" || this.descripcion == "" || this.precio == 0){
                Swal.fire({
                  type: 'info',
                  title: 'Datos incompletos',                                    
                }) 
        }       
        else{          
          this.registrarProducto();          
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            Toast.fire({
              type: 'success',
              title: 'Producto Agregado!'
            })                
        }
    },    

      // btnCarrito: async function(id){

      // },
        btnBorrar:function(id){
          Swal.fire({
            title: '¿Está seguro de borrar el registro: '+id+" ?",         
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor:'#d33',
            cancelButtonColor:'#3085d6',
            confirmButtonText: 'Borrar'
          }).then((result) => {
            if (result.value) {            
              this.borrarProducto(id);             
              Swal.fire(
                '¡Eliminado!',
                'El registro ha sido borrado.',
                'success'
              )
            }
          })  

        },
    //procedimientos
    //procedimiento listar
    listarProductos: function(){
      axios.post(url, {opcion:3}).then(response =>{
        this.products = response.data;
      });

    },
    //procedimiento registrar
    registrarProducto: function(){
      axios.post(url, {opcion:1, titulo:this.titulo, descripcion:this.descripcion, precio:this.precio}).then(response =>{
        
        this.listarProductos();
      });
      this.titulo="";
      this.descripcion="";
      this.precio="";
    },
    //procedimiento borrar

    borrarProducto:function(id){
      axios.post(url, {opcion:2, id:id}).then(response =>{         
          this.listarProductos();
      });
    }   
    },
    created:function(){
      this.listarProductos();
    },
    computed:{}
});
