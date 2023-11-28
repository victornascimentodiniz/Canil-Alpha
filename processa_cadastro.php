<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $raca = $_POST["raca"];
    $porte = $_POST["porte"];
    $microchip = $_POST["microchip"];

    // Conectar ao banco de dados (substitua as variáveis conforme necessário)
    $hostname = "localhost";
    $database = "canildb";
    $username = "root";
    $password = "";

    $mysqli = new mysqli($hostname, $username, $password, $database);

    if ($mysqli->connect_errno) {
        die("Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
    }

    // Preparar a consulta SQL para inserir os dados
    $query = "INSERT INTO animais (nome, raca, porte, microchip) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssss", $nome, $raca, $porte, $microchip);

    // Executar a consulta e verificar se foi bem-sucedida
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";

        // Pergunta se deseja continuar cadastrando
        echo "<br>Deseja continuar cadastrando?<br>";
        echo '<a href="cadastro_animal.html">Sim</a> | <a href="#">Não</a>';
    } else {
        echo "Erro ao cadastrar o animal: " . $stmt->error;
    }

    // Fechar a conexão e a declaração
    $stmt->close();
    $mysqli->close();
} else {
    echo "Acesso inválido ao script.";
}
?>
