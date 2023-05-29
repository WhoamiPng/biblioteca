<?php
    include "conn.php";

    $conn = mysqli_connect($host, $username, $password, $dbname);
    if(!$conn){
        die("ERRO: " . mysqli_connect_error());
    }

    $ra = $_POST["ra"];
    $nomePessoa = $_POST["nomePessoa"];
    $nomeLivro = $_POST["nomeLivro"];
    $dataDevolvida = date("d-m-Y");

    // Verificando se o empréstimo existe
    $sql = "SELECT * FROM emprestimo WHERE ra='".$ra."' AND nomePessoa='".$nomePessoa."' AND nomeLivro='".$nomeLivro."'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $emprestimoId = $row["id"];

        // Registrando a devolução
        $sqlDevolucao = "INSERT INTO devolucoes (emprestimoId, dataDevolvida) VALUES ('".$emprestimoId."', '".$dataDevolvida."')";
        if(mysqli_query($conn, $sqlDevolucao)){
            // Atualizando a quantidade de livros
            $sqlAtualizacao = "UPDATE livros SET qtd = qtd + 1 WHERE nomeLivro='".$nomeLivro."'";
            if(mysqli_query($conn, $sqlAtualizacao)){
                echo "Livro devolvido com sucesso no dia $dataDevolvida";
            }else{
                echo "Erro ao atualizar a quantidade de livros: " . mysqli_error($conn);
            }
        }else{
            echo "Erro ao registrar a devolução: " . mysqli_error($conn);
        }
    }else{
        echo "Empréstimo não encontrado.";
    }

    mysqli_close($conn);
?>
