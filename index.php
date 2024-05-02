<?php 
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

        foreach ($dadosCardiaco as $indice => $linha) {
            $aumentosConsecutivos = 0;

            // Percorre cada elemento da linha atual
            for ($i = 1; $i < count($linha); $i++) {
                if ($linha[$i] > $linha[$i - 1]) { // Verifica se o elemento atual é maior que o anterior
                    $aumentosConsecutivos++; // Incrementa a contagem de aumentos consecutivos
                } else {
                    if ($aumentosConsecutivos > $maiorAumento) {
                        $maiorAumento = $aumentosConsecutivos;
                        $atorComMaiorAumento = $indice + 1;
                    }

                    $aumentosConsecutivos = 0; // Reseta a contagem de aumentos consecutivos
                }
            }
        }
        // Imprime o resultado com o ator com maior risco de ataque cardíaco
        echo "Instância #$nInstancia<br> $atorComMaiorAumento<br>";
    }

    calculaRiscoInfarto($dados, 1);
    calculaRiscoInfarto($dados2, 2);
?>