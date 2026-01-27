<?php

class homeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        //Insertar un  uevo usuario
        //try{
          //  $user = new usuarioModel();
          //  $user->id = 5;
          //  $user->name= 'Pedrioto PAramo Actualizado';
        // $user->username = 'pp_25 actualizado';
        //    $user->email = 'actualziado@mail.com';
        //    print_r($user->update());
        //}catch(Exception $e){
        //echo $e->getMessage();
        //}
        //die;
        $data =
        [
            'title' => 'Rammito Framework',
            'bg' => 'dark'
        ];


        View::render('bee', $data);
    }

    function test()
    {
        
        echo 'Probando base de datos <br><br><br>';
        echo '<pre>';

        
        try {
            //SELECT
            $sql = 'SELECT * FROM users WHERE id=:id';
            $res = Db::query($sql, [':id' => 1]);
            print_r($res);

            //insert
            $sql = 'INSERT INTO users (name, email, created_at) VALUES  (:name, :email, :created_at)';
            $registro =
            [
                'name' => 'Kenshin',
                'email' => 'kenshin@mail.com',
                'created_at' => now()
            ];

            //$id = Db::query($sql, $registro);
            //print_r($id);

            //UPDATE
            $sql = 'UPDATE users SET name=:name WHERE id=:id';
            $registro_actualizado =
            [
                'name' => 'Ricardo Algo',
                'id' => 3
            ];
            //print_r(Db::query($sql, $registro_actualizado));

            //DELETE
            $sql = 'DELETE FROM users WHERE id=:id LIMIT 1';
            //print_r((Db::query($sql, ['id' =>4])));

            //ALTER TABLE
            $sql = 'ALTER TABLE users ADD COLUMN username VARCHAR(255) NULL AFTER name';
            print_r(Db::query($sql));

        } catch (Exception $e) {
            echo 'Hubo un error: '.$e->getMessage();
        }

        echo '</pre>';

        View::render('test');

    }

    function flash()
        {
           Flasher::new('Hola mundo son una noticficacion flash', 'danger');
          

            View::render('flash');
        }
    
}
