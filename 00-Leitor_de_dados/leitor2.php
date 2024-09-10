<?php
// Abre o arquivo dados.txt para leituar
$arquivo = fopen("leitor.txt", "r");

if ($arquivo) {
    // Lê até o final do arquivo
    while (!feof($arquivo)) {
        // Lê uma linha do arquivo
        $linha = fgets($arquivo);
        
        // Exibe apenas as linhas "Nome:"
        if (strpos($linha, "Nome:") !== false) {
            echo $linha . "";
        }
    }
    
    // Fecha o arquivo
    fclose($arquivo);
} else {
    echo "Não foi possível abrir o arquivo.";
}
?>
