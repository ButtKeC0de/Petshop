<?php
include '../infra/db/connect.php';


if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../index.php");
    exit();
}

$id = (int)$_GET['id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome     = $_POST['nome'];
    $email    = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nome_au  = $_POST['nome_au'];
    $tipo     = $_POST['tipo'];
    $raca     = $_POST['raca'];
    $idade    = (int)$_POST['idade'];

    $stmt = $conn->prepare("UPDATE clientes SET nome = ?, email = ?, telefone = ?, nome_au = ?, tipo = ?, raca = ?, idade = ? WHERE id = ?");
    $stmt->bind_param("ssssssii", $nome, $email, $telefone, $nome_au, $tipo, $raca, $idade, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Erro ao atualizar o cadastro: " . $stmt->error;
    }

    $stmt->close();
}


$stmt = $conn->prepare("SELECT * FROM clientes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: ../index.php");
    exit();
}

$cliente = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/style.css">
    <title>AUmigos - Editar Cadastro</title>
</head>

<body>
    <header>
        <h1>Editar Cadastro </h1>
        <h2>Atualize as informações do Tutor e do AUmigo</h2>
    </header>

    <main>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST" class="form-container">
            <div class="sections-wrapper">
                
       
                <div class="form-section">
                    <h2>Dados do Tutor</h2>
                    <div class="input-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($cliente['nome']); ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($cliente['email']); ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" id="telefone" name="telefone" value="<?php echo htmlspecialchars($cliente['telefone']); ?>" required>
                    </div>
                </div>

         
                <div class="form-section">
                    <h2>Dados do AUmigo</h2>
                    <div class="input-group">
                        <label for="nome_au">Nome do AUmigo:</label>
                        <input type="text" id="nome_au" name="nome_au" value="<?php echo htmlspecialchars($cliente['nome_au']); ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="tipo">Tipo de Animal:</label>
                        <input type="text" id="tipo" name="tipo" value="<?php echo htmlspecialchars($cliente['tipo']); ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="raca">Raça:</label>
                        <input type="text" id="raca" name="raca" value="<?php echo htmlspecialchars($cliente['raca']); ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="idade">Idade (anos):</label>
                        <input type="number" id="idade" name="idade" min="0" value="<?php echo htmlspecialchars($cliente['idade']); ?>" required>
                    </div>
                </div>
            </div>

            <div class="btn-container" style="display: flex; gap: 15px; justify-content: center;">
                <button type="submit" class="btn-submit">Salvar Alterações</button>
                <a href="../index.php" class="btn-submit" style="background-color: #888; text-decoration: none; display: inline-block;">Cancelar</a>
            </div>
        </form>
    </main>
</body>

</html>