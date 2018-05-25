<?php

return array(


    'pdf' => array(
        'enabled' => true,
        //'binary' => base_path('vendor\wemersonjanuario\wkhtmltopdf-windows\bin\64bit\wkhtmltopdf'),
        'binary' => '"C:\wkhtmltopdf\bin\wkhtmltopdf.exe"',
        'timeout' => false,
        'options' => array(
            'footer-center' => 'Página [page] de [toPage]',
            'footer-font-size' => 8,
            'encoding' =>  'UTF-8'
        ),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        //'binary' => base_path('vendor\wemersonjanuario\wkhtmltopdf-windows\bin\64bit\wkhtmltoimage'),
        'binary' => '"C:\wkhtmltopdf\bin\wkhtmltoimage.exe"',
        'timeout' => false,
        'options' => array(
            'footer-center' => 'Página [page] de [toPage]',
            'footer-font-size' => 8,
            'encoding' =>  'UTF-8'
        ),
        'env'     => array(),
    ),
);

