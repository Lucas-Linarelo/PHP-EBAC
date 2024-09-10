<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    if ( empty($nome) || empty($email) || empty($mensagem) ){
        echo "Todos os campos devem ser preenchidos!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "O e-mail fornecido não é vélido!";
    } else{
        echo "Mensagem enviada com sucesso! Obrigado, $nome.";
    }

}else{
    echo "Solicitação inválida.";
}


?>