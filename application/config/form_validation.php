<?php

$config = [
                'article_rules' =>  [
                                                        [
                                                                'field' => 'title',
                                                                'label' => 'Article Title',
                                                                'rules' => 'required|alphadash'
                                                        ],
                        
                                                        [
                                                                'field' => 'body',
                                                                'label' => 'Article Body',
                                                                'rules' => 'required',
                                                        ]
                                        ],
             
                'admin_rules' =>        [
                                                        [
                                                                'field'=>'username',
                                                                'label'=>'USERNAME',
                                                                'rules'=>'required|alpha|trim',
                                                        ],
                        
                                                        [
                                                                'field'=>'password',
                                                                'label'=>'PASSWORD',
                                                                'rules'=>'required',
                                                        ]
                                        ]

        ];