<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\CobrancaBuilder as BaseCobrancaBuilder;
use Proceda\Fixtures\Factory\CobrancaFactory;

final class CobrancaBuilder extends BaseCobrancaBuilder
{
    use BuilderTrait;

    public function withEmissor(callable $factory): self
    {
        BuilderContext::child('emissor');

        $this->emissor($factory());

        return $this;
    }

    public function withAgente(callable $factory): self
    {
        BuilderContext::child('agente');

        $this->agente($factory());

        return $this;
    }

    public function withConhecimento(callable $factory): self
    {
        BuilderContext::child('conhecimento');

        $this->addConhecimento($factory());

        return $this;
    }

    public function withImposto(callable $factory): self
    {
        BuilderContext::child('imposto');

        $this->imposto($factory());

        return $this;
    }

    public static function create(): CobrancaBuilder
    {
        $cobranca = CobrancaFactory::create();
        $self = new CobrancaBuilder();

        $self->serie = $cobranca->getSerie();
        $self->numero = $cobranca->getNumero();
        $self->emissor = $cobranca->getEmissor();
        $self->documento = $cobranca->getDocumento();
        $self->dataEmissao = $cobranca->getDataEmissao();
        $self->dataVencimento = $cobranca->getDataVencimento();
        $self->valor = $cobranca->getValor();
        $self->tipo = $cobranca->getTipo();
        $self->multaPorAtraso = $cobranca->getMultaPorAtraso();
        $self->valorJurosDiaAtraso = $cobranca->getValorJurosDiaAtraso();
        $self->dataLimitePagamentoDesconto = $cobranca->getDataLimitePagamentoDesconto();
        $self->valorDesconto = $cobranca->getValorDesconto();
        $self->acaoDocumento = $cobranca->getAcaoDocumento();
        $self->identificacaoPreFaturaCliente = $cobranca->getIdentificacaoPreFaturaCliente();
        $self->complementarPreFatura = $cobranca->getComplementarPreFatura();
        $self->cfop = $cobranca->getCfop();
        $self->agente = $cobranca->getAgente();
        $self->nfe = $cobranca->getNfe();
        $self->imposto = $cobranca->getImposto();
        $self->conhecimentos = $cobranca->getConhecimentos();

        return $self;
    }
}
