<?php
namespace Models;

//$pdo = new PDO('pgsql:host=localhost;dbname=myproject', 'postgres', '9999');
//this->
class Users
{
    public $collection;
    public $users;
    public function __construct($users = null)
    {   
        require ('connect_db.php');
        if(is_null($users))
        {
            $query = 'select max(id) from users;';
            $res = $pdo->query($query);
            $idm = $res->fetch();
            $maxid = $idm[0];
            $maxid++;
                for ($i = 1; $i < $maxid; $i++){
                    $query2 = 'SELECT * FROM users WHERE id =  :i  ;';
                    $res2 = $pdo->prepare($query2);
                    $res2->execute(['i' => $i]);
                    $user = $res2->fetch();
                    $users[] = new User(
                        $user['email'],
                        $user['password'], 
                        $user['first_name'], //first name
                        $user['last_name'], //last name
                        ); foreach($users as $val){
                            foreach($val as $num){
                                echo '<br />';
                                echo $num;
                            }
                        };
                }
        }
        $this->collection = $users;
    }
}
/*
                        $user[1],
                        $user[2],
                        $user[3],
                        $user[4],


new User(
                     'makkuz@yandex.ru',
                     'password',
                     'Максим',
                     'Кузнецов'),
                new User(
                     'igorsimdyanov@gmail.com',
                     'password',
                     'Игорь',
                     'Симдянов'),
                new User(
                        'igor3',
                        'password3',
                        'Игорь3',
                        'Симдянов3'),
                new User(
                            'igor4',
                            'password4',
                            'Игорь4',
                            'Симдянов4')
                */