<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\NotaFiscal\VolumeBuilder as BaseVolumeBuilder;
use Proceda\Fixtures\Factory\VolumeFactory;

final class VolumeBuilder extends BaseVolumeBuilder
{
    use BuilderTrait;

    public static function create(): VolumeBuilder
    {
        $volume = VolumeFactory::create();
        $self = new VolumeBuilder();

        $self->marca = $volume->getMarca();
        $self->numeracao = $volume->getNumeracao();
        $self->lacre = $volume->getLacre();

        return $self;
    }
}
