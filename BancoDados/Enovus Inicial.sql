-- Atualizado em: 09/12/2019 12:26:49
-- AMBIENTE: http://localhost/enovus/
-- BANCO: enovus10


USE enovus10;


INSERT INTO TB_CONTATO VALUES("1","61993274991","6130826060","0","","leonardomcbessa@gmail.com","","","","");


INSERT INTO TB_CONTROLLER VALUES("1","Gestão","clip-data");

INSERT INTO TB_CONTROLLER VALUES("2","Auditoria","fa fa-crosshairs");

INSERT INTO TB_CONTROLLER VALUES("3","Acesso","clip-connection-2");

INSERT INTO TB_CONTROLLER VALUES("4","Funcionalidade","fa fa-outdent");

INSERT INTO TB_CONTROLLER VALUES("5","Perfil","clip-stack-empty");

INSERT INTO TB_CONTROLLER VALUES("6","Usuário","fa fa-group");

INSERT INTO TB_CONTROLLER VALUES("7","Visita","clip-airplane");

INSERT INTO TB_CONTROLLER VALUES("8","Relatorio","fa fa-clipboard");

INSERT INTO TB_CONTROLLER VALUES("9","Suporte","fa fa-envelope");



INSERT INTO TB_ENDERECO VALUES("1","qr 10 casa 10","","Samambaia","72111111","Brasília","DF");



INSERT INTO TB_FUNCIONALIDADE VALUES("1","Perfil Master","PerfilMaster","A","S","0");

INSERT INTO TB_FUNCIONALIDADE VALUES("2","Auditoria Listar","ListarAuditoria","A","S","2");

INSERT INTO TB_FUNCIONALIDADE VALUES("3","Auditoria Detalhar","DetalharAuditoria","A","N","2");

INSERT INTO TB_FUNCIONALIDADE VALUES("4","Usuario Cadastrar","CadastroUsuario","A","N","6");

INSERT INTO TB_FUNCIONALIDADE VALUES("5","Usuario Listar","ListarUsuario","A","S","6");

INSERT INTO TB_FUNCIONALIDADE VALUES("6","Meu Perfil Usuario","MeuPerfilUsuario","A","S","6");

INSERT INTO TB_FUNCIONALIDADE VALUES("7","Perfil Listar","ListarPerfil","A","S","5");

INSERT INTO TB_FUNCIONALIDADE VALUES("8","Perfil Cadastrar","CadastroPerfil","A","S","5");

INSERT INTO TB_FUNCIONALIDADE VALUES("9","Funcionalidade Listar","ListarFuncionalidade","A","S","4");

INSERT INTO TB_FUNCIONALIDADE VALUES("10","Funcionalidade Cadastrar","CadastroFuncionalidade","A","S","4");

INSERT INTO TB_FUNCIONALIDADE VALUES("11","Troca Senha Usuario","TrocaSenhaUsuario","A","S","6");

INSERT INTO TB_FUNCIONALIDADE VALUES("13","Listar Visita","ListarVisita","A","S","7");

INSERT INTO TB_FUNCIONALIDADE VALUES("14","Config Gestao","ConfigGestao","A","S","1");

INSERT INTO TB_FUNCIONALIDADE VALUES("15","Gerar Entidades Gestao","GerarEntidadesGestao","A","S","1");

INSERT INTO TB_FUNCIONALIDADE VALUES("16","Gerar Backup Gestao","GerarBackupGestao","A","S","1");

INSERT INTO TB_FUNCIONALIDADE VALUES("17","Listar Acesso","ListarAcesso","A","S","3");

INSERT INTO TB_FUNCIONALIDADE VALUES("22","Pre Projeto Gestao","PreProjetoGestao","A","S","1");

INSERT INTO TB_FUNCIONALIDADE VALUES("23","Acompanhar Projeto Gestao","AcompanharProjetoGestao","A","N","1");

INSERT INTO TB_FUNCIONALIDADE VALUES("24","Limpar Banco Gestao","LimparBancoGestao","A","S","1");

INSERT INTO TB_FUNCIONALIDADE VALUES("28","Crons","CronsGestao","A","S","1");

INSERT INTO TB_FUNCIONALIDADE VALUES("29","Minificação","MinificacaoGestao","A","S","1");

INSERT INTO TB_FUNCIONALIDADE VALUES("30","Gráfico","GraficoRelatorio","A","S","8");

INSERT INTO TB_FUNCIONALIDADE VALUES("31","Listar Suporte","ListarSuporte","A","S","9");

INSERT INTO TB_FUNCIONALIDADE VALUES("32","Cadastro Suporte","CadastroSuporte","A","N","9");

INSERT INTO TB_FUNCIONALIDADE VALUES("33","Deleta Suporte","DeletaSuporte","A","N","9");


INSERT INTO TB_IMAGEM VALUES("1","leonardo-m-c-bessa-56e8920c23ab66.jpg");


INSERT INTO TB_PERFIL VALUES("1","Master","A");


INSERT INTO TB_PERFIL_FUNCIONALIDADE VALUES("1","1","1");


INSERT INTO TB_PESSOA VALUES("1","","Usuário SisEnovus","","2016-10-31 00:00:00","0000-00-00","M","1","1","1");


INSERT INTO TB_PROJETO VALUES("1","Enovus","2020-09-05 11:07:40");


INSERT INTO TB_USUARIO VALUES("1","123456**","TVRJek5EVTJLaW89","A","S","2016-10-31 00:00:00","1","1","0");


INSERT INTO TB_USUARIO_PERFIL VALUES("1","1","1");






