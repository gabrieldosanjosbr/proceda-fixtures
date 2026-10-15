<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\IntercambioBuilder as BaseIntercambioBuilder;
use Proceda\Fixtures\Factory\IntercambioFactory;

final class IntercambioBuilder extends BaseIntercambioBuilder
{
    use BuilderTrait;

    public function withDocumento(callable $factory): self
    {
        BuilderContext::child('documento');

        $this->addDocumento($factory());

        return $this;
    }

    public static function create(): IntercambioBuilder
    {
        $intercambio = IntercambioFactory::create();
        $self = new IntercambioBuilder();

        $self->remetente = $intercambio->getRemetente();
        $self->destinatario = $intercambio->getDestinatario();
        $self->data = $intercambio->getData();
        $self->hora = $intercambio->getHora();
        $self->identificacao = $intercambio->getIdentificacao();
        $self->documentos = $intercambio->getDocumentos();

        return $self;
    }
}
