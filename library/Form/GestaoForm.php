<?php

class GestaoForm
{

    public static function Gerar()
    {
        $id = "gestaoGerarEntidades";

        $formulario = new Form($id, null, 'Gerar');

        $tabelas = AuditoriaService::PesquisaTabelasCombo();
        $formulario
            ->setId(NO_TABELA)
            ->setLabel("Entidades")
            ->setClasses("multipla")
            ->setInfo("Pode selecionar várias TABELAS.")
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($tabelas)
            ->CriaInpunt();

        return $formulario->finalizaForm();
    }

    public static function GerarBackup()
    {
        $id = "GerarBackup";

        $formulario = new Form($id, null, 'Gerar', 4);

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Gerar Backup")
            ->setId(ST_STATUS)
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(12)
            ->setOptions($label_options2)
            ->CriaInpunt();

        return $formulario->finalizaForm();
    }

    public static function Config($res)
    {
        $id = "GerarBackup";

        $formulario = new Form($id, null, 'Gerar');
        $formulario->setValor($res);

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Têm site?")
            ->setId('TEM_SITE')
            ->setClasses($res['TEM_SITE'])
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(4)
            ->setOptions($label_options2)
            ->CriaInpunt();

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Logar com email?")
            ->setId('LOGAR_EMAIL')
            ->setClasses($res['LOGAR_EMAIL'])
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(4)
            ->setOptions($label_options2)
            ->CriaInpunt();

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Fazer Auditoria?")
            ->setId('TABELA_AUDITORIA')
            ->setClasses($res['TABELA_AUDITORIA'])
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(4)
            ->setOptions($label_options2)
            ->CriaInpunt();

        $formulario
            ->setId('DESC')
            ->setLabel("Nome do Sistema")
            ->setTamanhoInput(3)
            ->CriaInpunt();

        $formulario
            ->setId('DESC_SIS')
            ->setClasses('ob')
            ->setLabel("Sigla do Sistema")
            ->setTamanhoInput(3)
            ->CriaInpunt();

        $formulario
            ->setId('TITULO_SITE')
            ->setClasses('ob')
            ->setLabel("Título padrão do site")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId('DESC_SITE')
            ->setClasses('ob')
            ->setTamanhoInput(12)
            ->setLabel("Descrição padrão do site")
            ->CriaInpunt();

        $formulario
            ->setId('CONTROLLER_INICIAL_ADMIN')
            ->setClasses('ob')
            ->setLabel("Controller inicial do admin")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setId('ACTION_INICIAL_ADMIN')
            ->setClasses('ob')
            ->setLabel("Ação inicial do admin")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setId('CONTROLLER_INICIAL_SITE')
            ->setClasses('ob')
            ->setLabel("Controller inicial do site")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setId('ACTION_INICIAL_SITE')
            ->setClasses('ob')
            ->setLabel("Ação inicial do site")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setId('TABLE_USER')
            ->setClasses('ob')
            ->setLabel("Tabela de usuário para validação")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setId('CAMPO_PASS')
            ->setClasses('ob')
            ->setLabel("Campo da senha na Tabela")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setId('CAMPO_ID')
            ->setClasses('ob')
            ->setLabel("Chave Primaria na Tabela de usuário")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setId('CAMPO_PERFIL')
            ->setClasses('ob')
            ->setLabel("Campo do Perfil na Tabela de usuário")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setId('SESSION_USER')
            ->setClasses('ob')
            ->setLabel("Nome da Sessão do usuário Logado")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setId('INATIVO')
            ->setClasses('ob')
            ->setClasses('numero')
            ->setLabel("Tempo de Inativadade Minutos")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setId('BACKUP')
            ->setClasses('ob')
            ->setClasses('numero')
            ->setLabel("BACKUP em Dias")
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId('TAMANHO')
            ->setClasses('ob')
            ->setClasses('numero')
            ->setLabel("Width das imagens")
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId('NUM_BG_IMAGENS')
            ->setClasses('ob')
            ->setLabel("Número de imagens")
            ->setClasses('numero')
            ->setTamanhoInput(4)
            ->setInfo("backgrounds da tela inicial do sistema")
            ->CriaInpunt();

        $formulario
            ->setId('WHATSAPP')
            ->setClasses('ob')
            ->setClasses('tel')
            ->setLabel("Número de envio do WhatsApp")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $formulario
            ->setId('WHATSAPP_MSG')
            ->setClasses('ob')
            ->setClasses('tel')
            ->setLabel("Número de recebimento do WhatsApp")
            ->setTamanhoInput(6)
            ->CriaInpunt();


        $formulario
            ->setId('CONTROLLER_SEO')
            ->setLabel("Controllers para gerar o seo diferenciado")
            ->setInfo('Separador por vírguila')
            ->setTamanhoInput(12)
            ->CriaInpunt();

        $formulario
            ->setId('USER_EMAIL')
            ->setLabel("Email")
            ->setClasses('email')
            ->setTamanhoInput(8)
            ->setInfo('E-mail padrão para envio do sistema')
            ->CriaInpunt();

        $formulario
            ->setId('PASS_EMAIL')
            ->setLabel("Senha")
            ->setTamanhoInput(4)
            ->setInfo('Senha do email')
            ->CriaInpunt();

        $formulario
            ->setId('HOST_EMAIL')
            ->setLabel("Host E-mail")
            ->setTamanhoInput(12)
            ->setInfo('Host de configuração do email')
            ->CriaInpunt();

        $formulario
            ->setId('PORTA_EMAIL')
            ->setLabel("Porta E-mail")
            ->setClasses('numero')
            ->setTamanhoInput(6)
            ->setInfo('Porta de configuração do email')
            ->CriaInpunt();

        $formulario
            ->setId('ID_ANALITCS')
            ->setTamanhoInput(6)
            ->setLabel("Id Analitcs")
            ->setInfo('Código identificador do analitics')
            ->CriaInpunt();

        return $formulario->finalizaForm();
    }

