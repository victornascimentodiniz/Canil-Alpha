<?php
$mensagem = '';

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
        $mensagem = "Cadastro realizado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar o animal: " . $stmt->error;
    }

    // Fechar a conexão e a declaração
    $stmt->close();
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro de Animal</title>
</head>
<body>
    <h2>Cadastro de Animal</h2>
    
    <?php
    // Exibir a mensagem se houver uma
    if (!empty($mensagem)) {
        echo "<p>$mensagem</p>";
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="raca">Raça:</label>
        <input type="text" id="raca" name="raca" required><br>

        <label for="porte">Porte:</label>
        <select id="porte" name="porte" required>
            <option value="P">Pequeno</option>
            <option value="M">Médio</option>
            <option value="G">Grande</option>
        </select><br>

        <label for="microchip">Microchip:</label>
        <input type="text" id="microchip" name="microchip" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>