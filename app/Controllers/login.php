<?php

namespace App\Controllers;
use App\Libraries\Hash;
use App\Models\loginModelo;
use App\Models\sessionModelo;
use CodeIgniter\Email\Email;

class Login extends BaseController{
    public function cargarLogin(){
        return view('spLogin');
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
                return view('spLogin', $data);
            }else{
                //Recibo los datos del formulario
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                //Rescatamos la contraseña del usuario
                $loginModelo = new loginModelo();
                $sessionModelo = new sessionModelo();

                $contra = $loginModelo->login($email);

                if(!$contra){
                    $mailIncorrecto = [
                        'mensaje' => "La contraseña o el mail es incorrecto, intente nuevamente.",
                    ];
                    return view('spLogin', $mailIncorrecto);
                }
                //Chequeamos la contraseña
                $checkPassword = Hash::check($password, $contra['Contrasena']);
                if($checkPassword == false){
                    $mensaje = [
                        'mensaje' => "La contraseña o el mail son incorrectos, intente nuevamente.",
                    ];
                    return view('spLogin', $mensaje);
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
                    $idu = $loginModelo->sacarIdUsuario($email);
                    session()->set('idUser', $idu['IdUsuario']);
                    $idUsuario = session('idUser');

                    $currentDateTime = new \DateTime(); 

                    $interval = new \DateInterval('PT30M'); 
                    $currentDateTime->add($interval); 

                    $fechaAdelantada = $currentDateTime->format('Y-m-d H:i:s');
                    
                    $datos = [
                        'Token' => $token,
                        'Expiracion' => $fechaAdelantada,
                        'IdUsuario' => $idUsuario,
                    ];

                    $insertar = $sessionModelo->agregarToken($datos);

                    return view('spPaginaPrincipal', $contra);
                    //$token = session('token');
                    //echo $idUsuario;
                }
        } 
    } 

    public function cerrarSession(){
        $session = \Config\Services::session();
        $sessionModelo = new sessionModelo();
        $idUsuario = session('idUser');

        $sessionModelo->eliminarToken($idUsuario);

        unset($_SESSION['token']);
        unset($_SESSION['idUser']);

        return redirect()->route('cargarLogin');
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