<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar e validar os dados do formulário
    $nome_usuario = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $senha = trim($_POST["password"]);

    // Verificar se os campos estão preenchidos
    if (empty($nome_usuario) || empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
        exit();
    }

    // Verificar se o e-mail é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit();
    }

    // Hash da senha
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    // Preparar a consulta SQL
    $stmt = $conn->prepare("INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome_usuario, $email, $senha_hash);

    // Executar a consulta e verificar sucesso
    if ($stmt->execute()) {
        echo "Registro realizado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>