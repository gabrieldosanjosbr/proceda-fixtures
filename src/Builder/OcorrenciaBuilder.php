<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\OcorrenciaBuilder as BaseOcorrenciaBuilder;
use Proceda\Fixtures\Factory\OcorrenciaFactory;
use Proceda\Type;

final class OcorrenciaBuilder extends BaseOcorrenciaBuilder
{
    use BuilderTrait;

    public function withDevolucao(callable $factory): self
    {
        BuilderContext::child('devolucao');

        $this->devolucao($factory());

        return $this;
    }

    public function withOriginador(callable $factory): self
    {
        BuilderContext::child('originador');

        $this->originador($factory());

        return $this;
    }

    public function withNotaFiscal(callable $factory): self
    {
        BuilderContext::child('notaFiscal');

        $this->notaFiscal($factory());

        return $this;
    }

    public function withConhecimento(callable $factory): self
    {
        BuilderContext::child('conhecimento');

        $this->conhecimento($factory());

        return $this;
    }

    public function withTextoLivre(callable $factory): self
    {
        BuilderContext::child('textoLivre');

        $this->addTextoLivre($factory());

        return $this;
    }

    public function withEmbarque(callable $factory): self
    {
        BuilderContext::child('embarque');

        $this->addEmbarque($factory());

        return $this;
    }

    public function withEvento(
        callable $factory,
        Type $tipoEvento,
    ): self {
        BuilderContext::child(
            lcfirst($tipoEvento->value),
        );

        $this->addEvento($factory($tipoEvento));

        return $this;
    }

    /**
     * @throws \Exception
     */
    public static function create(): OcorrenciaBuilder
    {
        $ocorrencia = OcorrenciaFactory::create();
        $self = new OcorrenciaBuilder();

        $self->codigo = $ocorrencia->getCodigo();
        $self->data = $ocorrencia->getData();
        $self->hora = $ocorrencia->getHora();
        $self->observacaoEntrada = $ocorrencia->getObservacaoEntrada();
        $self->indicacaoEntrega = $ocorrencia->getIndicacaoEntrega();
        $self->notaFiscal = $ocorrencia->getNotaFiscal();
        $self->devolucao = $ocorrencia->getDevolucao();
        $self->originador = $ocorrencia->getOriginador();
        $self->conhecimento = $ocorrencia->getConhecimento();
        $self->textosLivres = $ocorrencia->getTextosLivres();
        $self->embarques = $ocorrencia->getEmbarques();
        $self->eventos = $ocorrencia->getEventos();

        return $self;
    }
}
