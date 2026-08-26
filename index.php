<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <title>AUmigos - Cadastro</title>
</head>

<body>
    <header>
        <h1>Bem-vindo à AUmigos </h1>
        <h2>Sua loja de animais favorita!</h2>
    </header>

    <div class="pet-showcase">
        <div class="pet-card">
            <img src="ASSETS/Cachorro.jpg" alt="Cachorro">
            <span>Cães</span>
        </div>
        <div class="pet-card">
            <img src="ASSETS/Gato.jpg" alt="Gato">
            <span>Gatos</span>
        </div>
        <div class="pet-card">
            <img src="ASSETS/Passarinho.jpg" alt="Passarinho">
            <span>Aves</span>
        </div>
    </div>

    <main>
        <form action="infra/processar_cadastro.php" method="POST" class="form-container">
            <div class="sections-wrapper">
            
                <div class="form-section">
                    <h2>Dados do Tutor</h2>
                    <div class="input-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" placeholder="Seu nome completo" required>
                    </div>
                    <div class="input-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                    </div>
                    <div class="input-group">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Dados do AUmigo</h2>
                    <div class="input-group">
                        <label for="nome_au">Nome do AUmigo:</label>
                        <input type="text" id="nome_au" name="nome_au" placeholder="Nome do pet" required>
                    </div>
                    <div class="input-group">
                        <label for="tipo">Tipo de Animal:</label>
                        <input type="text" id="tipo" name="tipo" placeholder="Cão, Gato, etc." required>
                    </div>
                    <div class="input-group">
                        <label for="raca">Raça:</label>
                        <input type="text" id="raca" name="raca" placeholder="Raça do animal" required>
                    </div>
                    <div class="input-group">
                        <label for="idade">Idade (anos):</label>
                        <input type="number" id="idade" name="idade" min="0" placeholder="Ex: 3" required>
                    </div>
                </div>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn-submit">Finalizar Cadastro</button>
            </div>
        </form>
    </main>

    <footer>
        <h1>Agendamentos</h1>

        <div class="cadastros-container">
            <?php
            include 'infra/db/connect.php';

            $sql = "SELECT * FROM clientes";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='cadastro-card'>";
                    echo "<h3>Cliente: " . htmlspecialchars($row['nome']) . "</h3>";
                    echo "<p>Email: " . htmlspecialchars($row['email']) . "</p>";
                    echo "<p>Telefone: " . htmlspecialchars($row['telefone']) . "</p>";
                    echo "<p>Nome do AUmigo: " . htmlspecialchars($row['nome_au']) . "</p>";
                    echo "<p>Tipo de Animal: " . htmlspecialchars($row['tipo']) . "</p>";
                    echo "<p>Raça: " . htmlspecialchars($row['raca']) . "</p>";
                    echo "<p>Idade: " . htmlspecialchars($row['idade']) . " anos</p>";
                    
    
                    echo "<div class='card-actions'>";
                    echo "  <a href='public/edit.php?id=" . $row['id'] . "' style='background: #4CAF50; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-weight: bold;'>Editar</a>";
                    echo "  <a href='public/delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Deseja realmente excluir este cadastro?');\" style='background: #f44336; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-weight: bold;'>Excluir</a>";
                    echo "</div>";

                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum cliente cadastrado.</p>";
            }

            $conn->close();
            ?>
        </div>
    </footer>
</body>

</html>