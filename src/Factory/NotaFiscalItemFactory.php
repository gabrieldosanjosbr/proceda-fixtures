<?php

namespace Proceda\Fixtures\Factory;

use Proceda\NotaFiscal\Item;

final class NotaFiscalItemFactory extends Factory
{
    public static function create(): Item
    {
        return new Item(
            codigo: self::alphanumeric('codigo', 'ITEM-####'),
            descricao: self::descricao(),
            cfop: self::numerify('cfop'),
            lote: self::alphanumeric('lote', 'LOT-#####'),
            dataValidade: self::date('dataValidade'),
            acondicionamento: self::acondicionamento(),
            volume: null,
            idPedidoCliente: self::alphanumeric('idPedidoCliente', 'PED-########'),
            quantidade: self::decimal('quantidade'),
            quantidadeEntregue: self::decimal('quantidadeEntregue'),
        );
    }

    protected static function descricao(): ?string
    {
        if (! self::has('descricao')) {
            return null;
        }

        return self::faker()->randomElement([
            'Arroz Tratamento 1 5kg',
            'Feijão Carioca 1kg',
            'Açúcar Cristal 5kg',
            'Café Torrado e Moído 500g',
            'Leite UHT Integral 1L',
            'Óleo de Soja 900ml',
            'Macarrão Espaguete 500g',
            'Farinha de Trigo 1kg',
            'Detergente Líquido 500ml',
            'Sabão em Pó 1kg',
            'Papel Higiênico Folha Dupla',
            'Água Mineral 500ml',
            'Refrigerante Cola 2L',
            'Chocolate ao Leite 90g',
            'Biscoito Recheado Chocolate',
            'Ração para Cães 15kg',
            'Dipirona 500mg',
            'Paracetamol 750mg',
            'Notebook 15,6"',
            'Monitor LED 24"',
            'Mouse Óptico USB',
            'Teclado USB ABNT2',
            'SSD SATA 480GB',
            'HD Externo 1TB',
            'Memória DDR4 16GB',
            'Cabo de Rede CAT6',
            'Parafuso Sextavado M8',
            'Porca Sextavada M8',
            'Furadeira de Impacto 750W',
            'Chave de Fenda 1/4"',
            'Tinta Acrílica Branca 18L',
            'Cimento CP II 50kg',
            'Tubo PVC 100mm',
            'Bicicleta Aro 29',
            'Bicicleta Infantil Aro 20',
            'Capacete para Ciclista',
            'Pneu 29x2.10',
            'Mesa de Escritório',
            'Cadeira Ergonômica',
            'Armário de Aço',
            'Livro de Programação PHP',
            'Caixa de Papelão 40x40',
            'Filme Stretch',
            'Shampoo 350ml',
            'Sabonete Líquido 250ml',
        ]);
    }
}
