<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Document</title>
</head>
<body>
<style>
table th {
  text-align: center;
}
table td {
  text-align: center;
}
</style>
<?php
$cliente = new SoapClient(null, array(
    'location'=>'http://soap2.test/bebidas2/server.php',
    'uri'=>'http://soap2.test/bebidas2/server.php',
    'trace'=>1
));

if(isset($_GET['success'])){
  if($_GET['success'] == "add"){
 echo '<script>
        alert("El producto se agrego correctamente")
        window.location="http://soap2.test/bebidas2/cliente.php";
      </script>';
}
if($_GET['success'] == "update"){
  echo '<script>
          alert("El producto se actualizo correctamente")
          window.location="http://soap2.test/bebidas2/cliente.php";
        </script>';
 }
 if($_GET['success'] == "delete"){
  echo '<script>
          alert("El producto se elimino correctamente")
          window.location="http://soap2.test/bebidas2/cliente.php";
        </script>';
 }
}
?>

<form action="http://soap2.test/bebidas2/add.php" method="post">
    <button type="button" id="agregar-bebida" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Agregar Bebida</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Bebida</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tipo de Bebida:</label>
            <input type="text" name="tipoBebida" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Marca:</label>
            <input type="text" name="marca" class="form-control">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input type="text" name="precio" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add"class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>
</form>


 <table class="table table-striped" >
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Tipo de bebida</th>
            <th scope="col">Marca</th>
            <th scope="col">Precio</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Actualizar</th>
        </tr>
        <?php
try {
    echo $respuesta=$cliente->__soapCall("showData", []);
} catch (SoapFault $ex) {
    echo $ex->getMessage().PHP_EOL;
}
?>
    </table>

<form action="http://soap2.test/bebidas2/update.php" method="post">
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Bebida</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <input type="text" name="idUpdate" class="form-control idUpdate" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tipo de Bebida:</label>
            <input type="text" name="tipoBebidaUpdate" class="form-control tipoBebidaUpdate" >
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Marca:</label>
            <input type="text" name="marcaUpdate" class="form-control marcaUpdate">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio:</label>
            <input type="text" name="precioUpdate" class="form-control precioUpdate">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="./main.js"></script>
</html>