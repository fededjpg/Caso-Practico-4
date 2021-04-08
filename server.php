<?php

class Bebidas
{
    public function showData()
    {
        $dataset="";
        $conn = new mysqli("localhost", "root", "", "bebidas");
        $sql  = "SELECT * FROM bebidas_alcoholicas ORDER BY id DESC";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
        
        foreach ($result as $data) {
            $dataset .= ("<tr>");
            $dataset .= ("<td>" . $data['id'] . "</td>");
            $dataset .= ("<td>" .$data['tipo_de_bebida']. "</td>");
            $dataset .= ("<td>" .$data['marca'] . "</td>");
            $dataset .= ("<td>" .$data['precio'] . "</td>");
            $dataset .= ("<td >
            <form action='http://soap2.test/bebidas2/delete.php?id=". $data['id']."' method='post'>
            <button name='id' class='btn btn-danger id-delete'>eliminar
            </form>
            </td>");
            $dataset .= ("<td><button class='id btn btn-warning' data-bs-toggle='modal' data-bs-target='#editModal' data-bs-whatever='@mdo'>actualizar</button></td>");
            $dataset .= ("</tr>");
        }
    }else{
        $dataset = "<tr><td colspan='6'>no existen datos</td></tr>";
    }
        return $dataset;
    }
    public function addDrink($tipoDeBebida, $marca, $precio)
    {
        $dataset="";
        $conn = new mysqli("localhost", "root", "", "bebidas");
        $sql = "INSERT INTO bebidas_alcoholicas (tipo_de_bebida, marca, precio) VALUES('$tipoDeBebida', '$marca', $precio)";
        if($conn->query($sql) === true){
            return $dataset= "Se Inserto Correctamente";
        }else{
            return $dataset ="Error al agregar :(";
        }
    }

    public function updateDrink($id, $tipoDeBebida, $marca, $precio)
    {
        $dataset="";
        $conn = new mysqli("localhost", "root", "", "bebidas");
        $sql = "UPDATE bebidas_alcoholicas SET tipo_de_bebida='$tipoDeBebida', marca='$marca', precio='$precio' WHERE id= '$id'";
        if ($conn->query($sql) === TRUE) {
                echo 1;
          } else {
            echo "Error updating record: " . $conn->error;
          }
    }
    public function deleteDrink($id)
    {
        $dataset="";
        $conn = new mysqli("localhost", "root", "", "bebidas");
        $sql = "DELETE FROM bebidas_alcoholicas WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo 1;
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }
}
try {
    $server = new SoapServer(
        null,
        [
            'uri' => 'http://soap2.test/bebidas2/server.php'
        ]
    );
    $server->setClass('Bebidas');
    $server->handle();
} catch (SoapFault $e) {
    print $e->faultstring;
}
