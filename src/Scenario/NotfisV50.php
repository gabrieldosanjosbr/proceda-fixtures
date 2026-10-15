<?php

namespace Proceda\Fixtures\Scenario;

use Proceda\Fixtures\Builder\CargaBuilder;
use Proceda\Fixtures\Builder\ConhecimentoBuilder;
use Proceda\Fixtures\Builder\DestinatarioBuilder;
use Proceda\Fixtures\Builder\EmbarcadorBuilder;
use Proceda\Fixtures\Builder\EmpresaBuilder;
use Proceda\Fixtures\Builder\EventoBuilder;
use Proceda\Fixtures\Builder\FreteBuilder;
use Proceda\Fixtures\Builder\ImpostoBuilder;
use Proceda\Fixtures\Builder\IntercambioBuilder;
use Proceda\Fixtures\Builder\ItemBuilder;
use Proceda\Fixtures\Builder\NfeBuilder;
use Proceda\Fixtures\Builder\NotaFiscalBuilder;
use Proceda\Fixtures\Builder\NotfisBuilder;
use Proceda\Fixtures\Builder\TributoBuilder;
use Proceda\Fixtures\Factory\Factory;
use Proceda\Fixtures\Factory\TypeFactory;
use Proceda\Intercambio;
use Proceda\Proceda;
use Proceda\Schema\LayoutVersion;

final class NotfisV50 extends Scenario
{
    public static function requiredFields(): Intercambio
    {
        $schemaManager = Proceda::notfis(
            layoutVersion: LayoutVersion::V50,
        )->getSchemaManager();

        $notaFiscal = NotaFiscalBuilder::new(
                $schemaManager->findByPath('destinatario/nota-fiscal')
            )
            ->numero(Factory::numerify('numero'))
            ->dataEmissao(Factory::date('dataEmissao'))
            ->quantidadeVolumes(Factory::number('quantidadeVolumes', 1, 10))
            ->pesoBruto(Factory::decimal('pesoBruto'))
            ->seguroEfetuado(Factory::boolean('seguroEfetuado'))
            ->valor(Factory::decimal('valor'))
            ->carga(
                CargaBuilder::new(
                        $schemaManager->findByPath('nota-fiscal/carga')
                    )
                    ->natureza(Factory::natureza())
                    ->acondicionamento(Factory::acondicionamento())
                    ->condicaoPeriodoEntrega(
                        TypeFactory::get(
                            'NotaFiscal/Carga/CondicaoPeriodoEntrega/SemDataEntregaDefinida',
                        )
                    )
                    ->build()
            )
            ->frete(
                FreteBuilder::new(
                        $schemaManager->findByPath('nota-fiscal/frete')
                    )
                    ->condicao(
                        TypeFactory::get('Frete/Condicao/CIF')
                    )
                    ->build()
            )
            ->imposto(
                ImpostoBuilder::new(
                    $schemaManager->findByPath('nota-fiscal/imposto')
                    )
                    ->incidenciaIcms(
                        TypeFactory::get(
                            'Imposto/IncidenciaIcms/Isento',
                        )
                    )
                    ->build()
            )
            ->build();

        $destinatario = DestinatarioBuilder::new(
                $schemaManager->findByPath('embarcador/destinatario')
            )
            ->nome(Factory::person('nome'))
            ->documento(Factory::cpf('documento'))
            ->cep(Factory::cep())
            ->uf(Factory::uf())
            ->addNotaFiscal($notaFiscal)
            ->build();

        $embarcador = EmbarcadorBuilder::new(
                $schemaManager->findByPath('documento/embarcador')
            )
            ->empresa(
                EmpresaBuilder::new(
                        $schemaManager->findByPath('embarcador/empresa')
                    )
                    ->cnpj(Factory::cnpj())
                    ->cep(Factory::cep())
                    ->build()
            )
            ->addDestinatario($destinatario)
            ->build();

        $notfis = NotfisBuilder::new(
                $schemaManager->findByPath('intercambio/documento')
            )
            ->identificacao(
                Factory::alphanumeric('identificacao', 'NOTFISV50####')
            )
            ->valorTotal(500.00)
            ->pesoBruto(Factory::decimal('pesoBruto'))
            ->totalVolumes(10)
            ->addEmbarcador($embarcador)
            ->build();

        return IntercambioBuilder::new(
                $schemaManager->findByPath('intercambio')
            )
            ->remetente(Factory::company('remetente'))
            ->data(Factory::date('data'))
            ->hora(Factory::time('hora'))
            ->identificacao(
                Factory::alphanumeric('identificacao', 'NOTV50#####')
            )
            ->destinatario('DESTINATARIO EXEMPLO')
            ->addDocumento($notfis)
            ->build();
    }

