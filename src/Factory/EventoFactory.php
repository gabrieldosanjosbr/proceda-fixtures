<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Evento;
use Proceda\Type;

final class EventoFactory extends Factory
{
    public static function create(Type $tipo): Evento
    {
        return new Evento(
            tipo: $tipo,
            data: self::date('data'),
            hora: self::time('hora'),
        );
    }
}
