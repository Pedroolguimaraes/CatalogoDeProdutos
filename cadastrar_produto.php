<?php
// Conexão com o banco de dados
$host = 'localhost';   // Endereço do servidor de banco de dados
$user = 'root';        // Usuário do MySQL
$password = '';        // Senha do MySQL
$database = 'biblioteca';  // Nome do banco de dados

// Cria a conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega os dados do formulário
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $descricao = $_POST['descricao'];

    // Prepara a query para inserir os dados
    $sql = "INSERT INTO produtos (nome, categoria, autor, ano, descricao) 
            VALUES ('$nome', '$categoria', '$autor', '$ano', '$descricao')";

    // Executa a query e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar produto: " . $conn->error;
    }
}

// Fecha a conexão
$conn->close();
?>


