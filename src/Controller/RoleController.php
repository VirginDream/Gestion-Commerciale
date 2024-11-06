<?php 
namespace App\Controller;
use App\Service\MyFct;
use App\Model\EntityManager;
use App\Model\Role;
    class RoleController extends MyFct{
        public function __construct(){
            $action='list';
            $rm=new EntityManager('role','Role');
            extract($_GET);
            switch($action){
                case 'list':
                    $file="view/role/list.html.php";
                    $variables=[
                        'title'=>'Liste des Rôles',
                        'roles'=>$rm->findAll(),
                        
                        


                    ];


                    $this->generatePage($file,$variables);

                    break;

                case 'create':
                    $file="view/role/form.html.php";
                    $role=new Role();
                    $variables=[
                        'title'=>'Création d\'un Rôle',
                        'role'=> $role,
                        'disabled'=>'',
                        
                    ];


                    $this->generatePage($file,$variables);
                    break;

                case 'read':
                    $file="view/role/form.html.php";
                    $role= $rm->find($id);
                    $variables=[
                        'title'=>'Affichage Rôle',
                        'role'=> $role,
                        'disabled'=>'disabled',
                    ];
                    $this->generatePage($file,$variables);
                    break;

                case 'update':
                    $file= "view/role/form.html.php";
                    $role=$rm->find($id);
                    $variables=[
                        'title'=>'Modification d\'un Rôle',
                        'role'=> $role,
                        'disabled'=>'',

                    ];

                    $this->generatePage($file,$variables);
                    break;

                    case 'delete':
                        $rm->delete($id);
                        header("location:index.php?url=role");
                        break; 

                case 'save':
                    $rm->save($_POST);
                    header("location:index.php?url=role");
                    break; 
            }

        }

    }






?>