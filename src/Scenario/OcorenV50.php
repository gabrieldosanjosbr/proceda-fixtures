<?php

namespace Proceda\Fixtures\Scenario;

use Proceda\Fixtures\Builder\ConhecimentoBuilder;
use Proceda\Fixtures\Builder\EmbarqueBuilder;
use Proceda\Fixtures\Builder\EmpresaBuilder;
use Proceda\Fixtures\Builder\EventoBuilder;
use Proceda\Fixtures\Builder\IntercambioBuilder;
use Proceda\Fixtures\Builder\ItemBuilder;
use Proceda\Fixtures\Builder\NotaFiscalBuilder;
use Proceda\Fixtures\Builder\OcorenBuilder;
use Proceda\Fixtures\Builder\OcorrenciaBuilder;
use Proceda\Fixtures\Builder\TransportadorBuilder;
use Proceda\Fixtures\Factory\TypeFactory;
use Proceda\Intercambio;
use Proceda\Proceda;
use Proceda\Schema\LayoutVersion;
use Proceda\TextoLivre;

final class OcorenV50 extends Scenario
{
    public static function allFields(): Intercambio
    {
        self::initialize(
            Proceda::ocoren(
                layoutVersion: LayoutVersion::V50,
            )
        );

        $ocorrencia = OcorrenciaBuilder::lazy(
            fn(OcorrenciaBuilder $builder) =>
            $builder
                ->addTextoLivre(new TextoLivre('Um texto qualquer v50'))
                ->withOriginador(ConhecimentoBuilder::lazy())
                ->withConhecimento(ConhecimentoBuilder::lazy())
                ->withDevolucao(NotaFiscalBuilder::lazy())
                ->withEmbarque(EmbarqueBuilder::lazy())
                ->withNotaFiscal(NotaFiscalBuilder::lazy(
                    fn(NotaFiscalBuilder $builder) =>
                    $builder
                        ->withEmissor(EmpresaBuilder::lazy())
                        ->withItem(ItemBuilder::lazy()),
                ))
                ->withEvento(
                    EventoBuilder::lazy(),
                    TypeFactory::get(
                        'Evento/Tipo/InicioDescarregamento',
                    ),
                )
                ->withEvento(
                    EventoBuilder::lazy(),
                    TypeFactory::get(
                        'Evento/Tipo/TerminoDescarregamento',
                    ),
                ),
        );

        $transportador = TransportadorBuilder::lazy(
            fn(TransportadorBuilder $builder) =>
            $builder
                ->withEmpresa(EmpresaBuilder::lazy())
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