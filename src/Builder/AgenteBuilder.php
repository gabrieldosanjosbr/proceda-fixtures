<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\Cobranca\AgenteBuilder as BaseAgenteBuilder;
use Proceda\Fixtures\Factory\Cobranca\AgenteFactory;

final class AgenteBuilder extends BaseAgenteBuilder
{
    use BuilderTrait;

    public static function create(): AgenteBuilder
    {
        $agente = AgenteFactory::create();
        $self = new AgenteBuilder();

        $self->codigo = $agente->getCodigo();
        $self->nome = $agente->getNome();
        $self->agencia = $agente->getAgencia();
        $self->digitoAgencia = $agente->getDigitoAgencia();
        $self->conta = $agente->getConta();
        $self->digitoConta = $agente->getDigitoConta();

        return $self;
    }
}
