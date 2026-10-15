<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\UnidadeBuilder as BaseUnidadeBuilder;
use Proceda\Fixtures\Factory\UnidadeFactory;

final class UnidadeBuilder extends BaseUnidadeBuilder
{
    use BuilderTrait;

    public static function create(): self
    {
        $unidade = UnidadeFactory::create();
        $self = new UnidadeBuilder();

        $self->identificacao = $unidade->getIdentificacao();
        $self->uf = $unidade->getUf();

        return $self;
    }
}
