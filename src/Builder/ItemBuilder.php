<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\NotaFiscal\ItemBuilder as BaseItemBuilder;
use Proceda\Fixtures\Factory\NotaFiscalItemFactory;

final class ItemBuilder extends BaseItemBuilder
{
    use BuilderTrait;

    public static function create(): ItemBuilder
    {
        $item = NotaFiscalItemFactory::create();
        $self = new ItemBuilder();

        $self->codigo = $item->getCodigo();
        $self->descricao = $item->getDescricao();
        $self->cfop = $item->getCfop();
        $self->lote = $item->getLote();
        $self->dataValidade = $item->getDataValidade();
        $self->acondicionamento = $item->getAcondicionamento();
        $self->volume = $item->getVolume();
        $self->idPedidoCliente = $item->getIdPedidoCliente();
        $self->quantidade = $item->getQuantidade();
        $self->quantidadeEntregue = $item->getQuantidadeEntregue();

        return $self;
    }
}
