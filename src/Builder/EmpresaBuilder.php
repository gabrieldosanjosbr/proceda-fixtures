<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Builder\EmpresaBuilder as BaseEmpresaBuilder;
use Proceda\Fixtures\Factory\EmpresaFactory;

final class EmpresaBuilder extends BaseEmpresaBuilder
{
    use BuilderTrait;

    public function withUnidade(callable $factory): self
    {
        BuilderContext::child('filial');

        $this->filial($factory());

        return $this;
    }

    public static function create(): EmpresaBuilder
    {
        $empresa = EmpresaFactory::create();
        $self = new EmpresaBuilder();

        $self->codigo = $empresa->getCodigo();
        $self->nome = $empresa->getNome();
        $self->cnpj = $empresa->getCnpj();
        $self->inscricaoEstadual = $empresa->getInscricaoEstadual();
        $self->inscricaoMunicipal = $empresa->getInscricaoMunicipal();
        $self->endereco = $empresa->getEndereco();
        $self->bairro = $empresa->getBairro();
        $self->cep = $empresa->getCep();
        $self->cidade = $empresa->getCidade();
        $self->uf = $empresa->getUf();
        $self->codigoMunicipio = $empresa->getCodigoMunicipio();
        $self->numeroComunicacao = $empresa->getNumeroComunicacao();
        $self->areaFrete = $empresa->getAreaFrete();
        $self->filial = $empresa->getFilial();

        return $self;
    }
}
