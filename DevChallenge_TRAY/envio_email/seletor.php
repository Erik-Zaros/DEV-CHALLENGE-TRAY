<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $opcao = $_POST["opcao"];

    // Verifique se a opção está entre 1 e 5
    if ($opcao >= 1 && $opcao <= 5) {
        // Crie o nome do arquivo JSON correspondente
        $nomeArquivoJSON = "opcao{$opcao}.json";

        // Verifique se o arquivo JSON existe
        if (file_exists($nomeArquivoJSON)) {
            // Redirecione o usuário para o arquivo JSON
            header("Location: $nomeArquivoJSON");
            exit;
        } else {
            echo "O arquivo JSON correspondente à opção não existe.";
        }
    } else {
        echo "Opção inválida. Por favor, selecione uma opção de 1 a 5.";
    }
}
?>