    public static function allFields(): Intercambio
    {
        self::initialize(
            Proceda::notfis(
                layoutVersion: LayoutVersion::V50,
            )
        );

        $notaFiscal = NotaFiscalBuilder::lazy(
            fn(NotaFiscalBuilder $builder) =>
            $builder
                ->withItem(ItemBuilder::lazy())
                ->withConsignatario(EmpresaBuilder::lazy())
                ->withCarga(CargaBuilder::lazy(
                    fn(CargaBuilder $builder) =>
                    $builder
                        ->withInicioEntrega(
                            EventoBuilder::lazy(),
                            TypeFactory::get(
                                'Evento/Tipo/InicioEntrega',
                            ),
                        )
                        ->withFimEntrega(
                            EventoBuilder::lazy(),
                            TypeFactory::get(
                                'Evento/Tipo/FimEntrega',
                            ),
                        ),
                ))
                ->withImposto(ImpostoBuilder::lazy())
                ->withFrete(FreteBuilder::lazy()),
        );

        $destinatario = DestinatarioBuilder::lazy(
            fn(DestinatarioBuilder $builder) =>
            $builder
                ->withLocalEntregaNotaFiscal(DestinatarioBuilder::lazy())
                ->withNotaFiscal($notaFiscal)
                ->withNotaFiscal($notaFiscal),
        );

        $notfis = NotfisBuilder::lazy(
            fn(NotfisBuilder $builder) =>
            $builder->withEmbarcador(EmbarcadorBuilder::lazy(
                fn(EmbarcadorBuilder $embarcador) =>
                $embarcador
                    ->withEmpresa(EmpresaBuilder::lazy())
                    ->withLocalColetaNotaFiscal(EmpresaBuilder::lazy())
                    ->withDestinatario($destinatario)
                    ->withDestinatario($destinatario)
                    ->withDestinatario($destinatario),
            )),
        );

        return IntercambioBuilder::create()
            ->withDocumento($notfis)
            ->withDocumento($notfis)
            ->withDocumento($notfis)
            ->build();
    }

    public static function freteFallback(
        float $freteValor,
        float $icms
    ): Intercambio {
        self::initialize(
            Proceda::notfis(
                layoutVersion: LayoutVersion::V50,
            )
        );

        $frete = FreteBuilder::new()
            ->valor($freteValor)
            ->imposto(
                ImpostoBuilder::new()
                    ->addTributo(
                        TributoBuilder::new()
                            ->tipo(
                                TypeFactory::get(
                                    'Imposto/Tributo/Tipo/Icms',
                                )
                            )
                            ->valor($icms)
                            ->build()
                    )
                    ->build()
            )
            ->build();

        $notaFiscal = NotaFiscalBuilder::lazy(
            fn(NotaFiscalBuilder $builder) =>
            $builder
                ->frete($frete)
                ->withItem(ItemBuilder::lazy())
                ->withConsignatario(EmpresaBuilder::lazy())
                ->withRedespacho(ConhecimentoBuilder::lazy(
                    fn(ConhecimentoBuilder $builder) =>
                    $builder->withResponsavel(EmpresaBuilder::lazy()),
                ))
                ->withEntregaCasada(NotaFiscalBuilder::lazy())
                ->withNfe(NfeBuilder::lazy()),
        );

        $destinatario = DestinatarioBuilder::lazy(
            fn(DestinatarioBuilder $builder) =>
            $builder->withNotaFiscal($notaFiscal),
        );

        $notfis = NotfisBuilder::lazy(
            fn(NotfisBuilder $notfis) =>
            $notfis->withEmbarcador(EmbarcadorBuilder::lazy(
                fn(EmbarcadorBuilder $builder) =>
                $builder
                    ->withEmpresa(EmpresaBuilder::lazy())
                    ->withDestinatario($destinatario),
            )),
        );

        return IntercambioBuilder::create()
            ->withDocumento($notfis)
            ->build();
    }
}