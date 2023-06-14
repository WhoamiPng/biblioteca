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
    $sql = "SELECT * FROM emprestimo WHERE status LIKE 'pendente' ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table style='width: 100%;'>";
        echo "<tr style='background-color:#04AA6D'>";
        echo "<th>ID</th>";
        echo "<th>Nome do Livro</th>";
        echo "<th>Nome da Pessoa</th>";
        echo "<th>Data de Empréstimo</th>";
        echo "<th>Data do Prazo</th>";
        echo "<th>Status</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr class='historico-table' style='background-color:tomato; height: 100%'>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nomeLivro"] . "</td>";
            echo "<td>" . $row["nomePessoa"]  .  "</td>";
            echo "<td>" . $row["dataEmprestimo"] .  "</td>";
            echo "<td>" . $row["dataPrazo"] .  "</td>";
            echo "<td>" . $row["status"] .  "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum resultado encontrado.</p>";
    }
}

// AINDA A SER FEITO E IMPLEMENTADO

if($termo == "devolucao"){
    $sql = "SELECT * FROM emprestimo ORDER BY status DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1px solid black' style='width: 100%; height: 100%'>";
        echo "<tr style='background-color:#04AA6D'>";
        echo "<th style='font-size:20px'>ID</th>";
        echo "<th style='font-size:20px' >Nome do Livro</th>";
        echo "<th style='font-size:20px'>Acomodato</th>";
        echo "<th style='font-size:20px'>D. Emprestada</th>";
        echo "<th style='font-size:20px'>Prazo</th>";
        echo "<th style='font-size:20px'>Status</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr style='background-color:#04AA6D'>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nomeLivro"] . "</td>";
            echo "<td>" . $row["nomePessoa"]  .  "</td>";
            echo "<td>" . $row["dataEmprestimo"] .  "</td>";
            echo "<td>" . $row["dataPrazo"] .  "</td>";
            echo "<td>" . $row["status"] .  "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum resultado encontrado.</p>";
    }
}

$conn->close();
?>
