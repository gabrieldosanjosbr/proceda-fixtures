<?php

namespace Proceda\Fixtures\Scenario;

use Proceda\Fixtures\Builder\ConhecimentoBuilder;
use Proceda\Fixtures\Builder\EmpresaBuilder;
use Proceda\Fixtures\Builder\IntercambioBuilder;
use Proceda\Fixtures\Builder\NotaFiscalBuilder;
use Proceda\Fixtures\Builder\OcorenBuilder;
use Proceda\Fixtures\Builder\OcorrenciaBuilder;
use Proceda\Fixtures\Builder\TextoLivreBuilder;
use Proceda\Fixtures\Builder\TransportadorBuilder;
use Proceda\Intercambio;
use Proceda\Proceda;
use Proceda\Schema\LayoutVersion;

final class OcorenV31 extends Scenario
{
    public static function allFields(): Intercambio
    {
        self::initialize(
            Proceda::ocoren(
                layoutVersion: LayoutVersion::V31,
            )
        );

        $ocorrencia = OcorrenciaBuilder::lazy(
            fn(OcorrenciaBuilder $builder) =>
            $builder
                ->withTextoLivre(TextoLivreBuilder::lazy())
                ->withOriginador(ConhecimentoBuilder::lazy())
                ->withNotaFiscal(NotaFiscalBuilder::lazy()),
        );

        $transportador = TransportadorBuilder::lazy(
            fn(TransportadorBuilder $builder) =>
            $builder
                ->withEmpresa(EmpresaBuilder::lazy())
                ->withOcorrencia($ocorrencia)
                ->withOcorrencia($ocorrencia)
                ->withOcorrencia($ocorrencia),
        );

        $ocoren = OcorenBuilder::lazy(
            fn(OcorenBuilder $builder) =>
            $builder->withTransportador($transportador),
        );

        return IntercambioBuilder::create()
            ->withDocumento($ocoren)
            ->withDocumento($ocoren)
            ->build();
    }
}