

<?php
$mysqli_connection = new MySQLi('10.1.1.58', 'root', '@g@pi.@v@olpato.911', 'volpato_novo');
if($mysqli_connection->connect_error){
   echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
}else{
   echo "Conectado!";
}
?>