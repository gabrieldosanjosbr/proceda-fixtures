<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\NotaFiscalBuilder as BaseNotaFiscalBuilder;
use Proceda\Fixtures\Factory\NotaFiscalFactory;

final class NotaFiscalBuilder extends BaseNotaFiscalBuilder
{
    use BuilderTrait;

    public function withDestinatario(callable $factory): self
    {
        BuilderContext::child('destinatario');

        $this->destinatario($factory());

        return $this;
    }

    public function withEmissor(callable $factory): self
    {
        BuilderContext::child('emissor');

        $this->emissor(
            $factory(),
        );

        return $this;
    }

    public function withConsignatario(callable $factory): self
    {
        BuilderContext::child('consignatario');

        $this->consignatario(
            $factory(),
        );

        return $this;
    }

    public function withRedespacho(callable $factory): self
    {
        BuilderContext::child('redespacho');

        $this->redespacho($factory());

        return $this;
    }

    public function withFrete(callable $factory): self
    {
        BuilderContext::child('frete');

        $this->frete($factory());

        return $this;
    }

    public function withEntregaCasada(callable $factory): self
    {
        BuilderContext::child('entregaCasada');

        $this->addEntregaCasada($factory());

        return $this;
    }

    public function withNfe(callable $factory): self
    {
        BuilderContext::child('nfe');

        $this->nfe($factory());

        return $this;
    }

    public function withItem(callable $factory): self
    {
        BuilderContext::child('item');

        $this->addItem($factory());

        return $this;
    }

    public function withImposto(callable $factory): self
    {
        BuilderContext::child('imposto');

        $this->imposto($factory());

        return $this;
    }

    public function withCarga(callable $factory): self
    {
        BuilderContext::child('carga');

        $this->carga($factory());

        return $this;
    }

    public function withLocalColeta(callable $factory): self
    {
        BuilderContext::child('localColeta');

        $this->localColeta($factory());

        return $this;
    }

    public function withVeiculo(callable $factory): self
    {
        BuilderContext::child('veiculo');

        $this->veiculo($factory());

        return $this;
    }

    public static function create(): NotaFiscalBuilder
    {
        $notaFiscal = NotaFiscalFactory::create();
        $self = new NotaFiscalBuilder();

        $self->numero = $notaFiscal->getNumero();
        $self->serie = $notaFiscal->getSerie();
        $self->valor = $notaFiscal->getValor();
        $self->emissor = $notaFiscal->getEmissor();
        $self->dataEmissao = $notaFiscal->getDataEmissao();
        $self->romaneio = $notaFiscal->getRomaneio();
        $self->codigoRota = $notaFiscal->getCodigoRota();
        $self->seguroEfetuado = $notaFiscal->getSeguroEfetuado();
        $self->indicacaoBonificacao = $notaFiscal->getIndicacaoBonificacao();
        $self->quantidadeVolumes = $notaFiscal->getQuantidadeVolumes();
        $self->pesoDensidadeCubagem = $notaFiscal->getPesoDensidadeCubagem();
        $self->valorSeguro = $notaFiscal->getValorSeguro();
        $self->valorCobradoCliente = $notaFiscal->getValorCobradoCliente();
        $self->valorTaxas = $notaFiscal->getValorTaxas();
        $self->idPedidoCliente = $notaFiscal->getIdPedidoCliente();
        $self->desdobro = $notaFiscal->getDesdobro();
        $self->cfop = $notaFiscal->getCfop();
        $self->pesoBruto = $notaFiscal->getPesoBruto();
        $self->pesoLiquido = $notaFiscal->getPesoLiquido();
        $self->pesoCubado = $notaFiscal->getPesoCubado();
        $self->valorOutrasDespesasAcessorias = $notaFiscal->getValorOutrasDespesasAcessorias();
        $self->ufFatoGerador = $notaFiscal->getUfFatoGerador();
        $self->devolucao = $notaFiscal->getDevolucao();
        $self->acaoDocumento = $notaFiscal->getAcaoDocumento();
        $self->destinatario = $notaFiscal->getDestinatario();
        $self->carga = $notaFiscal->getCarga();
        $self->nfe = $notaFiscal->getNfe();
        $self->documentoFiscal = $notaFiscal->getDocumentoFiscal();
        $self->imposto = $notaFiscal->getImposto();
        $self->frete = $notaFiscal->getFrete();
        $self->veiculo = $notaFiscal->getVeiculo();
        $self->meioTransporte = $notaFiscal->getMeioTransporte();
        $self->transportador = $notaFiscal->getTransportador();
        $self->consignatario = $notaFiscal->getConsignatario();
        $self->localColeta = $notaFiscal->getLocalColeta();
        $self->redespacho = $notaFiscal->getRedespacho();
        $self->items = $notaFiscal->getItems();
        $self->entregasCasadas = $notaFiscal->getEntregasCasadas();
        $self->volumes = $notaFiscal->getVolumes();
        $self->embarques = $notaFiscal->getEmbarques();

        return $self;
    }
}
