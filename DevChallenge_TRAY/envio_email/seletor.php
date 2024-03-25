<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $opcao = $_POST["opcao"];

    if ($opcao >= 1 && $opcao <= 5) {
        
        $nomeArquivoJSON = "opcao{$opcao}.json";

        if (file_exists($nomeArquivoJSON)) {
            
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
