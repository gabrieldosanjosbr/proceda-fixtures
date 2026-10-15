<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\TextoLivreBuilder as BaseTextoLivreBuilder;
use Proceda\Fixtures\Factory\TextoLivreFactory;

final class TextoLivreBuilder extends BaseTextoLivreBuilder
{
    use BuilderTrait;

    /**
     * @throws \Exception
     */
    public static function create(): TextoLivreBuilder
    {
        $textoLivre = TextoLivreFactory::create();
        $self = new TextoLivreBuilder();

        $self->texto = $textoLivre->getTexto();

        return $self;
    }
}
