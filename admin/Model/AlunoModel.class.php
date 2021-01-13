<?php

/**
 * AlunoModel.class [ MODEL ]
 * @copyright (c) 2020, Leo Bessa
 */
class  AlunoModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(AlunoEntidade::ENTIDADE);
    }

    public function PesquisaAvancada($Condicoes)
    {
        $tabela = AlunoEntidade::TABELA . " alu" .
            " inner join " . TurmaEntidade::TABELA . " tur" .
            " on alu." . TurmaEntidade::CHAVE . " = tur." . TurmaEntidade::CHAVE .
            " inner join " . EscolaEntidade::TABELA . " esc" .
            " on tur." . EscolaEntidade::CHAVE . " = esc." . EscolaEntidade::CHAVE .
            " inner join " . PessoaEntidade::TABELA . " pes" .
            " on alu." . PessoaEntidade::CHAVE . " = pes." . PessoaEntidade::CHAVE;

        $campos = "alu.*";
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        $alunos = [];
        /** @var AlunoEntidade $aluno */
        foreach ($pesquisa->getResult() as $aluno) {
            $alu[0] = $aluno;
            $alunos[] = $this->getUmObjeto(AlunoEntidade::ENTIDADE, $alu);
        }
        return $alunos;
    }

}