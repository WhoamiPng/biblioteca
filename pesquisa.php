<?php
// Conexão com o banco de dados
include 'conn.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtenção do termo de pesquisa
$termo = $_POST["termo"] ?? "";

// Consulta ao banco de dados
$sql = "SELECT * FROM livros WHERE nomeLivro LIKE '%$termo%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li> ID do livro : " . $row["id"] . "</li>";
        echo "<li> Nome do livro :" . $row["nomeLivro"] . "</li>";
        echo "<li> Autor do livro :" . $row["autor"]  .  "</li>";
        echo "<li> Genero do livro :" . $row["generos"] .  "</li>";
        echo "<li> Quantidade de livros :" . $row["qtd"] .  "</li>";

    }
} else {
    echo "<li>Nenhum resultado encontrado.</li>";
}

$conn->close();
?>
