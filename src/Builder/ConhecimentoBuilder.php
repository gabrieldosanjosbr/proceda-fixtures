<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\ConhecimentoBuilder as BaseConhecimentoBuilder;
use Proceda\Fixtures\Factory\ConhecimentoFactory;

final class ConhecimentoBuilder extends BaseConhecimentoBuilder
{
    use BuilderTrait;

    public function withEmissor(callable $factory): self
    {
        BuilderContext::child('emissor');

        $this->emissor($factory());

        return $this;
    }

    public function withContratante(callable $factory): self
    {
        BuilderContext::child('contratante');

        $this->contratante($factory());

        return $this;
    }

    public function withResponsavel(callable $factory): self
    {
        BuilderContext::child('responsavel');

        $this->responsavel($factory());

        return $this;
    }

    public function withNotaFiscal(callable $factory): self
    {
        BuilderContext::child('notaFiscal');

        $this->addNotaFiscal($factory());

        return $this;
    }

    public function withResumo(callable $factory): self
    {
        BuilderContext::child('resumo');

        $this->resumo($factory());

        return $this;
    }

    public function withCte(callable $factory): self
    {
        BuilderContext::child('cte');

        $this->cte($factory());

        return $this;
    }

    public static function create(): ConhecimentoBuilder
    {
        $conhecimento = ConhecimentoFactory::create();
        $self = new ConhecimentoBuilder();

        $self->serie = $conhecimento->getSerie();
        $self->numero = $conhecimento->getNumero();
        $self->dataEmissao = $conhecimento->getDataEmissao();
        $self->acaoDocumento = $conhecimento->getAcaoDocumento();
        $self->tipo = $conhecimento->getTipo();
        $self->contaRazao = $conhecimento->getContaRazao();
        $self->codigoIva = $conhecimento->getCodigoIva();
        $self->devolucao = $conhecimento->getDevolucao();
        $self->resumo = $conhecimento->getResumo();
        $self->contratante = $conhecimento->getContratante();
        $self->emissor = $conhecimento->getEmissor();
        $self->responsavel = $conhecimento->getResponsavel();
        $self->veiculo = $conhecimento->getVeiculo();
        $self->originador = $conhecimento->getOriginador();
        $self->cte = $conhecimento->getCte();
        $self->notasFiscais = $conhecimento->getNotasFiscais();
        $self->embarques = $conhecimento->getEmbarques();

        return $self;
    }
}
