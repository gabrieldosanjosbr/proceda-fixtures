<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\Conhecimento\CteBuilder as BaseCteBuilder;
use Proceda\Fixtures\Factory\CteFactory;

final class CteBuilder extends BaseCteBuilder
{
    use BuilderTrait;

    public static function create(): CteBuilder
    {
        $cte =  CteFactory::create();
        $self = new CteBuilder();

        $self->modelo = $cte->getModelo();
        $self->chaveAcesso = $cte->getChaveAcesso();
        $self->protocolo = $cte->getProtocolo();

        return $self;
    }
}
