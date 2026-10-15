<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Veiculo;

final class VeiculoFactory extends Factory
{
    public static function create(): Veiculo
    {
        return new Veiculo(
            tipo: self::type('tipo'),
            placa: self::placa(),
        );
    }

    protected static function placa(): ?string
    {
        if (! self::has('placa')) {
            return null;
        }

        return self::faker()->bothify('???#?##');
    }
}
