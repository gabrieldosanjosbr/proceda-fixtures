<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\NotaFiscal\CargaBuilder as BaseCargaBuilder;
use Proceda\Fixtures\Factory\CargaFactory;
use Proceda\Type;

final class CargaBuilder extends BaseCargaBuilder
{
    use BuilderTrait;

    public function withInicioEntrega(
        callable $factory,
        Type $tipoEvento,
    ): self {
        BuilderContext::child(
            lcfirst($tipoEvento->value),
        );

        $this->inicioEntrega($factory($tipoEvento));

        return $this;
    }

    public function withFimEntrega(
        callable $factory,
        Type $tipoEvento,
    ): self {
        BuilderContext::child(
            lcfirst($tipoEvento->value),
        );

        $this->fimEntrega($factory($tipoEvento));

        return $this;
    }

    public static function create(): CargaBuilder
    {
        $carga = CargaFactory::create();
        $self = new CargaBuilder();

        $self->tipo = $carga->getTipo();
        $self->modalidade = $carga->getModalidade();
        $self->natureza = $carga->getNatureza();
        $self->acondicionamento = $carga->getAcondicionamento();
        $self->planoCargaRapida = $carga->getPlanoCargaRapida();
        $self->dataEmbarque = $carga->getDataEmbarque();
        $self->localDesembarque = $carga->getLocalDesembarque();
        $self->condicaoPeriodoEntrega = $carga->getCondicaoPeriodoEntrega();
        $self->inicioEntrega = $carga->getInicioEntrega();
        $self->fimEntrega = $carga->getFimEntrega();

        return $self;
    }
}
