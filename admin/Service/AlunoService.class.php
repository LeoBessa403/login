<?php

/**
 * AlunoService.class [ SEVICE ]
 * @copyright (c) 2020, Leo Bessa
 */
class  AlunoService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(AlunoEntidade::ENTIDADE);
        $this->ObjetoModel = New AlunoModel();
    }

    public function salvaAluno($dados)
    {
        /** @var ContatoService $contatoService */
        $contatoService = $this->getService(CONTATO_SERVICE);
        /** @var PessoaService $pessoaService */
        $pessoaService = $this->getService(PESSOA_SERVICE);
        /** @var EnderecoService $enderecoService */
        $enderecoService = $this->getService(ENDERECO_SERVICE);
        /** @var UsuarioService $usuarioService */
        $usuarioService = $this->getService(USUARIO_SERVICE);
        /** @var UsuarioPerfilService $usuarioPerfilService */
        $usuarioPerfilService = $this->getService(USUARIO_PERFIL_SERVICE);
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $session = new Session();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $alunoValidador = new AlunoValidador();
        /** @var AlunoValidador $validador */
        $validador = $alunoValidador->validarCadastro($dados);
        if ($validador[SUCESSO]) {

            $endereco = $this->getDados($dados, EnderecoEntidade::ENTIDADE);
            $contato = $this->getDados($dados, ContatoEntidade::ENTIDADE);
            $pessoa = $this->getDados($dados, PessoaEntidade::ENTIDADE);
            $aluno = $this->getDados($dados, AlunoEntidade::ENTIDADE);
            $aluno[ST_STATUS] = SimNaoEnum::SIM;
            $pessoa[DT_NASCIMENTO] = Valida::DataDBDate($pessoa[DT_NASCIMENTO]);

            $PDO->beginTransaction();
            if (!empty($dados[CO_ALUNO])):
                $contatoService->Salva($contato, $dados[CO_CONTATO]);
                $enderecoService->Salva($endereco, $dados[CO_ENDERECO]);
                $pessoaService->Salva($pessoa, $dados[CO_PESSOA]);
                $retorno[SUCESSO] = $this->Salva($aluno, $dados[CO_ALUNO]);
                $session->setSession(MENSAGEM, ATUALIZADO);//
            else:
                $pessoa[CO_CONTATO] = $contatoService->Salva($contato);
                $pessoa[DT_CADASTRO] = Valida::DataHoraAtualBanco();
                $pessoa[CO_ENDERECO] = $enderecoService->Salva($endereco);

                $dadosEmail[NO_PESSOA] = $pessoa[NO_PESSOA];
                $dadosEmail[DS_EMAIL] = $contato[DS_EMAIL];
                $dadosEmail[NU_TEL1] = $contato[NU_TEL1];

                $coPessoa = $pessoaService->Salva($pessoa);
                $coUsuario = $usuarioService->salvaUsuarioInicial($coPessoa, $dadosEmail);
                $aluno[CO_PESSOA] = $coPessoa;
                $aluno[ST_STATUS] = StatusUsuarioEnum::ATIVO;

                $this->Salva($aluno);

                $usuarioPerfil[CO_PERFIL] = PERFIL_USUARIO_PADRAO;
                $usuarioPerfil[CO_USUARIO] = $coUsuario;
                $usuarioPerfilService->Salva($usuarioPerfil);

                $usuarioPerfil[CO_PERFIL] = 7;
                $usuarioPerfil[CO_USUARIO] = $coUsuario;
                $retorno[SUCESSO] = $usuarioPerfilService->Salva($usuarioPerfil);
                $session->setSession(MENSAGEM, CADASTRADO);
            endif;
            if ($retorno[SUCESSO]) {
                $retorno[SUCESSO] = true;
                $PDO->commit();
            } else {
                Notificacoes::geraMensagem(
                    'Não foi possível realizar a ação',
                    TiposMensagemEnum::ERRO
                );
                $retorno[SUCESSO] = false;
                $PDO->rollBack();
            }
        } else {
            Notificacoes::geraMensagem(
                $validador[MSG],
                TiposMensagemEnum::ALERTA
            );
            $retorno = $validador;
        }

        return $retorno;
    }

    public function PesquisaAvancada($Condicoes)
    {
        return $this->ObjetoModel->PesquisaAvancada($Condicoes);
    }
}