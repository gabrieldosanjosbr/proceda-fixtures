<?php

namespace Proceda\Fixtures\Scenario;

use Proceda\Fixtures\Builder\CargaBuilder;
use Proceda\Fixtures\Builder\DestinatarioBuilder;
use Proceda\Fixtures\Builder\EmbarcadorBuilder;
use Proceda\Fixtures\Builder\EmpresaBuilder;
use Proceda\Fixtures\Builder\FreteBuilder;
use Proceda\Fixtures\Builder\ImpostoBuilder;
use Proceda\Fixtures\Builder\IntercambioBuilder;
use Proceda\Fixtures\Builder\ItemBuilder;
use Proceda\Fixtures\Builder\NotaFiscalBuilder;
use Proceda\Fixtures\Builder\NotfisBuilder;
use Proceda\Fixtures\Builder\TributoBuilder;
use Proceda\Fixtures\Builder\VeiculoBuilder;
use Proceda\Intercambio;
use Proceda\Proceda;
use Proceda\Schema\LayoutVersion;

final class NotfisV31 extends Scenario
{
    public static function allFields(): Intercambio
    {
        self::initialize(
            Proceda::notfis(
                layoutVersion: LayoutVersion::V31,
            )
        );

        $notaFiscal = NotaFiscalBuilder::lazy(
            fn(NotaFiscalBuilder $notaFiscal) =>
            $notaFiscal
                ->withItem(ItemBuilder::lazy())
                ->withItem(ItemBuilder::lazy())
                ->withItem(ItemBuilder::lazy())
                ->withItem(ItemBuilder::lazy())
                ->withItem(ItemBuilder::lazy())
                ->withConsignatario(EmpresaBuilder::lazy())
                ->withFrete(FreteBuilder::lazy())
                ->withCarga(CargaBuilder::lazy())
                ->withEntregaCasada(
                    NotaFiscalBuilder::lazy(
                        fn(NotaFiscalBuilder $builder) =>
                        $builder->withEmissor(EmpresaBuilder::lazy()),
                    ),
                )
                ->withImposto(
                    ImpostoBuilder::lazy(
                        fn(ImpostoBuilder $builder) =>
                        $builder->withTributo(
                            'icms',
                            TributoBuilder::lazy(),
                        ),
                    ),
                )
                ->withVeiculo(VeiculoBuilder::lazy()),
        );

        $destinatario = DestinatarioBuilder::lazy(
            fn(DestinatarioBuilder $destinatario) =>
            $destinatario
                ->withNotaFiscal($notaFiscal)
                ->withNotaFiscal($notaFiscal)
                ->withNotaFiscal($notaFiscal),
        );

        $notfis = NotfisBuilder::lazy(
            fn(NotfisBuilder $notfis) =>
            $notfis->withEmbarcador(
                EmbarcadorBuilder::lazy(
                    fn(EmbarcadorBuilder $embarcador) =>
                    $embarcador
                        ->withEmpresa(EmpresaBuilder::lazy())
                        ->withDestinatario($destinatario),
                ),
            ),
        );

        return IntercambioBuilder::create()
            ->withDocumento($notfis)
            ->withDocumento($notfis)
            ->withDocumento($notfis)
            ->build();
    }
}