<?php

$config = array(
    'tasks' => array(
        array(
            'field' => 'titulo',
            'label' => 'Titulo',
            'rules' => 'required|min_length[3]|max_length[100]'
        ),
    )
);
