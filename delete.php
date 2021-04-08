<?php
$cliente = new SoapClient(null, array(
    'location'=>'http://soap2.test/bebidas2/server.php',
    'uri'=>'http://soap2.test/bebidas2/server.php',
    'trace'=>1
));

try {
  if (isset($_GET['id'])) {
    $id= $_GET['id'];
    $respuesta=$cliente->__soapCall("deleteDrink", [$id]);
      header ("Location:http://soap2.test/bebidas2/cliente.php?success=delete");
  }
//  var_dump( explode(' ', $respuesta));
} catch (SoapFault $ex) {
    echo $ex->getMessage().PHP_EOL;
}
echo $_GET['id'];

?>