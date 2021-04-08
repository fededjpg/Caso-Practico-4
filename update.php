<?php
$cliente = new SoapClient(null, array(
    'location'=>'http://soap2.test/bebidas2/server.php',
    'uri'=>'http://soap2.test/bebidas2/server.php',
    'trace'=>1
));

try {
  if (isset($_POST['idUpdate']) && isset($_POST['tipoBebidaUpdate']) && isset($_POST['marcaUpdate']) && isset($_POST['precioUpdate'])) {
    $id= $_POST['idUpdate'];
    $tipo=  $_POST['tipoBebidaUpdate'];
    $marca = $_POST['marcaUpdate'];
    $precio = $_POST['precioUpdate'];
    $respuesta=$cliente->__soapCall("updateDrink", [$id, $tipo, $marca, $precio]);
      header ("Location:http://soap2.test/bebidas2/cliente.php?success=update");
  }
//  var_dump( explode(' ', $respuesta));
} catch (SoapFault $ex) {
    echo $ex->getMessage().PHP_EOL;
}
?>