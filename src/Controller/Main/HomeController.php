<?php


namespace App\Controller\Main;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoriesRepositoryInterface;
//use App\Repository\SubcategoriesRepositoryInterface;
use App\Repository\ArticlesRepositoryInterface;
use App\Entity\Articles;
use App\Entity\Users;

  class HomeController extends AbstractController
{
//    private $categoryRepository;
//    private $subcategoryRepository;
    private $articleRepository;
    
    public function __construct(
         ArticlesRepositoryInterface $articleRepository)
    {
//        $this->categoryRepository = $categoryRepository;
//        $this->subcategoryRepository = $subcategoryRepository;
          $this->articleRepository = $articleRepository;
    }
    
    /**
     * @Route("/", name="homepage")
     */
     function indexAction()
    {     
         $author = new Users();
         $forRender = Array();
//         $forRender["category"] = $this->categoryRepository->getAllCategory();
//         $forRender["subcategory"] = $this->subcategoryRepository->getAllSubcategory();
        $forRender["article"] = $this->articleRepository->getFiveArticleActive();
//         $forRender["article"] = $this->articleRepository->getAllArticle();
         

//      dd($forRender["article"]);
//         $results = array();
//            echo "<pre>";
//            print_r($forRender["article"]);
//             echo "</pre>";
//             die();
         
//         $articles = $this->getDoctrine()
//            ->getRepository(Articles::class)
//            ->Active(1);

//         $data = $Article->getFrontList(5,null,1);
//             echo "<pre>";
//    print_r($articles);
//    echo "</pre>";
//    die();
//         $results["articles"] = $data['results'];
//         $Author = new ExampleUser();
         
         
//         $product = $this->getDoctrine()
//         ->getRepository(Categories::class)
//         ->findAll();
//                      echo "<pre>";
//    print_r($forRender["article"]);
//    echo "</pre>";
//    die();
//        return $this->render('newmain/home.html.twig',["categories"=>$forRender["category"],
//            "subcategories"=>$forRender["subcategory"], "articles" => $forRender["article"]
//        ], );
         
         return $this->render('main/homepage.html.twig',["articles" => $forRender["article"],
             "author" => $author ],);
    }
}
