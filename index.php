<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>AUmigos</title>
</head>

<body>
    <header>
        <h1>Bem vindo a AUmigos </h1>
        <h2>Sua loja de animais favorita !</h2>
    </header>

    <body>

    <div class="cliente">
        <form action="processar_cadastro.php" method="POST">
            <h1>Cadastro do cliente </h1>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required>
            <br><br>
        </div>
        <div class="pet"></div>
        <h1>Cadastre o AUmigo </h1>
        <label for="nome_au">Nome do AUmigo:</label>
            <input type="text" id="nome_au" name="nome_au" required>
            <br><br>
            <label for="tipo">Tipo de animal:</label>
            <input type="text" id="tipo" name="tipo" required>
            <br><br>
            <label for="raca">Raça do Animal:</label>
            <input type="text" id="raca" name="raca" required>
            <br><br>
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required>
            <br><br>
            <input type="submit" value="Cadastrar ">



    </body>

</body>

</html>