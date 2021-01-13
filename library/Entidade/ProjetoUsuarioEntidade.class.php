<?php

/**
 * Projeto.Entidade [ ENTIDADE ]
 * @copyright (c) 2018, Leo Bessa
 */

class ProjetoUsuarioEntidade extends AbstractEntidade
{
    const TABELA = SCHEMA . '.TB_PROJETO_USUARIO';
    const ENTIDADE = 'ProjetoUsuarioEntidade';
    const CHAVE = CO_PROJETO;

    private $co_projeto_usuario;
    private $co_projeto;
    private $co_usuario;


    /**
     * @return array
     */
    public static function getCampos()
    {
        return [
            CO_PROJETO_USUARIO,
            CO_PROJETO,
            CO_USUARIO,
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
     * @return mixed
     */
    public function getCoProjetoUsuario()
    {
        return $this->co_projeto_usuario;
    }

    /**
     * @param mixed $co_projeto_usuario
     */
    public function setCoProjetoUsuario($co_projeto_usuario)
    {
        $this->co_projeto_usuario = $co_projeto_usuario;
    }

    /**
     * @return ProjetoEntidade $co_projeto
     */
    public function getCoProjeto()
    {
        return $this->co_projeto;
    }

    /**
     * @param mixed $co_projeto
     */
    public function setCoProjeto($co_projeto)
    {
        $this->co_projeto = $co_projeto;
    }

    /**
     * @return UsuarioEntidade $co_usuario
     */
    public function getCoUsuario()
    {
        return $this->co_usuario;
    }

    /**
     * @param mixed $co_usuario
     */
    public function setCoUsuario($co_usuario)
    {
        $this->co_usuario = $co_usuario;
    }


}