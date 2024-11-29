<?php
// Подключение автозагрузчика Twig
require_once 'vendor/autoload.php';

// Загрузка данных из JSON
$posts = json_decode(file_get_contents('data/posts.json'), true);

// Сортировка постов
usort($posts, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

// Создание объекта Twig
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

// Рендеринг шаблона и передача данных
echo $twig->render('index.html.twig', ['posts' => $posts]);