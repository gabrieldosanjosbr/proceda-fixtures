<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\EmbarqueBuilder as BaseEmbarqueBuilder;
use Proceda\Fixtures\Factory\EmbarqueFactory;

final class EmbarqueBuilder extends BaseEmbarqueBuilder
{
    use BuilderTrait;

    public static function create(): EmbarqueBuilder
    {
        $embarque = EmbarqueFactory::create();
        $self = new EmbarqueBuilder();

        $self->identificacao = $embarque->getIdentificacao();

        return $self;
    }
}
