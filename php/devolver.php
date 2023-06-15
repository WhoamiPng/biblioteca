<?php
include "conn.php";

$conn = mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
    die("ERRO: " . mysqli_connect_error());
}

$nomePessoa = $_POST["pessoa"];

$sql = "SELECT * FROM emprestimo WHERE nomePessoa LIKE '".$nomePessoa."' AND status LIKE 'pendente'";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    echo "<table border='1px solid black' style='width: 100%; height: 100%'>";
    echo "<tr style='background-color:#04AA6D; border='1px solid black'>";
    echo "<th style='font-size:20px'>ID</th>";
    echo "<th style='font-size:20px'>Nome do Livro</th>";
    echo "<th style='font-size:20px'>Série do comodato</th>";
    echo "<th style='font-size:20px'>Acomodato</th>";
    echo "<th style='font-size:20px'>Data emprestada</th>";
    echo "<th style='font-size:20px'>Prazo</th>";
    echo "<th style='font-size:20px'>Status</th>";
    echo "</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr style='background-color:red'>";
        echo "<th id='" . $row["id"] . "'>" . $row["id"] . "</th>";
        echo "<th>" . $row["nomeLivro"] . "</th>";
        echo "<th>" . $row["serie"] .  "</th>";
        echo "<th>" . $row["nomePessoa"]  .  "</th>";
        echo "<th>" . $row["dataEmprestimo"] .  "</th>";
        echo "<th>" . $row["dataPrazo"] .  "</th>";
        echo "<th>" . $row["status"] .  "</th>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<li>Nenhum resultado encontrado.</li>";
}
?>
