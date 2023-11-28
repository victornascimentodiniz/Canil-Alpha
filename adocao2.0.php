<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="icon" type="IMG/images.png" href="IMG/images.png" sizes="16x16">
    <link rel="stylesheet " href="Adocao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Canil Lagoa Formosa</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
            <img src="IMG/images.png" class="rounded float-end" alt="#navbarSupportedContent" width="50x50">
                    
                    <div class="container-fluid">
                    <a class="navbar-brand" href="index.html"><h1>Canil Lagoa Formosa</h1></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="Doacao.html">Doação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="telas.php">Gerenciamento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="Adoção.html">Adoção</a>
                        </li>
                        
                        <form class="d-flex" role="o que voce precisa">
                        <input class="form-control me-2" type="o que voce precisa ?" placeholder="O que voçê precisa ?" aria-label="o que voce precisa">
                        <button class="btn btn-dark" type="submit">Pesquisa</button>
                        </form>
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

    <header>
        <h1>Adoção de Animais</h1>
    </header>

    <section id="sobre">
        <h1>Adoção</h1>
        <p>Aqui você irá ver os animais que temos disponíveis para doação no momento.</p>
    </section>

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

    // Consulta SQL para selecionar todos os animais
    $query = "SELECT * FROM animais";
    $result = $mysqli->query($query);

    // Exibir os animais disponíveis para adoção
    if ($result->num_rows > 0) {
        echo '<div class="container">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="animal">';
            echo '<h3>' . $row['nome'] . '</h3>';
            echo '<p>Raça: ' . $row['raca'] . '</p>';
            echo '<p>Porte: ' . $row['porte'] . '</p>';
            echo '<p>Microchip: ' . $row['microchip'] . '</p>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "<p class='info'>Nenhum animal disponível para adoção no momento.</p>";
    }

    // Fechar a conexão
    $mysqli->close();
    ?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="IMG/img-1coter.jpg" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="IMG/img-2conter.jpg" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="IMG/img-2coter.jpg" alt="Terceiro Slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </a>
    </div>

    <section id="como-ajudar">
        <h2>Como Adotar</h2>
        <p>Para adotar e simples, basta entrar em contato conosco por um de nosso meios de comunicação abaixo</p>
    </section>

    <section id="contato">
        <h2>Entre em Contato</h2>
        <p>Se você tiver alguma dúvida ou quiser adotar um animal, entre em contato conosco:</p>
        <p>Email: exemplo@adocaoanimais.com</p>
        <p>Telefone: (123) 456-7890</p>
    </section>

    <footer>
        <p> </p>
    </footer>
</body>
</html>