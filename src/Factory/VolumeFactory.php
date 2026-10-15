<?php

namespace Proceda\Fixtures\Factory;

use Proceda\NotaFiscal\Volume;

final class VolumeFactory extends Factory
{
    public static function create(): Volume
    {
        return new Volume(
            marca: self::marcaVolume('marca'),
            numeracao: self::alphanumeric('numeracao', 'VOL-#####'),
            lacre: self::alphanumeric('lacre', 'LAC-#####'),
        );
    }
}
