<?php
    include "conn.php";

    $conn = mysqli_connect($host,$username,$password,$dbname);
    if(!$conn){
        die("ERRO: " . mysqli_connect_error());
    }

    $nomePessoa = $_POST["pessoa"];
    $nomeLivro = $_POST["nomeLivro"];
    $dataEmprestimo = date("Y-m-d"); //Pega a data atual de hoje
    $dataPrazo = $_POST["data"];

    //Verificando se o livro existe
    $sql = "SELECT * FROM livros WHERE nomelivro='".$nomeLivro."'";
    $result = mysqli_query($conn,$sql);

    //Registrando os dados caso o livro exista
    if(mysqli_num_rows($result) > 0){
        $sql = "INSERT INTO emprestimo (nomePessoa,nomeLivro,dataEmprestimo,dataPrazo) Values ('".$nomePessoa."','".$nomeLivro."','".$dataEmprestimo."','".$dataPrazo."')";

        //Atualizando a quantidade de livros
        if(mysqli_query($conn,$sql)){
            $sql = "UPDATE livros SET qtd= qtd-1 WHERE nomeLivro='".$nomeLivro."'";

            if(mysqli_query($conn,$sql)){
                echo "<p style='font-size:40px'>Livro não existe, redirecionando para página inicial em 5 segundos</p>";
                header("Refresh: 5; URL= ../emprestimo.html");
            }else{
                echo "<p style='font-size:40px'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
                header("Refresh: 5; URL= ../emprestimo.html");
            }
        }else{
            echo "<p style='font-size:40px'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
            header("Refresh: 5; URL= ../emprestimo.html");
        }
    }else{
        echo "<p style='font-size:40px'>Livro não existe, redirecionando para página inicial em 5 segundos</p>";
        header("Refresh: 5; URL= ../emprestimo.html");
    }
?>