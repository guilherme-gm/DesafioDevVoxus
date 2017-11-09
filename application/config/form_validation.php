<?php

$config = array(
    'tasks' => array(
        array(
            'field' => 'titulo',
            'label' => 'Titulo',
            'rules' => 'required|min_length[3]|max_length[100]'
        ),
        array(
            'field' => 'descricao',
            'label' => 'Descrição',
            'rules' => 'required'
        ),
        array(
            'field' => 'prioridade',
            'label' => 'Prioridade',
            'rules' => 'required|integer|greater_than[0]|less_than[6]'
        )
    )
);