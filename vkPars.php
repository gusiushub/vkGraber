<?php


class vkPars
{
    public function newsPars($id, $count, $token, $group_id)
    {
        //получаем информацию, подставив все данные из vkConfig.php
        $ref = file_get_contents("https://api.vk.com/api.php?oauth=1&method=wall.get&owner_id={$id}&count={$count}&v=5.58&access_token={$token}");

        // Преобразуем JSON-строку в массив
        $wall = json_decode($ref);
        //var_dump($wall);

        // Получаем массив
        $wall = $wall->response->items;

        // Обрабатываем данные массива с помощью for и выводим нужные значения
        for ($i = 0; $i < count($wall); $i++) {
            $str[$i] = $wall[$i]->text
            /*. date("Y-m-d H:i:s", $wall[$i]->date) . "<br />
            https://vk.com/wall-{$group_id}_{$wall[$i]->id}<br />
            "*/;
        }

        //выводим один элемент из массива т.к. нужна именно строка, а не массив
        return $str[0];
    }

    public function trueTag($hashTag,$id, $count, $token, $group_id )
    {
        $str = $this->newsPars($id, $count, $token, $group_id);
        return strstr($str,$hashTag);
    }

    public function news($hashTag,$id, $count, $token, $group_id)
    {
        $bool = $this->trueTag($hashTag,$id, $count, $token, $group_id);
        $str = $this->newsPars($id, $count, $token, $group_id);
        //проверка на наличие нужного тега
        //$fd = fopen("test.txt", 'w+') or die("не удалось открыть файл");
        //fclose($fd);
        $test = htmlentities(file_get_contents("test.txt"));
         if($bool != false) {
             if ($test!=$str) {
                 $fd = fopen("test.txt", 'w') or die("не удалось создать файл");
                 fwrite($fd, $str);
                 fclose($fd);
                 return $str;
             }
         }
    }
}