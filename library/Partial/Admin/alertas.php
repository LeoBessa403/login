<?php

// ALERTA DE TROCA DE SENHA
if ($user[md5(ST_TROCA_SENHA)] == SimNaoEnum::NAO && empty($session->CheckSession(ST_TROCA_SENHA)) &&
    UrlAmigavel::$action == ACTION_INICIAL_ADMIN && UrlAmigavel::$controller == CONTROLLER_INICIAL_ADMIN) {

    $dados['titulo'] = 'Cadastro Ativado com Sucesso!';
    $dados['mensagem'] = '<p>Para trocar sua senha acesseo link <a href="' . PASTAADMIN . 'Usuario/TrocaSenhaUsuario"
                                                               style="color:#ccc">TROCAR SENHA</a>, 
                                                               para sua maior segurança</p>';
    $dados['tipo'] = TiposMensagemEnum::SUCESSO;
    Notificacoes::notificacao($dados);

}
if ($session->CheckSession(MENSAGEM)) {
    switch ($session::getSession(MENSAGEM)) {
        case CADASTRADO:
            Notificacoes::cadastrado();
            break;
        case ATUALIZADO:
            Notificacoes::atualizado();
            break;
        case DELETADO:
            Notificacoes::deletado();
            break;
        default:
            Notificacoes::mesagens($session::getSession(MENSAGEM), $session::getSession(TIPO));
            break;
    }
    $session->FinalizaSession(MENSAGEM);
}
Notificacoes::alerta();
Modal::ModalConfirmaAtivacao();
