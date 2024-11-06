<?php
namespace App\Service;
use App\Model\Manager;
use App\Model\EntityManager;
require_once("config/parametre.php");
class MyFct extends Manager
{
    static function isGranted($role)
    {
        $roles = $_SESSION['roles'];
        if (in_array($role, $roles)) {
            return true;
        } else {
            return false;
        }
    }

    public function afficherMenu(){
        
        $mm= new EntityManager('menu','Menu');
        $conditions=[];
        $type='object';
        $order="order by parent_id asc,id";
        $menus=$mm->findAll($conditions,$type,$order);
        $menu=$this->getMenu(null,0,$menus);
        return $menu;
    }

    function generatePage($file, $variables = [], $base = "./view/base.html.php")
    {
        if (file_exists($file)) {
            ob_start(); //ouverture de la memoire tampon
            extract($variables); // création des variables locales à utiliser dans le fichier
            require_once($file); //chargement du fichier representé par la variable $file
            $content = ob_get_clean(); //récupération du contenu de la memoire tampon

            ob_start(); //Reouverture de la memoire tampon pour le fichier base.html.php 
            require_once($base); //chargement du fichier representé par la variable $base (son contenu est rempli par $content)
            $page = ob_get_clean(); //fermeture de la memoire tampon et transforme son contenu en texte et lee mettre dans la variable $page

            echo $page;
        } else {
            echo "<h1 style='color:red;text-align:center;'>Fichier $file introuvable!</h1>";
            die;
        }
    }
    public function getMenu($parent_id, $niveau, $menus)
    {
        $html = "";
        $niveau_precedent = 0;
        if ($niveau == 0) {
            $html .= "<ul class='nav navbar-nav'>";
        }
        foreach ($menus as $menu) {
            $menu_id = $menu->getId();
            $menu_parent_id = $menu->getParent_id();
            $menu_libelle = $menu->getLibelle();
            $menu_url = $menu->getUrl();
            $menu_role = $menu->getRole();
            $menu_icone = $menu->getIcone();
            $enfants = $menu->getEnfants();

          
            if ($parent_id == $menu_parent_id && self::isGranted($menu_role)) {
                if ($niveau_precedent != $niveau) {
                    $html .= "<ul class='dropdown-menu'>";
                }
                
                if($niveau==0){
                    $text="text-light fs-4";
                }else{
                    $text="text-light fs-5";
                }
                if($menu_icone){
                    $i="<i class='$menu_icone mx-2'></i>";
                }else{
                    $i="";
                }
                if ($enfants) {
                    $html .= "<li class='nav-item dropdown'> <a href='$menu_url' class= '$text nav-link dropdown-toggle' 
                    data-bs-toggle='dropdown' data-bs-autoclose='outside'>$i $menu_libelle</a>";
                } else {
                    $html .= "<li class='nav-item'> <a href='$menu_url' class='$text nav-link bg-dark '>$i $menu_libelle</a>";
                }
                $niveau_precedent=$niveau;
                $html .= $this->getMenu($menu_id, $niveau + 1, $menus);
            }
        }
        if ($niveau == 0) {
            $html .= "</ul>";
        } elseif ($niveau_precedent == $niveau) {
            $html .= "</ul></li>";
        } else {
            $html .= "</li>";
        }
        return $html;
    }
    public function showRowsMenu(){
        $mm=new EntityManager('menu','Menu');
        $menus=$mm->findAll([],"object","order by parent_id asc");
        $rows=$this->getRowsMenu(null,0,$menus);
        return $rows;
    } 

    public function getRowsMenu($parent_id,$niveau,$menus){
        $html='';

        foreach($menus as $menu){
            $menu_id=$menu->getId();
            $menu_parent_id=$menu->getParent_id();
            $menu_libelle=$menu->getLibelle();
            $menu_url=$menu->getUrl();
            $menu_role=$menu->getRole();
            $menu_icone=$menu->getIcone();
            $enfants=$menu->getEnfants();
            if($menu_parent_id==$parent_id){
                $espace='';
                for($i=1;$i<=$niveau;$i++){
                    $espace.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                if($niveau==0){
                    $text='fs-4 fw-bold';
                }else{
                    $text='fs-6 fw-bold';
                }
                if($menu_icone){
                    $i="<i class='$menu_icone'></i>";
                }else{
                    $i="";
                }
                $menu_libelle="$espace $menu_libelle";
                $html.="
                    <tr>
                        <td class='text-center'><input type='checkbox' id='$menu_id' name='choix' onclick='onlyOne(this)' ></td>
                        <td class='$text' >$menu_libelle</td>
                        <td>$menu_url</td>
                        <td>$menu_role</td>
                        <td>$i $menu_icone</td>
                    </tr>
                ";
                $html.=$this->getRowsMenu($menu_id,$niveau +1 , $menus);

            }
        }
        return $html;

    } 
   
    


    function access_control($role)
    {
        $roles = $_SESSION['roles'];
        if (!in_array($role, $roles)) {
            //header('Location: index.php');
            header('location: index.php?url=accueil&page=error');
        }
    }
    function control_role($roles)
    {
        $session_roles = $_SESSION['roles'];
        $ok = false;
        foreach ($roles as $role) {
            if (in_array($role, $session_roles)) {
                $ok = true;
            }
        }
        if ($ok == false) {
            header("location:index.php?url=accueil&page=error");
            exit();
        }
    }

    //$date=new DateTime();
    //$jour=jourSemaine($date);
    //echo $jour;
    function jourSemaine($date)
    {
        $njs = $date->format('N'); //format ('l') jour de la semaine en anglais.
        $jour = "";
        switch ($njs) {
            case 1:
                $jour = "Lundi";
                break;
            case 2:
                $jour = "Mardi";
                break;
            case 3:
                $jour = "Mercredi";
                break;
            case 4:
                $jour = "Jeudi";
                break;
            case 5:
                $jour = "Vendredi";
                break;
            case 6:
                $jour = "Samedi";
                break;
            case 7:
                $jour = "Dimanche";
                break;
            default:
                $jour = "Inconnu";
                break;
        }
        return $jour;
    }
    function printr($tableau)
    {
        echo "<pre>";
        print_r($tableau);
        echo "</pre>";
    }

    function crypter($password)
    {
        $n = 77;
        for ($i = 1; $i < $n; $i++) {
            $password = sha1($password);
        }
        return $password;
    }


    function dateFrs($cdate)
    {
        $date = new \DateTime($cdate);
        $dateFrs = $date->format('d-m-Y');
        return $dateFrs;
    }




    function numeroter($prefixe, $format, $numInitial)
    {
        return sprintf($prefixe . $format, $numInitial);
    }


    function createNumEntity($em, $entity_id)
    {
        $entity = $em->find($entity_id);
        $prefixe = $entity->getPrefixe();
        $numeroInitial = $entity->getNumeroInitial();
        $format = $entity->getFormat();
        $numEntity = $this->numeroter($prefixe, $format, $numeroInitial);
        $numeroInitial++;
        $data = [
            'id' => $entity_id,
            'numeroInitial' => $numeroInitial,
            // 'prefixe'=>$prefixe,
            // 'format'=>$format,
        ];
        $em->save($data);
        return $numEntity;
    }
}
