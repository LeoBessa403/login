$(function () {


    $('.anotacaoVer').click(function () {
        var coPagLivro = $(this).attr('id').replace('pag_anot_', '');
        $('#co_pagina_livro').val(coPagLivro);
        $('#ds_anotacao').val('');
        $('#co_anotacao_aluno').val('');
        $('#co_anotacao_professor').val('');
        $('#co_materia_turma').val('').change();

        var data = {
            co_aluno: $('#co_aluno').val(),
            co_pagina_livro: coPagLivro
        };
        var dados = Funcoes.Ajax('livro/PesquisaAnotacao', data);
        if (dados) {
            if (dados.sucesso) {
                $('#ds_anotacao').val(dados.ds_anotacao);
                $('#co_anotacao_aluno').val(dados.co_anotacao_aluno);
                $('#co_anotacao_professor').val(dados.co_anotacao_professor);
            }
        }
        $("#j_cadastro").click();
    });

    $('.anotProf').click(function () {
       var pag = $(this).attr('id').replace('anot_prof_','');
        $("#j_anotacao_" + pag).click();
    });

    $('#co_materia_turma').change(function () {
        var coPagLivro = $('#co_pagina_livro').val();
        var data = {
            co_materia_turma: $(this).val(),
            co_pagina_livro: coPagLivro
        };
        var dados = Funcoes.Ajax('livro/PesquisaAnotacao', data);
        console.log(dados);
        if (dados) {
            if (dados.sucesso) {
                $('#ds_anotacao').val(dados.ds_anotacao);
                $('#co_anotacao_aluno').val(dados.co_anotacao_aluno);
                $('#co_anotacao_professor').val(dados.co_anotacao_professor);
                $('#co_materia_truma').val(dados.co_materia_truma);
            }
        }
    });

    $('#co_pagina_livro_navegacao').change(function () {
        $('html, body').animate({
            scrollTop: $('#pag_' + $(this).val()).offset().top - 70
        }, 800, function () {
            return false;
        });
        return false;
    });

    $("#CadastroAnotacao").submit(function () {
        var data = $(this).serializeArray();
        var dados = Funcoes.Ajax('livro/CadastroAnotacao', data);
        if (dados) {
            if (dados.sucesso && dados.msg === "cadastrado") {
                Funcoes.CadastradoSucesso();
            } else if (dados.sucesso && dados.msg === "atualizado") {
                Funcoes.AtualizadoSucesso();
            } else {
                Funcoes.Alerta(dados.msg);
            }
            if (dados.sucesso) {
                $('.close ').click();
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    var zoomFinal = 1;

    $('#zoommais').click(
        function () {
            if (zoomFinal < 1.5) {
                zoomFinal = zoomFinal + 0.1;
                zoomDiv(zoomFinal);
            }
        }
    );

    $('#zoommaisx').click(
        function () {
            if (zoomFinal < 1.5) {
                zoomFinal = 1.5;
                zoomDiv(zoomFinal);
            }
        }
    );

    $('#zoommenos').click(
        function () {
            if (zoomFinal > 1) {
                zoomFinal = zoomFinal - 0.1;
                zoomDiv(zoomFinal);
            }
        }
    );

    $('#zoommenosx').click(
        function () {
            if (zoomFinal > 1) {
                zoomFinal = 1.0;
                zoomDiv(zoomFinal);
            }
        }
    );


});

function zoomDiv(zoomFinal) {
    $('.conteudo').animate({'zoom': zoomFinal}, 400);
}