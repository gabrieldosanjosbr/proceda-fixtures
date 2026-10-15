<?php

namespace Proceda\Fixtures\Factory;

use Faker\Factory as FakerFactory;
use Faker\Generator;
use LogicException;
use Proceda\Schema\Field;
use Proceda\Type;

abstract class Factory
{
    protected static ?Generator $faker = null;
    protected static array $fields = [];

    public static function useFields(
        array $fields = [],
    ): void {
        static::$fields = $fields;
    }

    public static function reset(): void
    {
        static::$fields = [];
        static::$faker = null;
    }

    public static function number(string $property, $min = 1, $max = null): ?int
    {
        if (! static::has($property)) {
            return null;
        }

        $max ??= str_repeat('9', static::length($property));

        return static::faker()->numberBetween(
            $min,
            (int) $max,
        );
    }

    public static function sentence(
        string $property,
    ): ?string {
        if (!static::has($property)) {
            return null;
        }

        return static::truncate(
            $property,
            static::faker()->sentence(),
        );
    }

    public static function company(string $property): ?string
    {
        if (! static::has($property)) {
            return null;
        }

        return static::truncate(
            $property,
            static::faker()->company(),
        );
    }

    public static function person(string $property): ?string
    {
        if (! static::has($property)) {
            return null;
        }

        return static::truncate(
            $property,
            static::faker()->name(),
        );
    }

    public static function cpf(string $property): ?string
    {
        if (! static::has($property)) {
            return null;
        }

        return static::truncate(
            $property,
            static::faker()->cpf(false),
        );
    }

    public static function numerify(string $property): ?string
    {
        if (! static::has($property)) {
            return null;
        }

        $pattern = str_repeat(
            '#',
            static::field($property)->length,
        );

        do {
            $value = static::faker()->numerify($pattern);
        } while (trim($value, '0') === '');

        return $value;
    }

    public static function alpha(string $property): ?string
    {
        if (! static::has($property)) {
            return null;
        }

        $length = static::field($property)->length;

        return strtoupper(
            static::faker()->lexify(str_repeat('?', $length)),
        );
    }

    public static function cnpj(string $property = 'cnpj'): ?string
    {
        if (! static::has($property)) {
            return null;
        }

        return static::faker()->cnpj(false);
    }

    public static function alphanumeric(
        string $property,
        ?string $pattern = null,
    ): ?string {
        if (! static::has($property)) {
            return null;
        }

        $length = static::field($property)->length;

        $pattern ??= str_repeat('?', $length);

        if (strlen($pattern) > $length) {
            throw new LogicException(
                sprintf(
                    'Pattern "%s" exceeds the maximum length of %d for property "%s".',
                    $pattern,
                    $length,
                    $property,
                ),
            );
        }

        return strtoupper(
            static::faker()->bothify($pattern),
        );
    }


    public static function endereco(): ?string
    {
        if (! static::has('endereco')) {
            return null;
        }

        return static::truncate(
            'endereco',
            static::faker()->streetAddress(),
        );
    }

    public static function bairro(): ?string
    {
        if (! static::has('bairro')) {
            return null;
        }

        return static::faker()->citySuffix();
    }

    public static function cidade(): ?string
    {
        if (! static::has('cidade')) {
            return null;
        }

        return static::truncate(
            'cidade',
            static::faker()->city(),
        );
    }

    public static function cep(): ?string
    {
        if (! static::has('cep')) {
            return null;
        }

        return static::truncate(
            'cep',
            static::faker()->postcode(),
        );
    }

    public static function uf(string $property = 'uf'): ?string
    {
        if (! static::has($property)) {
            return null;
        }

        return static::faker()->stateAbbr();
    }

    public static function date(string $property): ?string
    {
        if (! static::has($property)) {
            return null;
        }

        return match (static::length($property)) {
            6 => static::faker()->date('dmy'),
            8 => static::faker()->date('dmY'),
            default => throw new \LogicException(
                sprintf(
                    'Unsupported date length "%d" for "%s".',
                    static::length($property),
                    $property,
                ),
            ),
        };
    }

    public static function time(string $property): ?string
    {
        if (! static::has($property)) {
            return null;
        }

        return static::faker()->time('Hi');
    }

