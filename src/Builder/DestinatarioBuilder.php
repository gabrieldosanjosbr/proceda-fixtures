<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\DestinatarioBuilder as BaseDestinatarioBuilder;
use Proceda\Fixtures\Factory\DestinatarioFactory;

final class DestinatarioBuilder extends BaseDestinatarioBuilder
{
    use BuilderTrait;

    public function withNotaFiscal(\Closure $factory): self
    {
        BuilderContext::child('notaFiscal');

        $this->addNotaFiscal($factory());

        return $this;
    }

    public function withLocalEntregaNotaFiscal(\Closure $factory): self
    {
        BuilderContext::child('localEntregaNotaFiscal');

        $this->localEntregaNotaFiscal($factory());

        return $this;
    }

    public static function create(): DestinatarioBuilder
    {
        $destinatario = DestinatarioFactory::create();
        $self = new DestinatarioBuilder();

        $self->nome = $destinatario->getNome();
        $self->documento = $destinatario->getDocumento();
        $self->inscricaoEstadual = $destinatario->getInscricaoEstadual();
        $self->inscricaoSuframa = $destinatario->getInscricaoSuframa();
        $self->endereco = $destinatario->getEndereco();
        $self->bairro = $destinatario->getBairro();
        $self->cidade = $destinatario->getCidade();
        $self->codigoPais = $destinatario->getCodigoPais();
        $self->codigoMunicipio = $destinatario->getCodigoMunicipio();
        $self->cep = $destinatario->getCep();
        $self->uf = $destinatario->getUf();
        $self->areaFrete = $destinatario->getAreaFrete();
        $self->numeroComunicacao = $destinatario->getNumeroComunicacao();
        $self->estabelecimentoDestino = $destinatario->getEstabelecimentoDestino();
        $self->tipo = $destinatario->getTipo();
        $self->localEntregaNotaFiscal = $destinatario->getLocalEntregaNotaFiscal();
        $self->notasFiscais = $destinatario->getNotasFiscais();

        return $self;
    }
}
