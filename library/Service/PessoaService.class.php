<?php

/**
 * PessoaService.class [ SEVICE ]
 * @copyright (c) 2017, Leo Bessa
 */
class  PessoaService extends AbstractService
{

    public function __construct()
    {
        parent::__construct(PessoaEntidade::ENTIDADE);
    }

    /**
     * @param PessoaEntidade $pessoa
     * @param array $dados
     * @return array
     */
    public function getArrayDadosPessoa(PessoaEntidade $pessoa, array $dados)
    {
        $dados[CO_PESSOA] = $pessoa->getCoPessoa();
        $dados[NU_CPF] = ($pessoa->getNuCpf()) ? Valida::MascaraCpf($pessoa->getNuCpf()) : null;
        $dados[NU_RG] = $pessoa->getNuRg();
        $dados[DT_NASCIMENTO] = (!empty($pessoa->getDtNascimento())) ? Valida::DataShow($pessoa->getDtNascimento()) : null;
        $dados[ST_SEXO] = $pessoa->getStSexo();
        $dados[NO_PESSOA] = $pessoa->getNoPessoa();

        return $dados;
    }

}