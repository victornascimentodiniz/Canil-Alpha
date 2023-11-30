<?php
$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $raca = $_POST["raca"];
    $porte = $_POST["porte"];
    $microchip = $_POST["microchip"];

    // Handle image upload
    $imagem = $_FILES["imagem"]["name"];
    $imagem_temp = $_FILES["imagem"]["tmp_name"];
    $imagem_destino = "C:\\xampp\\htdocs\\Canil-Alpha\\imagem\\" . $imagem;

    move_uploaded_file($imagem_temp, $imagem_destino);

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
    $query = "INSERT INTO animais (nome, raca, porte, microchip, nIMAGEM) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssss", $nome, $raca, $porte, $microchip, $imagem);

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="icon" type="IMG/images.png" href="IMG/images.png" sizes="16x16">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro de Animal</title>
</head>
<body>
<div class="container text-center mt-4">
<h2>Cadastro de Animal</h2></div>
<style>
        p {
            text-align: center;
            margin-top: 50px;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
<p><a href="index.html">Voltar à Página Inicial</a></p>
    
    <?php
    // Exibir a mensagem se houver uma
    if (!empty($mensagem)) {
        echo "<p>$mensagem</p>";
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
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

        <label for="imagem">Imagem:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*" required><br>


        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
