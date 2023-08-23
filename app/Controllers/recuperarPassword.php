<?php
namespace App\Controllers;
use App\Models\loginModelo;
use App\Models\recuperarPasswordModelo;
use App\Libraries\Hash;


class RecuperarPassword extends BaseController{
    public function cargarRecuperacion(){
        return view('spEnviarCorreo');
    }

    public function correo(){
        $loginModelo = new LoginModelo();
        $recuperarPasswordModelo = new RecuperarPasswordModelo();

        $correo = $this->request->getPost('correo');
        $idUsuario = $loginModelo->sacarIdUsuario($correo);

        if($idUsuario == null){
            $mensaje = [
                'mensaje' => 'El correo introducido no esta registrado en disertus',
            ];
            return View('spEnviarCorreo', $mensaje);
        }else{
        $dato = [
            'IdUsuario' => $idUsuario,
        ];

        $recuperarPasswordModelo->insertarId($dato);
        
        return view('spEnviarCodigo', $idUsuario);
        }
    }
    
    public function enviarCodigo(){
        $IdUsuario = $this->request->getPost('idUsuario');
        if($this->request->getVar('botonCodigo')){
            $loginModelo = new LoginModelo();
            $correo = $loginModelo->sacarCorreo($IdUsuario);
            
            $caracteres='1234567890';
            $longpalabra=6;
            for($codigo='', $n=strlen($caracteres)-1; strlen($codigo) < $longpalabra ; ) {
                $x = rand(0,$n);
                $codigo.= $caracteres[$x];
            }
            
            $recuperarPasswordModelo = new RecuperarPasswordModelo();
            $recuperarPasswordModelo->insertarCodigo($codigo, $IdUsuario);

            //Enviamos el correo con el codigo
            $email = \Config\Services::email();
        
            $email->setFrom('alejocloquell@alumnos.itr3.edu.ar', 'ALEJO');
            $email->setTo($correo);
            
            $email->setSubject('Recuperación de contraseña');
            $email->setMessage('Codigo:'.$codigo);
            
            //Convertimos la variable $IdUsuario a un array para poder recibirlo bien en la vista
            $IdUsuario = [
                'IdUsuario' => $IdUsuario,
            ];

            if($email->send()) {
                return view('spEnviarCodigo', $IdUsuario);
                } 
                else {
                    $data = $email->printDebugger(['headers']);
                    print_r($data);
                }
                // El correo electrónico se envió exitosamente            
        }   
        if($this->request->getVar('botonVerificar')){
            $codigo = $this->request->getPost('codigoUsuario');
            $recuperarPasswordModelo = new RecuperarPasswordModelo();

            $res = $recuperarPasswordModelo->compararCodigo($IdUsuario, $codigo);
            if($res == null){
                $mensaje = "El codigo es incorrecto o ya a expirado, si es necesario reenviaremos el codigo";
                $mensaje = [
                    'Mensaje' => $mensaje,
                    'IdUsuario' => $IdUsuario,
                ];

                return view('spEnviarCodigo', $mensaje);
            }else{
                $IdUsuario = [
                    'IdUsuario' => $IdUsuario,
                ];
                return view('spCambiarPassword', $IdUsuario);
            }
        } 
    }

    public function cambiarPassword(){
        $IdUsuario = $this->request->getPost('IdUsuario');
        $validar = \Config\Services::validation();
        $validation = $this->validate([
            'password' => [
                'rules'  => 'required|min_length[6]|max_length[20]',
                'errors' => [
                    'required' => 'La contraseña es requerida',
                ],
            ],
        ]);
        if($validation == false){
            //Consigo los errores de validacion por medio de la lbreria validation    
            $data = [
                'validar' => $validar->getErrors('password'),
                'IdUsuario' => $IdUsuario,
        ];
        
        return view('spCambiarPassword', $data);
        }else{
            $password = $this->request->getPost('password');
            $hash = Hash::make($password);

            $loginModelo = new LoginModelo();
            $loginModelo->cambiarPassword($hash, $IdUsuario);

            return view('spLogin');
        }
    }
}