<?php

require 'vendor/autoload.php';

// Crie uma instância do carregador de templates Twig
$loader = new \Twig\Loader\FilesystemLoader('templates');

// Crie uma instância do ambiente Twig
$twig = new \Twig\Environment($loader);

// Variável de exemplo para passar para o modelo
$nome = 'John Doe';

// Renderize um modelo Twig
echo $twig->render('hello.twig', ['nome' => $nome]);
