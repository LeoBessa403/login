<?php

/**
 * AlunoValidador [ VALIDATOR ]
 * @copyright (c) 2020, Leo Bessa
 */
class  AlunoValidador extends AbstractValidador
{
    private $retorno = [
        SUCESSO => true,
        MSG => [],
        DADOS => []
    ];

    public function validarCadastro($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[NO_PESSOA], 2, 'Nome Completo'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[DS_EMAIL], AbstractValidador::VALIDACAO_EMAIL, 'E-mail'
        );
        return $this->MontaRetorno($this->retorno);
    }
}