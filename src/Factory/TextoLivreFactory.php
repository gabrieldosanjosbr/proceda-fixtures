<?php

namespace Proceda\Fixtures\Factory;

use Proceda\TextoLivre;

final class TextoLivreFactory extends Factory
{
    public static function create(): TextoLivre
    {
        return new TextoLivre(
            texto: self::sentence('texto'),
        );
    }
}
