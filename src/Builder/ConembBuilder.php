<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\Documento\ConembBuilder as BaseConembBuilder;
use Proceda\Fixtures\Factory\DocumentoFactory;

final class ConembBuilder extends BaseConembBuilder
{
    use BuilderTrait;

    public function withTransportador(callable $factory): ConembBuilder
    {
        BuilderContext::child('transportador');

        $this->transportador($factory());

        return $this;
    }

    public static function create(): ConembBuilder
    {
        $documento = DocumentoFactory::createConemb();
        $self = new ConembBuilder();

        $self->identificacao = $documento->getIdentificacao();
        $self->qtdDocumentos = $documento->getQtdDocumentos();
        $self->valorTotal = $documento->getValorTotal();
        $self->transportador = $documento->getTransportador();

        return $self;
    }
}
