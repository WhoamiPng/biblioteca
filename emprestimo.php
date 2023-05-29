<?php
    include "conn.php";

    $conn = mysqli_connect($host,$username,$password,$dbname);
    if(!$conn){
        die("ERRO: " . mysqli_connect_error());
    }
    date_default_timezone_set('America/Sao_Paulo');
    $nomePessoa = $_POST["pessoa"];
    $ra = $_POST["ra"];
    $nomeLivro = $_POST["nomeLivro"];
    $dataEmprestimo = date("d-m-Y"); //Pega a data atual de hoje
    $dataPrazo = $_POST["data"];

    //Verificando se o livro existe
    $sql = "SELECT * FROM livros WHERE nomeLivro='".$nomeLivro."'";
    $result = mysqli_query($conn,$sql);

    //Registrando os dados caso o livro exista
    if(mysqli_num_rows($result) > 0){
        $sql = "INSERT INTO emprestimo (nomePessoa,nomeLivro,ra,dataEmprestimo,dataPrazo) Values ('".$nomePessoa."','".$nomeLivro."','".$ra."','".$dataEmprestimo."','".$dataPrazo."')";

        //Atualizando a quantidade de livros
        if(mysqli_query($conn,$sql)){
            $sql = "UPDATE livros SET qtd= qtd-1 WHERE nomeLivro='".$nomeLivro."'";

            if(mysqli_query($conn,$sql)){
                echo "Emprestimo efetuado com sucesso para $nomePessoa no dia $dataEmprestimo ";
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        }
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
?>