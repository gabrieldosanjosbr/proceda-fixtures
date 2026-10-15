<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Empresa;

final class EmpresaFactory extends Factory
{
    public static function create(): Empresa
    {
        return new Empresa(
            codigo: self::alphanumeric('codigo', 'COD-#'),
            nome: self::company('nome'),
            cnpj: self::numerify('cnpj'),
            inscricaoEstadual: self::numerify('inscricaoEstadual'),
            inscricaoMunicipal: self::numerify('inscricaoMunicipal'),
            endereco: self::rtrim(self::endereco()),
            bairro: self::bairro(),
            cep: self::cep(),
            cidade: self::cidade(),
            uf: self::uf(),
            areaFrete: self::alpha('areaFrete'),
            codigoMunicipio: self::numerify('codigoMunicipio'),
            numeroComunicacao: self::telefone('numeroComunicacao'),
            filial: null,
        );
    }
}
