<!DOCTYPE html>
<link rel="stylesheet" href="teste.css">
<body>
    
</body>
</html>

<?php
// Conexão com o banco de dados
include 'conn.php';

$conn = new mysqli($host, $username, $password, $dbname);
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
        echo "<tr>";
        echo "<th>" . $row["id"] . "</th>";
        echo "<th>" . $row["nomeLivro"] . "</th>";
        echo "<th>" . $row["autor"]  .  "</th>";
        echo "<th>" . $row["genero"] .  "</th>";
        echo "<th>" . $row["qtd"] .  "</th>";
        echo "</tr>";

    }
} else {
    echo "<li>Nenhum resultado encontrado.</li>";
}

$conn->close();
?>
