<?php
// Matriz número 1
$dados = [
    [67, 78, 87, 66, 78, 87, 89, 66, 67, 66],
    [77, 79, 99, 98, 98, 98, 97, 78, 78, 89],
    [66, 67, 68, 69, 70, 71, 72, 87, 88, 66],
    [75, 77, 90, 95, 94, 97, 99, 66, 88, 99]
];

// Matriz número 2
$dados2 = [
    [120, 135, 167, 165, 188, 170, 150],
    [98, 76, 60, 78, 108, 100, 110],
    [90, 95, 138, 135, 133, 130, 100],
    [70, 68, 74, 67, 75, 67, 100]
];

function calculaRiscoInfarto($dadosCardiaco, $nInstancia) {
    // Variáveis para armazenar o maior aumento, o ator com maior aumento, a maior diferença entre o primeiro e o último número e o maior último número da sequência
    $maiorAumento = 0;
    $atorComMaiorAumento = -1;
    $maiorDiferencaPrimeiroUltimo = 0;
    $maiorUltimoNumero = 0;
    $empate = true; // Variável para verificar se houve empate em todos os critérios

    // Percorre cada linha da matriz de dados cardíacos
    foreach ($dadosCardiaco as $indice => $linha) {
        $aumentosConsecutivos = 0;
        $inicioIntervalo = -1;
        $fimIntervalo = -1;

        // Percorre cada elemento da linha atual
        for ($i = 1; $i < count($linha); $i++) {
            if ($linha[$i] > $linha[$i - 1]) { // Verifica se o elemento atual é maior que o anterior
                $aumentosConsecutivos++; // Incrementa a contagem de aumentos consecutivos
                if ($inicioIntervalo === -1) {
                    $inicioIntervalo = $i - 1; // Armazena o índice do início do intervalo
                }
                $fimIntervalo = $i; // Atualiza o índice do fim do intervalo
            } else {
                // Verifica se houve um aumento anteriormente
                if ($inicioIntervalo !== -1) {
                    // Calcula a diferença entre o primeiro e o último número do intervalo
                    $diferenca = $linha[$fimIntervalo] - $linha[$inicioIntervalo];
                    // Verifica se o aumento atual é maior do que o maior aumento até o momento
                    // ou se há um empate na quantidade de aumentos e a diferença atual é maior do que a maior diferença registrada
                    // ou se há um empate na quantidade de aumentos e na diferença e o último número atual é maior do que o maior último número registrado
                    if ($aumentosConsecutivos > $maiorAumento || 
                        ($aumentosConsecutivos === $maiorAumento && $diferenca > $maiorDiferencaPrimeiroUltimo) ||
                        ($aumentosConsecutivos === $maiorAumento && $diferenca === $maiorDiferencaPrimeiroUltimo && $linha[$fimIntervalo] > $maiorUltimoNumero)) {
                        // Atualiza as variáveis com os novos valores
                        $maiorAumento = $aumentosConsecutivos;
                        $maiorDiferencaPrimeiroUltimo = $diferenca;
                        $maiorUltimoNumero = $linha[$fimIntervalo];
                        $atorComMaiorAumento = $indice + 1;
                        $empate = false; // Houve uma atualização, então não há empate
                    }
                    $inicioIntervalo = -1;
                    $fimIntervalo = -1;
                    $aumentosConsecutivos = 0; // Reseta a contagem de aumentos consecutivos
                }
            }
        }
    }

    if ($empate) {
        $atorComMaiorAumento = 1;
    }

    // Imprime o resultado com o ator com maior risco de ataque cardíaco
    echo "Instância #$nInstancia<br> $atorComMaiorAumento<br>";
    echo "<br>";
}

calculaRiscoInfarto($dados, 1);
calculaRiscoInfarto($dados2, 2);
?>
