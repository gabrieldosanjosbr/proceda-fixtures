<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Documento\Conemb;
use Proceda\Documento\Doccob;
use Proceda\Documento\Notfis;
use Proceda\Documento\Ocoren;

final class DocumentoFactory extends Factory
{
    public static function createNotfis(): Notfis
    {
        return new Notfis(
            identificacao: self::alphanumeric('identificacao'),
            qtdDocumentos: self::number('qtdDocumentos', 1, 10),
            valorTotal: self::decimal('valorTotal'),
            pesoBruto: self::decimal('pesoBruto'),
            totalVolumes: self::decimal('totalVolumes'),
            pesoDensidadeCubagem: self::decimal('pesoDensidadeCubagem'),
            valorCobradoCliente: self::decimal('valorCobradoCliente'),
            valorSeguro: self::decimal('valorSeguro'),
            embarcadoras: [],
        );
    }

    public static function createOcoren(): Ocoren
    {
        return new Ocoren(
            identificacao: self::alphanumeric('identificacao'),
            qtdDocumentos: self::number('qtdDocumentos', 1, 10),
            transportador: null,
        );
    }

    public static function createDoccob(): Doccob
    {
        return new Doccob(
            identificacao: self::alphanumeric('identificacao'),
            qtdDocumentos: self::number('qtdDocumentos', 1, 10),
            valorTotal: self::decimal('valorTotal'),
            transportador: null,
        );
    }

    public static function createConemb(): Conemb
    {
        return new Conemb(
            identificacao: self::alphanumeric('identificacao'),
            qtdDocumentos: self::number('qtdDocumentos', 1, 10),
            valorTotal: self::decimal('valorTotal'),
            transportador: null,
        );
    }
}
