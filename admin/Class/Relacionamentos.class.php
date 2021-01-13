<?php

/**
 * Relacionamentos.class [ RELACIONAMENTOS DO BANCO ]
 * @copyright (c) 2018, Leo Bessa
 */

class Relacionamentos
{

    public static function getRelacionamentos()
    {
        return array(
            (AcessoEntidade::TABELA) => array(
                (CO_USUARIO) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (UsuarioEntidade::TABELA) => array(
                (CO_ACESSO) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'AcessoEntidade',
                    ('Tipo') => '2',
                ),

                (CO_IMAGEM) => array(
                    ('Campo') => CO_IMAGEM,
                    ('Entidade') => 'ImagemEntidade',
                    ('Tipo') => '1',
                ),
                (CO_PESSOA) => array(
                    ('Campo') => CO_PESSOA,
                    ('Entidade') => 'PessoaEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (PessoaEntidade::TABELA) => array(
                (CO_USUARIO) => array(
                    ('Campo') => CO_PESSOA,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (ImagemEntidade::TABELA) => array(),
            (ProjetoEntidade::TABELA) => array(
                (CO_PROJETO) => array(
                    ('Campo') => CO_PROJETO,
                    ('Entidade') => 'ProjetoUsuarioEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (ProjetoUsuarioEntidade::TABELA) => array(
                (CO_USUARIO) => array(
                    ('Campo') => CO_PESSOA,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
                (CO_PROJETO) => array(
                    ('Campo') => CO_PROJETO,
                    ('Entidade') => 'ProjetoEntidade',
                    ('Tipo') => '1',
                ),
            ),
        );
    }
}




















