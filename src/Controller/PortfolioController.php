<?php
namespace App\Controller;
use App\Service\MyFct;
    class PortfolioController extends MyFct{
        public function __construct()
        {
            $page='portfolio'; 
            extract($_GET);
            switch($page){
                case 'portfolio':
                    $file='view/portfolio/portfolio.html.php';
                    $base= 'view/base-portfolio.html.php';
                    $variables=[
                        'title'=>'Portfolio',
                        'description'=>'Voici mes réalisations',
                    ];
                    
                    $this->generatePage($file,$variables,$base);
                    break;
                case 'cv':
                    break;
        }
    }
}