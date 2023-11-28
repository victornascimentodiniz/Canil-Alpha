<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar as credenciais do usuário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verificar se as credenciais são válidas (usuário: 123456, senha: 123456)
    if ($username == "123456" && $password == "123456") {
        // Redirecionar para a página de cadastro de animais
        header("Location: cadastro_animais.php");
        exit();
    } else {
        // Credenciais inválidas, exibir mensagem de erro
        $error_message = "Usuário ou senha incorretos. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="icon" type="IMG/images.png" href="IMG/images.png" sizes="16x16">
    <link rel="stylesheet " href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Login</title>
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
            <a class="nav-link" aria-current="page" href="Doacao.html">Doação</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="login.php">Gerenciamento</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Adoção.html">Adoção</a>
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
  <br><br><br><br><br>

  <h2>Login</h2>
    
    <?php
    // Exibir mensagem de erro (se houver)
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>

    <form action="login.php" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
