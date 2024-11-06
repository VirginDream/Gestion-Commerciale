<?php
namespace App\Controller;
use App\Service\MyFct;
use App\Model\EntityManager;
use App\Model\User;
use App\Model\RoleManager;
class RegisterController extends MyFct
{
    public function __construct()
    {

        $action = "write";
        extract($_GET);
        $um = new EntityManager('user','User');
        $rm = new EntityManager('role','Role');
        $message = '';

        switch ($action) {
            case 'write':
                if(isset($_POST['username'])){
                    //----verification de l'existance de username dans la bdd
                    $username=$_POST['username'];
                    $conditions=['username'=>$username];
                    $user=$um->findOne($conditions);
                    if($user->getUsername()){
                        $message="L'identifiant $username est déjà utilisé!";
                    }else{
                        $password=$_POST['password'];
                        $confirm=$_POST['confirm'];
                        $roles=$_POST['roles'];
                        if($password!=$confirm){
                            $message="Le mot de passe saisi n'est pas confirmé!";
                        }else{
                            // $this->printr($_POST);die;
                            //----enlever $_POST['confirm']
                            unset($_POST['confirm']);
                            //---crypter $_POST['password']
                            $_POST['password']=$this->crypter($password);
                            //----Transformer $_POST['roles'] en json
                            $_POST['roles']=json_encode($_POST['roles']);
                            //----Sauvegarde---
                            $um->save($_POST);
                            //----Modifier $_SESSION

                            // $_SESSION=[
                            //     'username'=>$username,
                            //     'roles'=>$roles,
                            // ];
                            $_SESSION['username']=$user->getUsername();
                            $_SESSION['roles']=$user->getRoles();
                            $_SESSION['menu']=$this->afficherMenu();                                
                            //----Redirection vers l'Accueil
                            header("location:index.php");
                            exit();

                        }
                    }
                }
                $file="view/register/form.html.php";
                $user=new User();
                $user->setRoles('["ROLE_USER"]');
                $roles=$rm->findAll();
                $variables=[
                    'title'=>"S'enregistrer",
                    'user'=>$user,
                    'roles'=>$roles,
                    'disabled'=>'',
                    'message'=>$message,
                ];
                $this->generatePage($file,$variables);

                break; 

        }
    }
}