    public static function decimal(string $property): ?float
    {
        if (! static::has($property)) {
            return null;
        }

        $field = static::field($property);

        $integerDigits = $field->length - ($field->decimals ?? 0);

        $max = pow(10, $integerDigits) - pow(10, - ($field->decimals ?? 0));

        return static::faker()->randomFloat(
            $field->decimals ?? 0,
            1,
            $max,
        );
    }

    public static function boolean(string $property): ?bool
    {
        if (! static::has($property)) {
            return null;
        }

        return static::faker()->boolean();
    }

    public static function telefone(string $property)
    {
        if (! static::has($property)) {
            return null;
        }

        return static::faker()->phone();
    }

    public static function marcaVolume(string $property)
    {
        if (! self::has($property)) {
            return null;
        }

        $faker = self::faker();

        return $faker->randomElement([
            'FRAGIL',
            'LOTE ' . $faker->randomLetter(),
            'PALLET ' . $faker->numberBetween(1, 99),
            'CD ' . $faker->stateAbbr(),
            'ARMAZEM ' . $faker->numberBetween(1, 20),
            'CLIENTE ' . strtoupper($faker->lexify('???')),
            'URGENTE',
            'MANUSEAR COM CUIDADO',
        ]);
    }

    public static function acondicionamento(): ?string
    {
        if (! self::has('acondicionamento')) {
            return null;
        }

        return self::faker()->randomElement([
            'FARDOS',
            'AMARRADOS',
            'CAIXAS',
            'PALETES',
            'SACOS',
            'TAMBORES',
            'ENGRADADOS',
            'BOBINAS',
            'VOLUMES',
        ]);
    }

    public static function natureza(): ?string
    {
        if (! self::has('natureza')) {
            return null;
        }

        return self::faker()->randomElement([
            'ALIMENTOS',
            'AUTOPECAS',
            'ABRASIVOS',
            'BEBIDAS',
            'BICICLETAS',
            'BRINQUEDOS',
            'CALCADOS',
            'CONFECCOES',
            'COSMETICOS',
            'ELETRONICOS',
            'FERRAMENTAS',
            'LIVROS',
            'MAQUINAS',
            'MEDICAMENTOS',
            'MOVEIS',
            'PAPEL',
            'PLASTICOS',
            'RACAO ANIMAL',
            'TINTAS',
        ]);
    }

    public static function localDesembarque(): ?string
    {
        if (! self::has('localDesembarque')) {
            return null;
        }

        return self::faker()->randomElement([
            'PORTAO',
            'DOCA',
            'ARMAZEM',
            'PATIO',
            'RECEBIMENTO',
            'EXPEDICAO',
            'GALPAO',
            'DEPOSITO',
            'CAIS',
            'TERMINAL',
        ]);
    }

    public static function type(string $property): ?Type
    {
        if (!static::has($property)) {
            return null;
        }

        $field = static::field($property);

        if ($field?->type === null) {
            return null;
        }

        $types = TypeFactory::getTypeCollection(
            path: $field->type,
            allowed: $field->allowed,
            excluded: $field->excluded,
        );

        if ($types->isEmpty()) {
            throw new \LogicException(
                sprintf(
                    'Field "%s" does not have any allowed types.',
                    $property,
                ),
            );
        }

        return static::faker()->randomElement(
            iterator_to_array($types),
        );
    }

    /**
     * @return Generator
     */
    protected static function faker(): Generator
    {
        self::$faker ??= FakerFactory::create('pt_BR');

        /** @var Generator $faker */
        $faker = self::$faker;

        return $faker;
    }

    protected static function has(string $property): bool
    {
        return isset(static::$fields[$property]);
    }

    protected static function field(string $property): ?Field
    {
        return static::$fields[$property] ?? null;
    }

    protected static function length(string $property): int
    {
        return static::field($property)->length;
    }

    protected static function truncate(
        string $property,
        string $value,
    ): string {
        return substr(
            $value,
            0,
            static::field($property)->length,
        );
    }

    protected static function rtrim(?string $value): ?string
    {
        return $value === null
            ? null
            : rtrim($value);
    }
}
