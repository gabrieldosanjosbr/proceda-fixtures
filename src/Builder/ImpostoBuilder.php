<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\ImpostoBuilder as BaseImpostoBuilder;
use Proceda\Fixtures\Factory\ImpostoFactory;
use Proceda\Fixtures\Factory\TypeFactory;
use Proceda\Imposto\Tributo;
use Proceda\Type;

final class ImpostoBuilder extends BaseImpostoBuilder
{
    use BuilderTrait;

    /**
     * @param callable(Type): Tributo $factory
     */
    public function withTributo(
        string $type,
        callable $factory,
    ): self {
        BuilderContext::child($type);

        $this->addTributo(
            $factory(
                TypeFactory::get(
                    'Imposto/Tributo/Tipo/' . ucfirst($type),
                ),
            ),
        );

        return $this;
    }

    public static function create(): ImpostoBuilder
    {
        $imposto = ImpostoFactory::create();
        $self = new ImpostoBuilder();

        $self->condicaoTributaria = $imposto->getCondicaoTributaria();
        $self->direitoFiscal = $imposto->getDireitoFiscal();
        $self->incidenciaIcms = $imposto->getIncidenciaIcms();
        $self->tratamento = $imposto->getTratamento();
        $self->tributos = $imposto->getTributos();

        return $self;
    }
}
