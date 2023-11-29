<?php
// Conectar ao banco de dados (substitua as variáveis conforme necessário)
$hostname = "localhost";
$database = "canildb";
$username = "root";
$password = "";

$mysqli = new mysqli($hostname, $username, $password, $database);

// Verificar a conexão
if ($mysqli->connect_error) {
    die("Falha ao conectar: " . $mysqli->connect_error);
}

// Consulta SQL para obter os dados dos animais
$query = "SELECT id, nome, raca, porte, microchip, nIMAGEM FROM animais";
$resultado = $mysqli->query($query);

// Iniciar a seção HTML
echo "<!DOCTYPE html>";
echo "<html lang='pt-br'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Animais para Adoção</title>";
echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script>";
echo "<link rel='stylesheet' href='C:\xampp\htdocs\Canil-Alpha\exibicao.css\'>";
echo "</head>";


// Exibir os dados dos animais
while ($row = $resultado->fetch_assoc()) {
    echo "<div>";
    echo "<h2>{$row['nome']}</h2>";
    echo "<p>Raça: {$row['raca']}</p>";
    echo "<p>Porte: {$row['porte']}</p>";
    echo "<p>Microchip: {$row['microchip']}</p>";
    
    // Imagem com link para mais informações
    echo "<a href='detalhes_animal.php?id={$row['id']}'>";
    echo "<img src='imagem/{$row['nIMAGEM']}' alt='Foto do animal' style='max-width: 100%; height: auto;'>";
    echo "</a>";
    
    // Botão de adoção
    echo "<form action='processar_adocao.php' method='post'>";
    echo "<input type='hidden' name='animal_id' value='{$row['id']}'>";
    echo "<input type='submit' value='Adotar'>";
    echo "</form>";

    echo "</div>";
}

// Fechar a conexão e liberar os recursos
$resultado->free_result();
$mysqli->close();

// Finalizar a seção HTML
echo "</body>";
echo "</html>";
?>
