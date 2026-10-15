<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Conhecimento;

final class ConhecimentoFactory extends Factory
{
    public static function create(): Conhecimento
    {
        return new Conhecimento(
            serie: self::numerify('serie'),
            numero: self::numerify('numero'),
            tipo: self::type('tipo'),
            dataEmissao: self::date('dataEmissao'),
            acaoDocumento: self::type('acaoDocumento'),
            contaRazao: self::alphanumeric('contaRazao', 'CR#####'),
            codigoIva: self::type('codigoIva'),
            devolucao: self::boolean('devolucao'),
            resumo: null,
            contratante: null,
            emissor: null,
            responsavel: null,
            veiculo: null,
            originador: null,
            cte: null,
            notasFiscais: [],
            embarques: [],
        );
    }
}
