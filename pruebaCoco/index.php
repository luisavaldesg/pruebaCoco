<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert.min.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="main.css">
  <title>Aguita de coco</title>
</head>

<body>
  <header>
    <h2 class="text-center text-dark">Aguita de Coco</h2>
  </header>

  <div id="appProducts">
    <div class="container">
      <div class="row">
        <div class="col">
          <button @click="btnAgg" class="btn btn-success" title="Nuevo"><i class="fas fa-plus-circle fa-2x"></i></button>
        </div>
        <!-- <div class="col text-right">
          <h5>Carrito<span class="badge badge-light">{{carrito}}</span></h5>
        </div> -->
      </div>
      <div class="row mt-5">
          <div class="col-lg-12">
            <table class="table table-striped table-borderless">
              <thead>
                <tr class="bg-primary text-light">
                  <th>ID</th>
                  <th>Título</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(producto, indice) of products">
                  <td>{{producto.id_producto}}</td>
                  <td>{{producto.titulo}}</td>
                  <td>{{producto.descripcion}}</td>
                  <td>{{producto.precio}}</td>
                  <td>
                    <div class="btn-group" role="group">
                      <button class="btn btn-success" title="Comprar" @click="btnCarrito(producto.id_producto)"><i class="fas fa-cart-plus"></i></button>
                      <button class="btn btn-danger" title="Eliminar" @click="btnBorrar(producto.id_producto)"><i class="fas fa-trash-alt"></i></button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>




  <!-- JQuery, Popper.js, Bootstrap JS -->
  <script src="jquery/jquery-3.6.0.min.js"></script>
  <script src="popper/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- Vue.JS -->
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <!-- Axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- Sweet Alert2 -->
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- Codigo custom -->
  <script src="main.js"></script>
</body>

</html>