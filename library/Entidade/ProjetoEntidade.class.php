<?php

/**
 * Projeto.Entidade [ ENTIDADE ]
 * @copyright (c) 2018, Leo Bessa
 */

class ProjetoEntidade extends AbstractEntidade
{
    const TABELA = SCHEMA . '.TB_PROJETO';
    const ENTIDADE = 'ProjetoEntidade';
    const CHAVE = CO_PROJETO;

    private $co_projeto;
    private $no_projeto;
    private $dt_cadastro;
    private $no_pasta;


    /**
     * @return array
     */
    public static function getCampos()
    {
        return [
            CO_PROJETO,
            NO_PROJETO,
            NO_PASTA,
            DT_CADASTRO,
        ];
    }

    /**
     * @return array $relacionamentos
     */
    public static function getRelacionamentos()
    {
        $relacionamentos = Relacionamentos::getRelacionamentos();
        return $relacionamentos[static::TABELA];
    }


    /**
     * @return int $co_projeto
     */
    public function getCoProjeto()
    {
        return $this->co_projeto;
    }

    /**
     * @param $co_projeto
     * @return mixed
     */
    public function setCoProjeto($co_projeto)
    {
        return $this->co_projeto = $co_projeto;
    }

    /**
     * @return mixed $no_projeto
     */
    public function getNoProjeto()
    {
        return $this->no_projeto;
    }

    /**
     * @param $no_projeto
     * @return mixed
     */
    public function setNoProjeto($no_projeto)
    {
        return $this->no_projeto = $no_projeto;
    }

    /**
     * @return mixed $dt_cadastro
     */
    public function getDtCadastro()
    {
        return $this->dt_cadastro;
    }

    /**
     * @param $dt_cadastro
     * @return mixed
     */
    public function setDtCadastro($dt_cadastro)
    {
        return $this->dt_cadastro = $dt_cadastro;
    }

    /**
     * @return mixed
     */
    public function getNoPasta()
    {
        return $this->no_pasta;
    }

    /**
     * @param mixed $no_pasta
     */
    public function setNoPasta($no_pasta)
    {
        $this->no_pasta = $no_pasta;
    }

}