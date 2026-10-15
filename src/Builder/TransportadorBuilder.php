<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\TransportadorBuilder as BaseTransportadorBuilder;
use Proceda\Fixtures\Factory\TransportadorFactory;

final class TransportadorBuilder extends BaseTransportadorBuilder
{
    use BuilderTrait;

    public function withOcorrencia(callable $factory): self
    {
        BuilderContext::child('ocorrencia');

        $this->addOcorrencia($factory());

        return $this;
    }

    public function withEmpresa(callable $factory): self
    {
        BuilderContext::child('empresa');

        $this->empresa($factory());

        return $this;
    }

    public function withConhecimento(callable $factory): self
    {
        BuilderContext::child('conhecimento');

        $this->addConhecimento($factory());

        return $this;
    }

    public function withCobranca(callable $factory): self
    {
        BuilderContext::child('cobranca');

        $this->addCobranca($factory());

        return $this;
    }

    public static function create(): TransportadorBuilder
    {
        $transportador = TransportadorFactory::create();
        $self = new TransportadorBuilder();

        $self->empresa = $transportador->getEmpresa();
        $self->ocorrencias = $transportador->getOcorrencias();
        $self->cobrancas = $transportador->getCobrancas();
        $self->conhecimentos = $transportador->getConhecimentos();

        return $self;
    }
}
