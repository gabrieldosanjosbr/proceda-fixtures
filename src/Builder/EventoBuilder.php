<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\EventoBuilder as BaseEventoBuilder;
use Proceda\Fixtures\Factory\EventoFactory;
use Proceda\Type;

final class EventoBuilder extends BaseEventoBuilder
{
    use BuilderTrait;

    public static function create(Type $tipoEvento): EventoBuilder
    {
        $evento = EventoFactory::create($tipoEvento);
        $self = new EventoBuilder();

        $self->tipo = $evento->getTipo();
        $self->data = $evento->getData();
        $self->hora = $evento->getHora();

        return $self;
    }
}
