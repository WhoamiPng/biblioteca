<?php
// Conexão com o banco de dados (substitua pelos seus próprios detalhes de conexão)
$host = "localhost";
$dbname = "inventario";
$username = "root";
$password = "";

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Captura as informações enviadas pelo formulário
    $id = $_POST['id'];
    $nomeLivro = $_POST['nomeLivro'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $qtd = $_POST['qtd'];

    // Insere os dados na tabela "livros"
    $query = "INSERT INTO livros (id, nomeLivro, autor, genero, qtd) VALUES (:id, :nomeLivro, :autor, :genero, :qtd)";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nomeLivro', $nomeLivro);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':qtd', $qtd);
    $stmt->execute();

    echo "Informações enviadas com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao enviar informações: " . $e->getMessage();
}
?>
