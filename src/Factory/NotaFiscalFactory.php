<?php

namespace Proceda\Fixtures\Factory;

use Proceda\NotaFiscal;

final class NotaFiscalFactory extends Factory
{
    public static function create(): NotaFiscal
    {
        return new NotaFiscal(
            numero: self::numerify('numero'),
            serie: self::numerify('serie'),
            valor: self::decimal('valor'),
            emissor: null,
            dataEmissao: self::date('dataEmissao'),
            romaneio: self::alphanumeric('romaneio', 'ROM-####'),
            codigoRota: self::alphanumeric('codigoRota', 'R###'),
            seguroEfetuado: self::boolean('seguroEfetuado'),
            indicacaoBonificacao: self::boolean('indicacaoBonificacao'),
            quantidadeVolumes: self::decimal('quantidadeVolumes'),
            pesoDensidadeCubagem: self::decimal('pesoDensidadeCubagem'),
            valorSeguro: self::decimal('valorSeguro'),
            valorCobradoCliente: self::decimal('valorCobradoCliente'),
            valorTaxas: self::decimal('valorTaxas'),
            idPedidoCliente: self::alphanumeric('idPedidoCliente', 'ID-####'),
            desdobro: self::alphanumeric('desdobro', 'DES-######'),
            cfop: self::numerify('cfop'),
            pesoBruto: self::decimal('pesoBruto'),
            pesoLiquido: self::decimal('pesoLiquido'),
            pesoCubado: self::decimal('pesoCubado'),
            valorOutrasDespesasAcessorias: self::decimal('valorOutrasDespesasAcessorias'),
            ufFatoGerador: self::uf('ufFatoGerador'),
            devolucao: self::boolean('devolucao'),
            acaoDocumento: self::type('acaoDocumento'),
            nfe: null,
            redespacho: null,
            documentoFiscal: self::type('tipoDocumentoFiscal'),
            imposto: null,
            frete: null,
            veiculo: null,
            meioTransporte: self::type('meioTransporte'),
            transportador: null,
            consignatario: null,
            localColeta: null,
            items: [],
            entregasCasadas: [],
            volumes: [],
            embarques: [],
        );
    }
}
