<?php
namespace App\Controller;
    use App\Service\MyFct;
    use App\Model\EntityManager;
   
    use App\Model\Menu;
    class MenuController extends MyFct{
        public function __construct(){
            $action="list";
            $mm=new EntityManager('menu','Menu');
            $rm=new EntityManager('role','Role');
            extract($_GET);
            switch($action){
                case "list":
                    $this->access_control("ROLE_ADMIN");
                    $file="view/menu/list.html.php";
                    $rows=$this->showRowsMenu($mm);
                   
                    //$this->printr($rows);die;
                    $variables=[
                        'title'=>'Liste des Menus',
                        'rows'=>$rows,
                    ];
                    $this->generatePage($file,$variables);

                    break;

                case "create":
                    $this->access_control("ROLE_ADMIN");
                    $file='view/menu/form.html.php';
                    $menu=new Menu();
                    $variables=[
                        'title'=>'CrÉer un Menu',
                        'menu'=>$menu,
                        'roles'=>$rm->findAll(),
                        'parents'=>$mm->findAll(),
                        'disabled'=>'',
                    ];

                    $this->generatePage($file,$variables);
                    break;

                case "read":
                    $this->access_control("ROLE_ADMIN");
                    $file='view/menu/form.html.php';
                    $variables=[
                        'title'=>'Afficher un Menu',
                        'menu'=>$mm->find($id),
                        'roles'=>$rm->findAll(),
                        'parents'=>$mm->findAll(),
                        'disabled'=>'disabled',
                    ];

                    $this->generatePage($file,$variables);
                    break;;

                case "update":
                    $this->access_control("ROLE_ADMIN");
                    $file='view/menu/form.html.php';
                    $variables=[
                        'title'=>'Modifier un Menu',
                        'menu'=>$mm->find($id),
                        'roles'=>$rm->findAll(),
                        'parents'=>$mm->findAll(),
                        'disabled'=>'',
                    ];

                    $this->generatePage($file,$variables);
                    break;

                    case 'delete':
                        $this->access_control("ROLE_ADMIN");
                        //  ---verifier si le menu a ddes enfants;
                        extract($_POST);
                        $menu=$mm->find($id);
                        $enfants=$menu->getEnfants();
                        if($enfants){
                            header("location:index.php?url=accueil&page=error");
                            exit;
                        }
                        $mm->delete($id);
                        header("location:index.php?url=menu");
                        break;

                    case "save":
                        $this->access_control("ROLE_ADMIN");
                        extract($_POST);
                        if($parent_id==''){
                            $_POST['parent_id']=null;
                        }
                            $mm->save($_POST);
                            header("location:index.php?url=menu");
                            break;
        }
    }
}