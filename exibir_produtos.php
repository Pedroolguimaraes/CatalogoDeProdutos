<?php
// Conexão com o banco de dados
$host = 'localhost';  // ou o IP do seu servidor
$user = 'root';       // seu usuário do MySQL
$password = '';       // sua senha do MySQL
$database = 'biblioteca'; // nome do banco de dados

$conn = new mysqli($host, $user, $password, $database);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recupera os produtos cadastrados
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

echo "<h1>Catálogo de Produtos</h1>";

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Autor</th><th>Categoria</th><th>Ano</th><th>Descrição</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["autor"] . "</td>
                <td>" . $row["categoria"] . "</td>
                <td>" . $row["ano"] . "</td>
                <td>" . $row["descricao"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum produto encontrado.";
}

$conn->close();
?>
