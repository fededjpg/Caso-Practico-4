<?php
$cliente = new SoapClient(null, array(
    'location'=>'http://soap2.test/bebidas2/server.php',
    'uri'=>'http://soap2.test/bebidas2/server.php',
    'trace'=>1
));
try {
    if (isset($_POST['tipoBebida']) && isset($_POST['marca']) && isset($_POST['precio'])) {
      $tipo=  $_POST['tipoBebida'];
      $marca = $_POST['marca'];
      $precio = $_POST['precio'];
        $respuesta=$cliente->__soapCall("addDrink", [$tipo, $marca, $precio]);
        header("Location:http://soap2.test/bebidas2/cliente.php?success=add");
    }
} catch (SoapFault $ex) {
    echo $ex->getMessage().PHP_EOL;
}
?>