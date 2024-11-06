<?php
namespace App\Controller;
use App\Service\MyFct;
    class CvCOntroller extends MyFct{
        public function __construct()
        {
            $page='cv';
            extract($_GET);
            switch ($page){
                case 'cv':
                    $file='view/cv/cv.html.php';
                    $base='view/base-cv.html.php';
                    $variables=[
                        'title'=>'Curriculum Vitae',

                        
                        
                    ];
                    $this->generatePage($file,$variables,$base);
                    break;
                
                    
                    
            }
        }
       

    }

?>