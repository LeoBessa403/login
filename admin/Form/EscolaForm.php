<?php

/**
 * HistoriaForm [ FORM ]
 * @copyright (c) 2017, Leo Bessa
 */
class EscolaForm
{
    public static function Cadastrar($res, $coordenadores)
    {
        $id = "cadastroEscola";

        $formulario = new FormAssistente($id, null, null, null, "Informações da Escola");

        if ($res):
            $formulario->setValor($res);
        endif;
        // Aba 1
        $formulario
            ->criaAba("Informações", "Dados da Escola");

        $formulario
            ->setId(NO_FANTASIA)
            ->setClasses("ob")
            ->setLabel("Nome Fantasia")
            ->CriaInpunt();

        $formulario
            ->setId(NO_RAZAO_SOCIAL)
            ->setLabel("Razão Social")
            ->CriaInpunt();

        $formulario
            ->setId(NU_CNPJ)
            ->setClasses("cnpj")
            ->setTamanhoInput(6)
            ->setLabel("CNPJ")
            ->CriaInpunt();

        $formulario
            ->setId(NU_INSC_ESTADUAL)
            ->setLabel("Inscrição Estadual ")
            ->setInfo("Somente Números")
            ->CriaInpunt();


        if (PerfilService::perfilCoordenador()) {
            $formulario
                ->setId(CO_USUARIO)
                ->setClasses("disabilita")
                ->setLabel("Coordenador(a) da Escola")
                ->setValor($coordenadores[$res[CO_USUARIO]])
                ->CriaInpunt();
        } else {
            $formulario
                ->setId(CO_USUARIO)
                ->setLabel("Coordenador(a) da Escola")
                ->setType(TiposCampoEnum::SELECT)
                ->setOptions($coordenadores)
                ->CriaInpunt();
        }

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_OBSERVACAO)
            ->setLabel("Descrição")
            ->CriaInpunt();

        $formulario
            ->finalizaAba();

        // Aba 2
        $formulario
            ->criaAba("Endereço", "Informações de Endereço");

        $formulario
            ->setId(NU_CEP)
            ->setLabel("CEP")
            ->setClasses("cep ob")
            ->CriaInpunt();

        $formulario
            ->setId(DS_ENDERECO)
            ->setIcon("clip-home-2")
            ->setClasses("ob")
            ->setLabel("Endereço")
            ->CriaInpunt();

        $formulario
            ->setId(DS_COMPLEMENTO)
            ->setLabel("Complemento")
            ->CriaInpunt();

        $formulario
            ->setId(DS_BAIRRO)
            ->setLabel("Bairro")
            ->CriaInpunt();

        $formulario
            ->setId(NO_CIDADE)
            ->setLabel("Cidade")
            ->CriaInpunt();

        $options = EnderecoService::montaComboEstadosDescricao();
        $formulario
            ->setId(SG_UF)
            ->setType(TiposCampoEnum::SELECT)
            ->setClasses("ob")
            ->setLabel("Estado")
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->finalizaAba();

        // Aba 3
        $formulario
            ->criaAba("Contatos", "Informações de Contatos da Escola");

        $formulario
            ->setId(NU_TEL1)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone")
            ->setClasses("tel ob")
            ->CriaInpunt();

        $formulario
            ->setId(NU_TEL2)
            ->setTamanhoInput(6)
            ->setIcon("fa fa-phone")
            ->setLabel("Telefone 2")
            ->setClasses("tel")
            ->CriaInpunt();

        $formulario
            ->setId(DS_EMAIL)
            ->setIcon("fa-envelope fa")
            ->setClasses("email ob")
            ->setLabel("Email")
            ->CriaInpunt();

        $formulario
            ->setId(DS_SITE)
            ->setLabel("Site")
            ->CriaInpunt();

        $formulario
            ->setId(DS_FACEBOOK)
            ->setIcon("fa-facebook fa")
            ->setLabel("Facebook")
            ->CriaInpunt();

        $formulario
            ->setId(DS_INSTAGRAM)
            ->setIcon("fa-instagram fa")
            ->setLabel("Instagram")
            ->CriaInpunt();

        $formulario
            ->setId(DS_TWITTER)
            ->setIcon("fa-twitter fa")
            ->setLabel("Twitter")
            ->CriaInpunt();

        $formulario
            ->finalizaAba(true);