    public static function LimparBanco()
    {
        $id = "LimparBanco";

        $formulario = new Form($id, null, 'Limpar Banco', 6);

        $tabelas = [
            1 => 'Acesso',
            2 => 'Auditoria',
//            3 => 'Visita e trafego'
        ];
        $formulario
            ->setId('tp_dados')
            ->setLabel("Tabelas do Banco")
            ->setClasses("multipla")
            ->setInfo("Pode selecionar várias TABELAS.")
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($tabelas)
            ->CriaInpunt();

        $formulario
            ->setId('dt_fim')
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(4)
            ->setClasses("data ob")
            ->setLabel("Até o dia")
            ->setValor(date('d/m/Y'))
            ->CriaInpunt();

        return $formulario->finalizaForm();
    }

    public static function CadastroCrons($res)
    {
        $id = "CadastroCrons";

        $formulario = new Form($id, null, 'Gerar Cron', 6);
        $formulario->setValor($res);

        $formulario
            ->setId(NO_CRON)
            ->setClasses("ob nome")
            ->setLabel("Nome da Cron")
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_SQL)
            ->setClasses("ob")
            ->setLabel("Sql")
            ->CriaInpunt();

        Form::CriaInputHidden($formulario, $res, [CO_CRON]);

        return $formulario->finalizaForm();
    }

    public static function Minificacao()
    {
        $id = "Minificacao";

        $formulario = new Form($id, null, 'Minificar', 4);

        $tabelas = ['css' => 'CSS', 'js_geral' => 'JS Geral', 'js_renovacao' => 'JS Renovação', 'js_agenda' => 'JS Agenda'];
        $formulario
            ->setId('tp_arquivos')
            ->setLabel("Tipo de Arquivo")
            ->setClasses("multipla")
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($tabelas)
            ->CriaInpunt();

        return $formulario->finalizaForm();
    }
}

?>
   