<?php
include "conn.php";

$conn = mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
    die("ERRO: " . mysqli_connect_error());
}

$id = $_POST["id"];
$status = 'devolvido';
$dataDevolucao = date("Y-m-d");

$sql = "SELECT * FROM emprestimo WHERE id='".$id."'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    if($row = $result->fetch_assoc()){
        $sql = "INSERT INTO devolucao (nomeLivro, nomePessoa, dataDevolucao) VALUES ('".$row['nomeLivro']."','".$row['nomePessoa']."','".$dataDevolucao."')";
        $result = mysqli_query($conn,$sql);
        if($result){
            $sql = "UPDATE emprestimo SET status='devolvido' WHERE id='".$id."'";
            $result = mysqli_query($conn,$sql);
            if($result){
                $sql = "UPDATE livros SET qtd= qtd+1 WHERE nomeLivro='".$row['nomeLivro']."'";
                $result = mysqli_query($conn,$sql);
                if($result){
                    echo "SUCESSO";
                } else {
                    echo "ERRO";
                }
            } else {
                echo "ERRO";
            }
        } else {
            echo "ERRO";
        }
    }
} else {
    echo "<li>Nenhum resultado encontrado.</li>";
}
?>
