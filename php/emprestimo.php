<?php
    include "conn.php";

    $conn = mysqli_connect($host,$username,$password,$dbname);
    if(!$conn){
        die("ERRO: " . mysqli_connect_error());
    }

    $nomePessoa = $_POST["pessoa"];
    $nomeLivro = $_POST["nomeLivro"];
    $serie = $_POST['serie'];
    $dataEmprestimo = date("Y-m-d"); //Pega a data atual de hoje
    $dataPrazo = $_POST["data"];
    $status = "pendente";

    //Verificando se o livro existe
    $sql = "SELECT * FROM livros WHERE nomelivro='".$nomeLivro."'";
    $result = mysqli_query($conn,$sql);

    //Registrando os dados caso o livro exista
    if(mysqli_num_rows($result) >= 1){
        $sql = "INSERT INTO emprestimo (nomePessoa,nomeLivro,serie,dataEmprestimo,dataPrazo,status) Values ('".$nomePessoa."','".$nomeLivro."','".$serie."','".$dataEmprestimo."','".$dataPrazo."','".$status."')";

        //Atualizando a quantidade de livros
        if(mysqli_query($conn,$sql)){
            $sql = "UPDATE livros SET qtd= qtd -1 WHERE nomeLivro='".$nomeLivro."'";

            if(mysqli_query($conn,$sql)){
                echo "<script>alert(' Livro emprestado com sucesso, clique em ok para voltar à página de emprestimos'); window.location.href='https://bibliotecapimentas7.000webhostapp.com/emprestimo.html' </script>";
            }else{
                echo "<p style='font-size:40px'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
                header("Refresh: 5; URL= https://bibliotecapimentas7.000webhostapp.com/emprestimo.html");
            }
        }else{
            echo "<p style='font-size:40px'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
            header("Refresh: 5; URL= https://bibliotecapimentas7.000webhostapp.com//emprestimo.html");
        }
    }else{
        echo "<script>alert('O Livro digitado, não existe, clique em ok, para voltar para à página de emprestimos'); window.location.href='https://bibliotecapimentas7.000webhostapp.com/emprestimo.html' </script>";
    }
?>