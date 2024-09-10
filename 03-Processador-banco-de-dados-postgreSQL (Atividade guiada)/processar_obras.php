<?php

    $host = "localhost";
    $port = "5432";
    $dbname = "construtora";
    $user = "login";
    $password = "senha";  


    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    if (!$conn) {
        die("Falha na conexão com o banco de dados: " . pg_last_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_projeto = trim($_POST['nome_projeto']);
        $endereco = trim($_POST['endereco']);
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];
        $status = $_POST['status'];
        $descricao = trim($_POST['descricao']);

        if (empty($nome_projeto) || empty($endereco) || empty($data_inicio)) {
            die("Por favor, preencha todos os campos obrigatórios.");
        }

        $query = "INSERT INTO obras (nome_projeto, endereco, data_inicio, data_fim, status, descricao) VALUES ($1, $2, $3, $4, $5, $6)";
        $result = pg_query_params($conn, $query, array($nome_projeto, $endereco, $data_inicio, $data_fim, $status, $descricao));

        if ($result) {
            echo "Obra registrada com sucesso!";
        } else {
            echo "Erro ao registrar a obra: " . pg_last_error($conn);
        }

        pg_close($conn);
    }
?>
