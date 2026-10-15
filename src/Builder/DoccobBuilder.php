<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\Documento\DoccobBuilder as BaseDoccobBuilder;
use Proceda\Fixtures\Factory\DocumentoFactory;

final class DoccobBuilder extends BaseDoccobBuilder
{
    use BuilderTrait;

    public function withTransportador(callable $factory): self
    {
        BuilderContext::child('transportador');

        $this->transportador($factory());

        return $this;
    }

    public static function create(): DoccobBuilder
    {
        $doccob = DocumentoFactory::createDoccob();
        $self = new DoccobBuilder();

        $self->identificacao = $doccob->getIdentificacao();
        $self->qtdDocumentos = $doccob->getQtdDocumentos();
        $self->valorTotal = $doccob->getValorTotal();
        $self->transportador = $doccob->getTransportador();

        return $self;
    }
}
