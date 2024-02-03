<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', "/");
});

Breadcrumbs::for('contacts', function ($trail) {
    $trail->parent('home');
    $trail->push("Контакты");
});
