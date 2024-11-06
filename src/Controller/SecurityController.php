<?php
namespace App\Controller;
use App\Service\MyFct;
use App\Model\EntityManager;

use App\Model\User;
    class SecurityController extends MyFct{

        public function __construct(){
            $um=new EntityManager('user','User');
            $rm=new EntityManager('role','Role');
            $action="list";
            $mot='';
            extract($_GET);
            
           //if(!MyFct::isGranted('ROLE_ADMIN')){
           //    if($_SESSION['username']=='Visiteur'){
           //        $action='register';
           //    }else{
           //        header("location:index.php");
           //    }
           //}
            switch($action){
                case 'list':
                    $this->access_control("ROLE_ADMIN");
                    $file="view/security/list.html.php";
                    $columns=['username'];
                    $users=$um->searchByCondition($columns,$mot);
                    $variables=[
                        'title'=>'Liste des utilisateurs',
                        'users'=>$users,
                    ];
                    $this->generatePage($file,$variables);
                    break;
                case 'create':
                    $this->access_control("ROLE_ADMIN");
                    $file="view/security/form.html.php";
                    $user=new User();
                    $user->setRoles('["ROLE_USER"]');
                    $roles=$rm->findAll();
                    //$this->printr($roles);die;
                    $variables=[
                        'title'=>'CrÉation utilisateur',
                        'user'=>$user,
                        'roles'=>$roles,
                        'disabled'=>'',
                    ];
                    $this->generatePage($file,$variables);
                    break;
                case 'read':
                    $this->access_control("ROLE_ADMIN");
                    $file="view/security/form.html.php";
                    $user=$um->find($id);
                    $roles=$rm->findAll();
                    //$this->printr($roles);die;
                    $variables=[
                        'title'=>'Affichage utilisateur',
                        'user'=>$user,
                        'roles'=>$roles,
                        'disabled'=>'disabled',
                    ];
                    $this->generatePage($file,$variables);
                    break;
                case 'update':
                    $this->access_control("ROLE_ADMIN");
                    $file="view/security/form.html.php";
                    $user=$um->find($id);
                    $roles=$rm->findAll();
                    //$this->printr($roles);die;
                    $variables=[
                        'title'=>'Modification utilisateur',
                        'user'=>$user,
                        'roles'=>$roles,
                        'disabled'=>'',
                    ];
                    $this->generatePage($file,$variables);                    
                    break; 
                    
                    break;
                case 'delete':
                    $this->access_control("ROLE_ADMIN");
                    $um->delete($id);
                    header('location:index.php?url=security');
                    break;
                case 'save':
                    $this->access_control("ROLE_ADMIN");
                    //$this->printr($_POST);
                    if(!$_POST['password']){
                        unset($_POST["password"]); // Enlever dans le tableau $_POST l'indice 'password'
                    }else{
                        $password=$_POST['password'];
                        $password=$this->crypter($password);
                        $_POST['password']=$password;
                    }
                    $_POST['roles']=json_encode($_POST['roles']);
                    $um->save($_POST);
                    header('location:index.php?url=security');   
                    //$this->printr($_POST);die;
                    break; 

                    break;
                case 'login':
                    $message='';
                    if($_POST){
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                        $password=$this->crypter($password);
                        $conditions=[
                            'username'=>$username,
                            'password'=>$password,
                        ];
                        $user=$um->findOne($conditions);
                        
                            if($user->getUsername()){
                                $_SESSION=[
                                    'username'=>$user->getUsername(),
                                     'roles'=>$user->getRoles(),
                                ];
                            $_SESSION['username']=$user->getUsername();
                            $_SESSION['roles']=$user->getRoles();
                            $_SESSION['menu']=$this->afficherMenu();
                                header('location:index.php');
                            }else{
                                $message="Identifiant ou mot de passe incorrect";
                            }
                    }
                    $file="view/security/login.html.php";
                    $variables=[
                        'title'=>'Connexion',
                        'message'=>$message,
                        
                    ];
                    $this->generatePage($file,$variables);
                    break;
                case 'logout':
                    session_destroy();
                    header('location:index.php?');
                    break;

               // case 'register':
               //     $file="view/security/form.html.php";
               //     $user=new User();
               //     $user->setRoles('["ROLE_USER"]');
               //     $roles=$rm->findAll();
               //     //$this->printr($roles);die;
               //     $variables=[
               //         'title'=>'CrÉation utilisateur',
               //         'user'=>$user,
               //         'roles'=>$roles,
               //         'disabled'=>'',
               //         'hide'=>'hide',
               //     ];
               //     $this->generatePage($file,$variables);
               //     break;
            }

        }




    }




?> 