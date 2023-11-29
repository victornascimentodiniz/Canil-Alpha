<?php
// Conectar ao banco de dados (substitua as variáveis conforme necessário)
$hostname = "localhost";
$database = "canildb";
$username = "root";
$password = "";

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_errno) {
    die("Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

// Consulta SQL para obter os dados dos animais
$query = "SELECT nome, raca, porte, microchip, nIMAGEM FROM animais";
$resultado = $mysqli->query($query);

// Iniciar a seção HTML
echo "<!DOCTYPE html>";
echo "<html lang='pt-br'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Animais para Adoção</title>";
echo "</head>";
echo "<body>";

// Exibir os dados dos animais
while ($row = $resultado->fetch_assoc()) {
    echo "<div>";
    echo "<h2>{$row['nome']}</h2>";
    echo "<p>Raça: {$row['raca']}</p>";
    echo "<p>Porte: {$row['porte']}</p>";
    echo "<p>Microchip: {$row['microchip']}</p>";
    
    // Garantir que a extensão da imagem seja tratada corretamente
    $extensao = pathinfo($row['nIMAGEM'], PATHINFO_EXTENSION);
    echo "<img src='imagem/{$row['nIMAGEM']}' alt='Foto do animal' style='max-width: 100%; height: auto;'>";
    
    echo "</div>";
}

// Fechar a conexão e liberar os recursos
$mysqli->close();

// Finalizar a seção HTML
echo "</body>";
echo "</html>";
?>