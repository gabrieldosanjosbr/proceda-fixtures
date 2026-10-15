<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\NfeBuilder as BaseNfeBuilder;
use Proceda\Fixtures\Factory\NfeFactory;

final class NfeBuilder extends BaseNfeBuilder
{
    use BuilderTrait;

    public static function create(): NfeBuilder
    {
        $nfe = NfeFactory::create();
        $self = new NfeBuilder();

        $self->codigo = $nfe->getCodigo();
        $self->chaveAcesso = $nfe->getChaveAcesso();
        $self->protocolo = $nfe->getProtocolo();


        return $self;
    }
}
