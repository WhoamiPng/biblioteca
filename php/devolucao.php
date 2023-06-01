<?php
     include "conn.php";

     $conn = mysqli_connect($host,$username,$password,$dbname);
     if(!$conn){
         die("ERRO: " . mysqli_connect_error());
     }
 
     $nomePessoa = $_POST["pessoa"];

     $sql = "SELECT * FROM emprestimo WHERE nomepessoa='".$nomePessoa."'";
     $result = mysqli_query($conn,$sql);

     if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr style='background-color:#04AA6D'>";
            echo "<th>" . $row["id"] . "</th>";
            echo "<th>" . $row["nomeLivro"] . "</th>";
            echo "<th>" . $row["nomePessoa"]  .  "</th>";
            echo "<th>" . $row["dataDevolucao"] .  "</th>";
            echo "</tr>";
        }
    } else {
        echo "<li>Nenhum resultado encontrado.</li>";
    }
?>