<?php

/**
 * Check.class [ HELPER ]
 * Classe responável por manipular e validade dados do sistema!
 *
 * @copyright (c) 2014, Leo Bessa
 */
class Mensagens
{

    const OK_SALVO = "Seu registro foi Cadastro com Sucesso!";
    const OK_ATUALIZADO = "Seu registro foi Atualizado com Sucesso!";
    const OK_DELETADO = "A exclusão do registro Foi realizada com Sucesso!";
    const OK_ENVIO_EMAIL = "Email(s) Enviado(s) Com Sucesso!";
    const USUARIO_CADASTRADO_SUCESSO = "Usuário Cadastro Com Sucesso!</br>
                                        <b>Favor aguardar a ativação do seu cadastro.</b>";

    const USUARIO_JA_CADASTRADO = "Não é possível o cadastro! Usuário Já cadastrado.";
    const USUARIO_JA_LOGADO = 'Já existe um acesso com esse usuário Ativo. Favor Verificar.';
    const MSG_ERROS_CAMPOS = "O(s) Campo(s) <b>%s</b> , favor preencher corretamente.";
    const MSG_SEM_ITEM_SELECIONADO = "Nenhum item selecionado";

    public $MSG01 = "Esse Perfil esta vinculado a um Usuário ou Funcionalidade.";


}
