<?php

//токен приложения
$token = '64bf11a576ab3d2455d298426c5add1bb88b61cf8cdc126f1550ae76239c75c70c1c57aab43973e441caf';

//ID группы
$id = '-118902578';

// Удаляем минус у ID групп
$group_id = preg_replace("/-/i", "", $id);

//кол-во последних записей, которые нужно получить
$count = '1';

//С каким тегом выводить записи
$hashTag = '#Вакансии_В_Фрилансе';