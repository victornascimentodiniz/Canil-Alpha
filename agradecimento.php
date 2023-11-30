<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="icon" type="IMG/images.png" href="IMG/images.png" sizes="16x16">
    <link rel="stylesheet " href="estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Canil Lagoa Formosa</title>
  </head>
  <body>
    <br><br><br><br><br><br> 
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

      <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: rgb(51, 51, 54);
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        #map {
            height: 400px;
            width: 100%;
        }

        
    </style>
</head>
<body>
    <h1>Obrigado por adotar um animal!</h1>
    <p>Agora que você adotou um novo amigo, aqui estão algumas informações importantes:</p>

    <h2>Onde Pegar o Animalzinho:</h2>
    <p>CANIL Municipal / Lagoa Formosa</p>
    <p>[Abrimos as 7hrs e fechamos as 16hrs]</p>

    <h2>Cuidados com o Animalzinho:</h2>
    <p>Alimentação adequada <br>
Atividade física<br>
Ambiente seguro<br>
Cuidados veterinários<br>
Higiene<br>
Identificação<br>
Treinamento<br>
Amor e atenção<br>
Monitoramento da saúde mental<br>
Preparação para emergências<br></p>

    <h2>Local do Canil:</h2>
    <div id="map">
        <iframe
            width="100%"
            height="400"
            frameborder="0"
            scrolling="no"
            marginheight="0"
            marginwidth="0"
            src="https://www.google.com/maps/embed/v1/place?q=Canil&key=YOUR_API_KEY"
        ></iframe>
    </div>
    <p>Agradecemos muito por escolher dar um lar para um animalzinho! Se precisar de mais informações, entre em contato conosco.</p>

      </body>
</html>