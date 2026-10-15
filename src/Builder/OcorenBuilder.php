<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\Documento\OcorenBuilder as BaseOcorenBuilder;
use Proceda\Fixtures\Factory\DocumentoFactory;

final class OcorenBuilder extends BaseOcorenBuilder
{
    use BuilderTrait;

    public function withTransportador(callable $factory): OcorenBuilder
    {
        BuilderContext::child('transportador');

        $this->transportador($factory());

        return $this;
    }

    public static function create(): OcorenBuilder
    {
        $ocoren = DocumentoFactory::createOcoren();
        $self = new OcorenBuilder();

        $self->identificacao = $ocoren->getIdentificacao();
        $self->qtdDocumentos = $ocoren->getQtdDocumentos();
        $self->transportador = $ocoren->getTransportador();

        return $self;
    }
}
