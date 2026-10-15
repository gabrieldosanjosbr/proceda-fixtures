<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\Documento\NotfisBuilder as BaseNotfisBuilder;
use Proceda\Fixtures\Factory\DocumentoFactory;

final class NotfisBuilder extends BaseNotfisBuilder
{
    use BuilderTrait;

    public function withEmbarcador(callable $factory): NotfisBuilder
    {
        BuilderContext::child('embarcador');

        $this->addEmbarcador($factory());

        return $this;
    }

    public static function create(): NotfisBuilder
    {
        $documento = DocumentoFactory::createNotfis();
        $self = new NotfisBuilder();

        $self->identificacao = $documento->getIdentificacao();
        $self->qtdDocumentos = $documento->getQtdDocumentos();
        $self->valorTotal = $documento->getValorTotal();
        $self->pesoBruto = $documento->getPesoBruto();
        $self->totalVolumes = $documento->getTotalVolumes();
        $self->pesoDensidadeCubagem = $documento->getPesoDensidadeCubagem();
        $self->valorCobradoCliente = $documento->getValorCobradoCliente();
        $self->valorSeguro = $documento->getValorSeguro();
        $self->embarcadoras = $documento->getEmbarcadoras();

        return $self;
    }
}
