<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Intercambio;

final class IntercambioFactory extends Factory
{
    public static function create(): Intercambio
    {
        return new Intercambio(
            remetente: self::company('remetente'),
            destinatario: self::company('destinatario'),
            data: self::date('data'),
            hora: self::time('hora'),
            identificacao: self::alphanumeric('identificacao'),
            documentos: [],
        );
    }
}
