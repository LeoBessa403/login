<?php
/**
 * Class TipoAssunto
 */
class TipoImagemEnum extends AbstractEnum
{
    const PERFIL_USUARIO = 1;
    const CAPA_LIVRO = 2;
    const CAPA_CAPITULO = 3;
    const CONTEUDO_LIVRO = 4;

    public static $descricao = [
        TipoImagemEnum::PERFIL_USUARIO => 'Perfil Usuário',
        TipoImagemEnum::CAPA_LIVRO => 'Capa Livro',
        TipoImagemEnum::CAPA_CAPITULO => 'Capa Capítulo',
        TipoImagemEnum::CONTEUDO_LIVRO => 'Conteúdo Livro',
    ];
}