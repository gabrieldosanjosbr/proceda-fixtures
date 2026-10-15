<?php

namespace Proceda\Fixtures\Factory\Cobranca;

use Proceda\Cobranca;
use Proceda\Fixtures\Factory\Factory;

final class AgenteFactory extends Factory
{
    public static function create(): Cobranca\Agente
    {
        $faker = self::faker();

        return new Cobranca\Agente(
            codigo: self::alphanumeric('codigo', 'AG###'),
            nome: self::banco('nome'),
            agencia: self::numerify('agencia'),
            digitoAgencia: $faker->optional()->lexify('?'),
            conta: $faker->optional()->numerify('##########'),
            digitoConta: $faker->optional()->lexify('?'),
        );
    }

    protected static function banco(string $property): ?string
    {
        if (!self::has($property)) {
            return null;
        }

        return self::faker()->randomElement([
            'Banco do Brasil',
            'Caixa Econômica Federal',
            'Bradesco',
            'Itaú Unibanco',
            'Santander',
            'Banco Inter',
            'Nubank',
            'Sicoob',
            'Sicredi',
            'BTG Pactual',
        ]);
    }
}
