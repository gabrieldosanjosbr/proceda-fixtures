<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Embarcador;

final class EmbarcadorFactory extends Factory
{
    public static function create(): Embarcador
    {
        return new Embarcador(
            empresa: EmpresaFactory::create(),
            dataEmbarque: self::date('dataEmbarque'),
            inscricaoEstadualSubstitutoTributario: self::alphanumeric('inscricaoEstadualSubstitutoTributario'),
            contatoEmergencia: self::telefone('contatoEmergencia'),
            localColetaNotaFiscal: null,
            destinatarios: [],
        );
    }
}