        Form::CriaInputHidden($formulario, $res, [CO_ESCOLA, CO_CONTATO, CO_ENDERECO]);

        return $formulario->finalizaFormAssistente();
    }

    public static function CadastrarTurma($res = false)
    {
        $id = "CadastrarTurma";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar", 6);
        if ($res):
            $formulario->setValor($res);
        endif;

        $formulario
            ->setLabel("Ano")
            ->setId(NU_ANO)
            ->setClasses('ob numero')
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId(DS_TURMA)
            ->setClasses("ob")
            ->setLabel("Turma")
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Status")
            ->setId(ST_STATUS)
            ->setClasses($res[ST_STATUS])
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(4)
            ->setOptions($label_options2)
            ->CriaInpunt();

        Form::CriaInputHidden($formulario, $res, [CO_TURMA, CO_ESCOLA]);

        return $formulario->finalizaForm('Escola/ListarTurma/' .
            Valida::GeraParametro(CO_TURMA . "/" . $res[CO_TURMA] . "/"
                . CO_ESCOLA . "/" . $res[CO_ESCOLA]));
    }

    public static function CadastroAluno($res = false, $tamanho = 6)
    {
        $id = "CadastroAluno";

        /** @var FormAssistente $formulario */
        $formulario = new FormAssistente($id, UrlAmigavel::$modulo . "/" . UrlAmigavel::$controller
            . "/" . UrlAmigavel::$action, 'Cadastrar', $tamanho);
        $formulario->setValor($res);

        // Aba 1
        $formulario
            ->criaAba("Aluno", "Informações do Aluno", 6);

        $formulario
            ->setId(NU_CPF)
            ->setClasses("cpf")
            ->setTamanhoInput(6)
            ->setLabel("CPF")
            ->CriaInpunt();

        $formulario
            ->setId(NU_RG)
            ->setTamanhoInput(6)
            ->setClasses("numero")
            ->setLabel("RG")
            ->CriaInpunt();

        $formulario
            ->setId(NO_PESSOA)
            ->setClasses("ob nome")
            ->setInfo("O Nome deve ser Completo Mínimo de 10 Caracteres")
            ->setLabel("Nome Completo")
            ->CriaInpunt();

        $formulario
            ->setId(DT_NASCIMENTO)
            ->setClasses("data")
            ->setLabel("Nascimento")
            ->setInfo("Data de Nascimento")
            ->CriaInpunt();

        $label_options = array("" => "Selecione um", "M" => "Masculino", "F" => "Feminino");
        $formulario
            ->setLabel("Sexo")
            ->setId(ST_SEXO)
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($label_options)
            ->CriaInpunt();

        $formulario
            ->finalizaAba();

        // Aba 2
        $formulario
            ->criaAba("Endereço", "Informações de Endereço", 6);

        $formulario
            ->setId(NU_CEP)
            ->setLabel("CEP")
            ->setClasses("cep")
            ->CriaInpunt();

        $formulario
            ->setId(DS_ENDERECO)
            ->setIcon("clip-home-2")
            ->setLabel("Endereço")
            ->CriaInpunt();

        $formulario
            ->setId(DS_COMPLEMENTO)
            ->setLabel("Complemento")
            ->CriaInpunt();

        $formulario
            ->setId(DS_BAIRRO)
            ->setLabel("Bairro")
            ->CriaInpunt();

        $formulario
            ->setId(NO_CIDADE)
            ->setLabel("Cidade")
            ->CriaInpunt();

        $options = EnderecoService::montaComboEstadosDescricao();
        $formulario
            ->setId(SG_UF)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Estado")
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->finalizaAba();

        // Aba 3
        $formulario
            ->criaAba("Contatos", "Informações de Contatos", 6);

        $formulario
            ->setId(NU_TEL1)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone (WhatsApp)")
            ->setClasses("tel")
            ->CriaInpunt();

        $formulario
            ->setId(NU_TEL2)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone Celular 2")
            ->setClasses("tel")
            ->CriaInpunt();

        $formulario
            ->setId(DS_EMAIL)
            ->setIcon("fa-envelope fa")
            ->setClasses("email ob")
            ->setLabel("Email")
            ->CriaInpunt();

        Form::CriaInputHidden($formulario, $res, [
            CO_TURMA, CO_ESCOLA, CO_ALUNO, CO_CONTATO, CO_PESSOA, CO_ENDERECO
        ]);

        $formulario
            ->finalizaAba(true);

        return $formulario->finalizaFormAssistente();
    }

    public static function Pesquisar($resultEscola, $coordenadores)
    {
        $id = "pesquisaEscola";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action, "Pesquisa", 12);

        $formulario
            ->setId(NU_CNPJ)
            ->setClasses("cnpj")
            ->setTamanhoInput(6)
            ->setLabel("CNPJ")
            ->CriaInpunt();

        $formulario
            ->setId(NO_FANTASIA)
            ->setTamanhoInput(6)
            ->setLabel("Nome Fantasia")
            ->CriaInpunt();

        $formulario
            ->setId(CO_USUARIO)
            ->setLabel("Coordenador(a) da Escola")
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($coordenadores)
            ->CriaInpunt();

        return $formulario->finalizaFormPesquisaAvancada();
    }

    public static function PesquisarTurma($res, $escolas)
    {
        $id = "pesquisaTuema";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action, "Pesquisa", 12);

        $formulario->setValor($res);

        if (PerfilService::perfilCoordenador()) {
            $formulario
                ->setId('CO_ESCOLA2')
                ->setClasses("disabilita")
                ->setLabel("Escola")
                ->setValor($escolas[$res[CO_ESCOLA]])
                ->CriaInpunt();

            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_ESCOLA)
                ->setValues($res[CO_ESCOLA])
                ->CriaInpunt();
        } else {
            $formulario
                ->setId(CO_ESCOLA)
                ->setLabel("Escola")
                ->setType(TiposCampoEnum::SELECT)
                ->setOptions($escolas)
                ->CriaInpunt();
        }

        $formulario
            ->setLabel("Ano")
            ->setId(NU_ANO)
            ->setClasses('numero')
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId(DS_TURMA)
            ->setLabel("Turma")
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Status")
            ->setId(ST_STATUS)
            ->setClasses('checked')
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(4)
            ->setOptions($label_options2)
            ->CriaInpunt();

        return $formulario->finalizaFormPesquisaAvancada();
    }

    public static function PesquisarAluno($res, $escolas, $turmas)
    {
        $id = "pesquisaTuema";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action, "Pesquisa", 12);

        $formulario->setValor($res);

        if (PerfilService::perfilCoordenador()) {
            $formulario
                ->setId('CO_ESCOLA2')
                ->setClasses("disabilita")
                ->setLabel("Escola")
                ->setValor($escolas[$res[CO_ESCOLA]])
                ->CriaInpunt();

            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_ESCOLA)
                ->setValues($res[CO_ESCOLA])
                ->CriaInpunt();

            $formulario
                ->setId('CO_TURMA2')
                ->setClasses("disabilita")
                ->setLabel("Turma")
                ->setTamanhoInput(4)
                ->setValor($turmas[$res[CO_TURMA]])
                ->CriaInpunt();

            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_TURMA)
                ->setValues($res[CO_TURMA])
                ->CriaInpunt();
        } else {
            $formulario
                ->setId(CO_ESCOLA)
                ->setLabel("Escola")
                ->setType(TiposCampoEnum::SELECT)
                ->setOptions($escolas)
                ->CriaInpunt();

            $formulario
                ->setId(CO_TURMA)
                ->setTamanhoInput(4)
                ->setLabel("Turma")
                ->setType(TiposCampoEnum::SELECT)
                ->setOptions($turmas)
                ->CriaInpunt();
        }

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Status")
            ->setId(ST_STATUS)
            ->setClasses('checked')
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(4)
            ->setOptions($label_options2)
            ->CriaInpunt();

        $formulario
            ->setId(NU_CPF)
            ->setClasses("cpf")
            ->setTamanhoInput(4)
            ->setLabel("CPF")
            ->CriaInpunt();

        $formulario
            ->setId(NO_PESSOA)
            ->setClasses("nome")
            ->setTamanhoInput(12)
            ->setLabel("Nome")
            ->CriaInpunt();

        return $formulario->finalizaFormPesquisaAvancada();
    }

    public static function CadastroProfessor($res = false, $escolas, $turmas, $materias, $tamanho = 6)
    {
        $id = "CadastroProfessor";

        /** @var FormAssistente $formulario */
        $formulario = new FormAssistente($id, UrlAmigavel::$modulo . "/" . UrlAmigavel::$controller
            . "/" . UrlAmigavel::$action, 'Cadastrar', $tamanho);
        $formulario->setValor($res);

        // Aba 1
        $formulario
            ->criaAba("Professor", "Informações do Professor", 6);

        $formulario
            ->setId(NO_PESSOA)
            ->setClasses("ob nome")
            ->setInfo("O Nome deve ser Completo Mínimo de 10 Caracteres")
            ->setLabel("Nome Completo")
            ->CriaInpunt();

        $formulario
            ->setId(NU_CPF)
            ->setClasses("cpf")
            ->setTamanhoInput(6)
            ->setLabel("CPF")
            ->CriaInpunt();

        $formulario
            ->setId(NU_RG)
            ->setTamanhoInput(6)
            ->setClasses("numero")
            ->setLabel("RG")
            ->CriaInpunt();

        $formulario
            ->setId(DT_NASCIMENTO)
            ->setClasses("data")
            ->setLabel("Nascimento")
            ->setInfo("Data de Nascimento")
            ->CriaInpunt();

        $label_options = array("" => "Selecione um", "M" => "Masculino", "F" => "Feminino");
        $formulario
            ->setLabel("Sexo")
            ->setId(ST_SEXO)
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($label_options)
            ->CriaInpunt();

        $formulario
            ->finalizaAba();

        // Aba 2
        $formulario
            ->criaAba("Escola", "Informações da Escola", 6);

        if (PerfilService::perfilCoordenador()) {
            $formulario
                ->setId('CO_ESCOLA2')
                ->setClasses("disabilita")
                ->setLabel("Escola")
                ->setValor($escolas[$res[CO_ESCOLA]])
                ->CriaInpunt();

            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_ESCOLA)
                ->setValues($res[CO_ESCOLA])
                ->CriaInpunt();
        } else {
            $formulario
                ->setId(CO_ESCOLA)
                ->setClasses("ob")
                ->setLabel("Escola")
                ->setType(TiposCampoEnum::SELECT)
                ->setOptions($escolas)
                ->CriaInpunt();
        }

        $formulario
            ->setId(CO_TURMA)
            ->setTamanhoInput(4)
            ->setClasses("multipla")
            ->setLabel("Turma")
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($turmas)
            ->CriaInpunt();

        $formulario
            ->setId(CO_MATERIA)
            ->setClasses("ob")
            ->setLabel("Matéria")
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($materias)
            ->CriaInpunt();


        $formulario
            ->finalizaAba();

        // Aba 3
        $formulario
            ->criaAba("Endereço", "Informações de Endereço", 6);

        $formulario
            ->setId(NU_CEP)
            ->setLabel("CEP")
            ->setClasses("cep")
            ->CriaInpunt();

        $formulario
            ->setId(DS_ENDERECO)
            ->setIcon("clip-home-2")
            ->setLabel("Endereço")
            ->CriaInpunt();

        $formulario
            ->setId(DS_COMPLEMENTO)
            ->setLabel("Complemento")
            ->CriaInpunt();

        $formulario
            ->setId(DS_BAIRRO)
            ->setLabel("Bairro")
            ->CriaInpunt();

        $formulario
            ->setId(NO_CIDADE)
            ->setLabel("Cidade")
            ->CriaInpunt();

        $options = EnderecoService::montaComboEstadosDescricao();
        $formulario
            ->setId(SG_UF)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Estado")
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->finalizaAba();

        // Aba 4
        $formulario
            ->criaAba("Contatos", "Informações de Contatos", 6);

        $formulario
            ->setId(NU_TEL1)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone (WhatsApp)")
            ->setClasses("tel")
            ->CriaInpunt();

        $formulario
            ->setId(NU_TEL2)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone Celular 2")
            ->setClasses("tel")
            ->CriaInpunt();

        $formulario
            ->setId(DS_EMAIL)
            ->setIcon("fa-envelope fa")
            ->setClasses("email ob")
            ->setLabel("Email")
            ->CriaInpunt();

        Form::CriaInputHidden($formulario, $res, [
            CO_PROFESSOR, CO_CONTATO, CO_PESSOA, CO_ENDERECO
        ]);

        $formulario
            ->finalizaAba(true);

        return $formulario->finalizaFormAssistente();
    }
}

?>
   