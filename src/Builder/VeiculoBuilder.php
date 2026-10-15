<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\VeiculoBuilder as BaseVeiculoBuilder;
use Proceda\Fixtures\Factory\VeiculoFactory;

final class VeiculoBuilder extends BaseVeiculoBuilder
{
    use BuilderTrait;

    public static function create(): VeiculoBuilder
    {
        $veiculo = VeiculoFactory::create();
        $self = new VeiculoBuilder();

        $self->tipo = $veiculo->getTipo();
        $self->placa = $veiculo->getPlaca();

        return $self;
    }
}
