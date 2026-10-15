<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\FreteBuilder as BaseFreteBuilder;
use Proceda\Fixtures\Factory\FreteFactory;

final class FreteBuilder extends BaseFreteBuilder
{
    use BuilderTrait;

    public function withImposto(callable $factory): self
    {
        BuilderContext::child('imposto');

        $this->imposto($factory());

        return $this;
    }

    public static function create(): FreteBuilder
    {
        $frete = FreteFactory::create();
        $self = new FreteBuilder();

        $self->quantidadeVolumes = $frete->getQuantidadeVolumes();
        $self->volume = $frete->getVolume();
        $self->pesoBruto = $frete->getPesoBruto();
        $self->pesoCubado = $frete->getPesoCubado();
        $self->pesoDensidadeCubagem = $frete->getPesoDensidadeCubagem();
        $self->valor = $frete->getValor();
        $self->valorPesoVolume = $frete->getValorPesoVolume();
        $self->adValorem = $frete->getAdValorem();
        $self->freteValor = $frete->getFreteValor();
        $self->valorSecCat = $frete->getValorSecCat();
        $self->valorItr = $frete->getValorItr();
        $self->valorDespacho = $frete->getValorDespacho();
        $self->valorPedagio = $frete->getValorPedagio();
        $self->valorAdeme = $frete->getValorAdeme();
        $self->valorDespesasExtrasAdicionais = $frete->getValorDespesasExtrasAdicionais();
        $self->calculoDiferenciado = $frete->getCalculoDiferenciado();
        $self->tabela = $frete->getTabela();
        $self->condicao = $frete->getCondicao();
        $self->modalidade = $frete->getModalidade();
        $self->imposto = $frete->getImposto();

        return $self;
    }
}
