<?php

/**
 * ProjetoUsuarioService.class [ SEVICE ]
 * @copyright (c) 2018, Leo Bessa
 */
class  ProjetoUsuarioService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(ProjetoUsuarioEntidade::ENTIDADE);
        $this->ObjetoModel = New ProjetoUsuarioModel();
    }

}