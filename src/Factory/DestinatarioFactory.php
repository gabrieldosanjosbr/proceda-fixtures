<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Destinatario;

final class DestinatarioFactory extends Factory
{
    public static function create(): Destinatario
    {
        $isCompany = self::faker()->boolean();

        return new Destinatario(
            nome: self::nome('nome', $isCompany),
            documento: self::documento('documento', $isCompany),
            inscricaoEstadual: self::alphanumeric('inscricaoEstadual'),
            inscricaoSuframa: self::numerify('inscricaoSuframa'),
            endereco: self::rtrim(self::endereco()),
            bairro: self::bairro(),
            cidade: self::cidade(),
            codigoMunicipio: self::numerify('codigoMunicipio'),
            codigoPais: self::type('codigoPais'),
            cep: self::cep(),
            uf: self::uf(),
            areaFrete: self::alphanumeric('areaFrete', 'AR##'),
            numeroComunicacao: self::telefone('numeroComunicacao'),
            estabelecimentoDestino: self::type('estabelecimentoDestino'),
            tipo: self::type('tipo'),
            notasFiscais: [],
        );
    }

    protected static function nome(string $property, bool $company): ?string
    {
        return $company
            ? self::company($property)
            : self::person($property);
    }

    protected static function documento(string $property, bool $company): ?string
    {
        return $company
            ? self::cnpj($property)
            : self::cpf($property);
    }
}
