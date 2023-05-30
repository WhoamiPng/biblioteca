<?php
// Conexão com o banco de dados
include 'conn.php';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtenção do termo de pesquisa
$termo = $_POST["termo"];

if($termo == "emprestimo"){
    $sql = "SELECT * FROM emprestimo ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr style='background-color:#04AA6D'>";
            echo "<th>" . $row["id"] . "</th>";
            echo "<th>" . $row["nomeLivro"] . "</th>";
            echo "<th>" . $row["nomePessoa"]  .  "</th>";
            echo "<th>" . $row["dataEmprestimo"] .  "</th>";
            echo "<th>" . $row["dataPrazo"] .  "</th>";
            echo "</tr>";
        }
    } else {
        echo "<li>Nenhum resultado encontrado.</li>";
    }
}

//AINDA A SER FEITO E IMPLEMENTADO

if($termo == "devolucao"){
    $sql = "SELECT * FROM devolucao ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr style='background-color:#04AA6D'>";
            echo "<th>" . $row["id"] . "</th>";
            echo "<th>" . $row["nomeLivro"] . "</th>";
            echo "<th>" . $row["autor"]  .  "</th>";
            echo "<th>" . $row["generos"] .  "</th>";
            echo "<th>" . $row["qtd"] .  "</th>";
            echo "</tr>";

        }
    } else {
        echo "<li>Nenhum resultado encontrado.</li>";
    }
}

$conn->close();
?>
