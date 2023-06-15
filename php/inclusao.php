<?php
// Conexão com o banco de dados (substitua pelos seus próprios detalhes de conexão)
include "conn.php";

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Captura as informações enviadas pelo formulário
    $nomeLivro = $_POST['nomeLivro'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $qtd = $_POST['qtd'];

    // Insere os dados na tabela "livros"
    $query = "INSERT INTO livros (nomeLivro, autor, genero, qtd) VALUES ( :nomeLivro, :autor, :genero, :qtd)";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':nomeLivro', $nomeLivro);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':qtd', $qtd);
    $stmt->execute();

    echo "<script>alert('Livro salvo com sucesso, clique em Ok para redirecionar para página inicial'); window.location.href='https://bibliotecapimentas7.000webhostapp.com/index.html' </script>";
} catch (PDOException $e) {
    echo "Erro ao enviar informações: " . $e->getMessage();
}
?>
