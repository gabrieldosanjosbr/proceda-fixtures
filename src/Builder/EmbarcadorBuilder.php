<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\EmbarcadorBuilder as BaseEmbarcadorBuilder;
use Proceda\Fixtures\Factory\EmbarcadorFactory;

final class EmbarcadorBuilder extends BaseEmbarcadorBuilder
{
    use BuilderTrait;

    public function withEmpresa(callable $factory): self
    {
        BuilderContext::child('empresa');

        $this->empresa($factory());

        return $this;
    }

    public function withLocalColetaNotaFiscal(callable $factory): self
    {
        BuilderContext::child('localColetaNotaFiscal');

        $this->localColetaNotaFiscal($factory());

        return $this;
    }

    public function withDestinatario(callable $factory): self
    {
        BuilderContext::child('destinatario');

        $this->addDestinatario($factory());

        return $this;
    }

    public static function create(): EmbarcadorBuilder
    {
        $embarcador = EmbarcadorFactory::create();
        $self = new EmbarcadorBuilder();

        $self->empresa = $embarcador->getEmpresa();
        $self->dataEmbarque = $embarcador->getDataEmbarque();
        $self->inscricaoEstadualSubstitutoTributario = $embarcador->getInscricaoEstadualSubstitutoTributario();
        $self->contatoEmergencia = $embarcador->getContatoEmergencia();
        $self->localColetaNotaFiscal = $embarcador->getLocalColetaNotaFiscal();
        $self->destinatarios = $embarcador->getDestinatarios();

        return $self;
    }
}
