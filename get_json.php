<?php
$maxId = $_POST['maxId'];
$strings = file('messages.txt');
$messages = array();
//если maxId меньше кол-ва строк в файле(count($strings)), то мы прибавляем +1 к i ,
for($i = $maxId; $i < count($strings); $i++) 
{
//берём строку с номером i разбиваем её по уникальному разделителю '___' 
//и делаем из неё именованные элементы массива 
	$string = explode('___', $strings[$i]);
	$arr['date'] = $string[0]; 
	$arr['name'] = $string[1];
	$arr['text'] = $string[2];
//упаковываем всё в массив messages[] 
	$messages[] = $arr;
}
//переводим массив в json и отправляем
echo json_encode($messages);
