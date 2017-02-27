<?php
session_start();
if(isset($_POST)){
    require_once($_SERVER['DOCUMENT_ROOT'].'/send/send_mail.php');
    var_dump($_POST);

    switch ($_POST['formtype']){
        case 'calculator':

                $body = '
                    Имя: '.$_POST['name'].'<br><br>
                    Email: '.$_POST['email'].'<br><br>
                    Телефон: '.$_POST['phone'].'<br><br>
                    Откуда: '.$_POST['fromCity'].'<br><br>
                    Куда: '.$_POST['toCity'].'<br><br>
                    Дата: '.$_POST['date'].'<br><br>
                    Масса: '.$_POST['mass'].'<br><br>
                    Тип груза: '.$_POST['type'].'<br><br>
                    Объем: '.$_POST['vol'].'<br><br>
                    Комментарии: '.$_POST['message'].'<br><br>
                ';
                echo send_mail($_POST['email'], 'galchenko.ml@gmail.com, info@gubentrans.com.ua', ' Расчет стоимости на сайте gubetrans.com.ua', $body, 'gubetrans.com.ua');
          
                break;
        case 'callback':
            if(!empty($_POST['email'])){
                $body = '
                    Имя: '.$_POST['name'].'<br><br>
                    Email: '.$_POST['email'].'<br><br>
                    Телефон: '.$_POST['phone'].'<br><br>
                ';
                echo send_mail($_POST['email'], 'galchenko.ml@gmail.com, info@gubentrans.com.ua', ' Обратный звонок на сайте gubetrans.com.ua', $body, 'gubetrans.com.ua');
                exit;
            }else {
                return false;
            }
    }
}
