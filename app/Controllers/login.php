<?php

namespace App\Controllers;
use App\Libraries\Hash;
use App\Models\login_modelo;
use App\Models\session_modelo;
use CodeIgniter\Email\Email;

class Login extends BaseController{
    public function cargar_login(){
        return view('sp_login');
    } 

    public function login(){
            //Aca cargo la libreria de validacion para luego poder validar los errores
            $validar = \Config\Services::validation();
            

            /*Aca hago la validacion del mail y la contraseña, dejando en claro los errores y 
            sus resprectivos mensajes*/
            $validation = $this->validate([
                'email' => [
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'El mail es requerido',
                        'valid_email' => 'Por favor, compruebe el campo de correo electrónico. No parece ser válido.',
                    ],
                ],
                'password' => [
                    'rules'  => 'required|min_length[1]|max_length[20]',
                    'errors' => [
                        'required' => 'La contraseña es requerida',
                    ],
                ],
            ]);
    

            if($validation == false){
                //Consigo los errores de validacion por medio de la lbreria validation    
                $data['validar'] = $validar->getErrors('email', 'password');
                return view('sp_login', $data);
            }else{
                //Recibo los datos del formulario
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                //Rescatamos la contraseña del usuario
                $login_modelo = new login_modelo();
                $session_modelo = new session_modelo();

                $contra = $login_modelo->login($email);

                if(!$contra){
                    $mail_incorrecto = [
                        'mensaje' => "La contraseña o el mail es incorrecto, intente nuevamente.",
                    ];
                    return view('sp_login', $mail_incorrecto);
                }
                //Chequeamos la contraseña
                $check_password = Hash::check($password, $contra['Contrasena']);
                if($check_password == false){
                    $mensaje = [
                        'mensaje' => "La contraseña o el mail son incorrectos, intente nuevamente.",
                    ];
                    return view('sp_login', $mensaje);
                }else{
                    //Genero un token aleatorio
                    $caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!"$&/()=?!';
                    $longpalabra=50;
                    for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
                        $x = rand(0,$n);
                        $pass.= $caracteres[$x];
                    }

                    //Guardo el token en una variable de sesion
                    session()->set('token', $pass);
                    $token = session('token');

                    //Consulto el id y lo guardo en una variable de sesion
                    $idu = $login_modelo->sacar_id_usuario($email);
                    session()->set('idUser', $idu['IdUsuario']);
                    $id_usuario = session('idUser');

                    $currentDateTime = new \DateTime(); 

                    $interval = new \DateInterval('PT30M'); 
                    $currentDateTime->add($interval); 

                    $fecha_adelantada = $currentDateTime->format('Y-m-d H:i:s');
                    
                    $datos = [
                        'Token' => $token,
                        'Expiracion' => $fecha_adelantada,
                        'IdUsuario' => $id_usuario,
                    ];

                    $insertar = $session_modelo->agregar_token($datos);

                    return view('sp_pagina_principal');
                    //$token = session('token');
                    //echo $id_usuario;
                }
        } 
    } 

    public function cerrar_session(){
        $session = \Config\Services::session();
        $session_modelo = new session_modelo();
        $id_usuario = session('idUser');

        $session_modelo->eliminar_token($id_usuario);

        unset($_SESSION['token']);
        unset($_SESSION['idUser']);

        return redirect()->route('cargar_login');
    }

    public function correo(){
     
    $email = \Config\Services::email();

    $email->setFrom('agustincloquell11@gmail.com', 'ALEJO');
    $email->setTo('valentinoripanti@alumnos.itr3.edu.ar');

    $email->setSubject('Recuperación de contraseña');
    $email->setMessage('Haga clic en el siguiente enlace para restablecer su contraseña: ');

    if ($email->send()) 
		{
            echo 'Email successfully sent';
        } 
		else 
		{
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
        // El correo electrónico se envió exitosamente
    }
}