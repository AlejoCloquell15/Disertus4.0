<?php

namespace App\Controllers;
use App\Libraries\Hash;
use App\Models\registrar_modelo;
use App\Models\login_modelo;
use App\Models\session_modelo;
use App\Models\nodemcu_modelo;

class Registrar extends BaseController
{
    public function registrar()
    {
        return view('sp_registrar');
    } //
    
    public function ingresar_datos()
    {
        $validar = \Config\Services::validation();
        
        $validation = $this->validate([
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tu nombre es requerido'
                    ]
                ],
                'mail' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Su correo es requerido',
                        'valid_email' => 'Tu correo debe ser valido',
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[6]',
                    'errors' => [
                        'required' => 'La contraseña es requerida',
                        'min_length[6]' => 'La contraseña tiene que tener al menos 6 carácteres',    
                        ]
                    ],
            ]);
            
           if($validation == false){
            $data['validar'] = $validar->getErrors('password', 'mail', 'nombre');
            return view('sp_registrar', $data);

            }else{
                $session_modelo = new session_modelo();
                $registrar = new registrar_modelo();
                $login_modelo = new login_modelo();
                $nodemcu_modelo = new nodemcu_modelo();

                $nombre = $this->request->getPost('nombre');
                $mail = $this->request->getPost('mail');
                $contrasena = $this->request->getPost('password');
                $mac = $this->request->getPost('mac');
                $codigo_nodemcu = $this->request->getPost('codigo_nodemcu');
                $nombre = $this->request->getPost('nombre');
                
                $hash = Hash::make($contrasena);

                $datos = [
                    "Nombre" => $nombre,
                    "Email" => $mail,
                    "Contrasena" => $hash,
                ];
                $insercion = [
                    'mensaje' => $registrar->registrar($datos),
                ];
                if($insercion['mensaje'] == 1){
                    $caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!"$&/()=?!';
                    $longpalabra=50;
                    for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ){
                        $x = rand(0,$n);
                        $pass.= $caracteres[$x];
                    }

                    session()->set('idNodemcu', $mac);

                    //Guardo el token en una variable de sesion
                    session()->set('token', $pass);
                    $token = session('token');

                    //Consulto el id y lo guardo en una variable de sesion
                    $idu = $login_modelo->sacar_id_usuario($mail);
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

                    $mac = [
                        'IdNodemcu' => $mac,
                        'CodigoNodemcu' => $codigo_nodemcu,
                        'IdUsuario' => $id_usuario,
                        'Nombre' => $nombre,
                    ];

                    $insertar = $session_modelo->agregar_token($datos);
                    $res = $nodemcu_modelo->comparar_mac($mac);

                    if($res == true){
                        return view('sp_pagina_principal');
                    }else{
                        $mensaje2 = [
                            'mensaje2' => "El  codigo o la identificaccion del dispositvos es incorrecto",
                        ];
                        return view('sp_registrar', $mensaje2);
                    }
                }else{
                    $mensaje = [
                        'mensaje' => "Ya existe un usuario con ese correo",
                    ];
                    return view('sp_registrar', $mensaje);
                }
            }  
        }   
    } 

