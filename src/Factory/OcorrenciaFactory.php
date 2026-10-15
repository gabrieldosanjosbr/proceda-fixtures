<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Ocorrencia;

final class OcorrenciaFactory extends Factory
{
    /**
     * @throws \Exception
     */
    public static function create(): Ocorrencia
    {
        return new Ocorrencia(
            codigo: self::type('codigo'),
            data: self::date('data'),
            hora: self::time('hora'),
            observacaoEntrada: self::type('observacaoEntrada'),
            indicacaoEntrega: self::type('indicacaoEntrega'),
            notaFiscal: null,
            devolucao: null,
            conhecimento: null,
            originador: null,
            textosLivres: [],
            embarques: [],
            eventos: [],
        );
    }
}
