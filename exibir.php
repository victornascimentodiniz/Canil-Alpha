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

// Verificar se a consulta foi bem-sucedida
if (!$resultado) {
    die("Erro na consulta: " . $mysqli->error);
}

// Iniciar a seção HTML
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="icon" type="IMG/images.png" href="IMG/images.png" sizes="16x16">
    <link rel="stylesheet " href="exibicao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Canil Lagoa Formosa</title>
    <style>
        body { font-family: 'Arial', sans-serif;
            background-color: rgb(51, 51, 54);}
        .card { margin-bottom: 20px; }
        h2 { color: #007BFF; }
        .custom-img {
            max-width: 100%;
            height: auto;
            object-fit: cover; /* Impede que a imagem seja esticada */
            max-height: 200px; /* ajuste o valor conforme necessário */
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <img src="IMG/images.png" class="rounded float-end" alt="#navbarSupportedContent" width="50x50">
    
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html"><h1>Canil Lagoa Formosa</h1></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="exibir.php">Adoção</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Doacao.html">Doação</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="telas.php">Gerenciamento</a>
          </li>
        
        <a class="whatsapp-link" href="https://web.whatsapp.com/send?phone=5534996366588" target="_blank">
          <i class="fa fa-whatsapp"></i>
        </a>
        <a class="instagram-link" href="https://www.instagram.com/seu_usuario/" target="_blank">
          <i class="fa fa-instagram"></i>
        </a>
      </div>
    </div>
  </nav>
  <br><br><br><br><br><br><br><br>

<div class="container">
    <div class="row">
        <?php
        // Verificar se há resultados antes de iterar sobre eles
        if ($resultado->num_rows > 0) {
            // Exibir os dados dos animais
            while ($row = $resultado->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="imagem/<?php echo $row['nIMAGEM']; ?>" alt="Foto do animal" class="img-thumbnail custom-img">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $row['nome']; ?></h2>
                            <p class="card-text">Raça: <?php echo $row['raca']; ?></p>
                            <p class="card-text">Porte: <?php echo $row['porte']; ?></p>
                            <p class="card-text">Microchip: <?php echo $row['microchip']; ?></p>
                            <form id="formAdotar" action="processar_adocao.php" method="post">
                                <input type="hidden" name="animal_id" value="<?php echo $row['id']; ?>">
                                <button type="button" class="btn btn-primary" onclick="exibirMensagemAgradecimento()">Adotar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Nenhum animal encontrado.";
        }

        // Fechar a conexão e liberar os recursos
        $resultado->free_result();
        $mysqli->close();
        ?>
    </div>
</div>
<script>
function exibirMensagemAgradecimento() {
    // Aqui você pode personalizar a mensagem de agradecimento conforme necessário
    var mensagem = "Obrigado por adotar um animal!";

    // Exibe a mensagem em uma janela de alerta (você pode substituir isso por uma modal Bootstrap)
    alert(mensagem);

    // Redireciona para outra página após a mensagem ser exibida (opcional)
    window.location.href = 'agradecimento.php';
}
</script>
<div class="final" >Copyright © 2023 Canil Lagoa Formosa Município de Lagoa Formosa - MG</div>

</body>
</html>
