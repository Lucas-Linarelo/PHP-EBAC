<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $anoNascimento = $_POST['anoNascimento'];

    $anoAtual = date("Y");

    $idade = $anoAtual - $anoNascimento;

    echo "<p>Sua idade é $idade anos.</p>";
}
?>
