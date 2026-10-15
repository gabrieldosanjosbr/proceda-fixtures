<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\Imposto\TributoBuilder as BaseTributoBuilder;
use Proceda\Fixtures\Factory\TributoFactory;
use Proceda\Type;

final class TributoBuilder extends BaseTributoBuilder
{
    use BuilderTrait;

    public static function create(Type $tipo): self
    {
        $tributo = TributoFactory::create($tipo);
        $self = new TributoBuilder();

        $self->tipo = $tributo->getTipo();
        $self->baseCalculo = $tributo->getBaseCalculo();
        $self->aliquota = $tributo->getAliquota();
        $self->valor = $tributo->getValor();
        $self->valorRetido = $tributo->getValorRetido();
        $self->substituicaoTributaria = $tributo->getSubstituicaoTributaria();

        return $self;
    }
}
