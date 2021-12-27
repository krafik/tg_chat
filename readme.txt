Задачи:
Общение с клиентом
передача данных в телегу
общение в телеге(с менеджером)


как понять, какому пользователю отвечать сейчас?



1.Пользователи на сайте пишут в чат
2.Сообщение это улетает на Ваш сервер
3.Оттуда Telegram-бот пересылает его нужному менеджеру
4.Менеджер отвечает через Telegram
5.Бот отправляет сообщение обратно в чат_на_сайте




t.me/laraTgBot
git: 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
token: 5030298765:AAEEfMBVVWa1ooINKP2HB0cLZiFIsLZj2Xk

{"ok":true,
    "result":{
    "id":5030298765,
    "is_bot":true,
    "first_name":"lara-tg",
    "username":"laraTgBot",
    "can_join_groups":true,
    "can_read_all_group_messages":false,
    "supports_inline_queries":false}
}



public function sendToTG($name, $town, $number, $email){
        $token= "1174498167:AAEsbCmyUS7rNA3eiMNhtFWqnkigQA52czQ";
        $chat_id ="-403183247";
        $arr=array(
            'Имя: '=> $name,
            'Город: '=>$town,
            'Телефон: '=>urlencode($number),
            'E-mail: '=>$email
        );
        foreach ($arr as $key => $value){
            $this->message .= "<b>".$key."</b>".$value."%0A";
        }
        return fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text=$this->message","r");

    }


