<div class="main-content">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                <!-- start: PAGE TITLE & BREADCRUMB -->
                <ol class="breadcrumb">
                    <li>
                        <i class="clip-home-3"></i>
                        <a href="#">
                            Início
                        </a>
                    </li>
                </ol>
                <div class="page-header">
                    <h1>Sistemas de Acesso</h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-calendar"></i>
                        Ambiente de Teste
                    </div>
                    <div class="panel-body">
                        <?php
                        /** @var ProjetoUsuarioService $projetoUsuarioEntidade */
                        $projetoUsuarioEntidade = new ProjetoUsuarioService();

                        $projetos = $projetoUsuarioEntidade->PesquisaTodos([
                            CO_USUARIO => UsuarioService::getCoUsuarioLogado()
                        ]);
                        /** @var ProjetoUsuarioEntidade $projeto */
                        foreach ($projetos as $projeto) {
                            ?>
                            <a href="<?= str_replace('login/', '', HOME) . $projeto->getCoProjeto()->getNoPasta() . '/'; ?>" type="button"
                               class="btn btn-bricky btn-lg">
                                <?= $projeto->getCoProjeto()->getNoProjeto() ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <!-- end: FULL CALENDAR PANEL -->
            </div>
            <!-- end: PAGE CONTENT-->

        </div>
    </div>
</div>