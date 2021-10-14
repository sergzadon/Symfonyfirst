<?php

namespace App\Controller\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticlesRepositoryInterface;
use App\Entity\Articles;

class AdminArticleController extends AbstractController
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
     * @Route("list/articles",name="list_articles") 
     */
    public function listArticles()
    {
       $forRender = Array();
//         $forRender["category"] = $this->categoryRepository->getAllCategory();
//         $forRender["subcategory"] = $this->subcategoryRepository->getAllSubcategory();
        $forRender["article"] = $this->articleRepository-> getAllArticle();
//        dd($forRender["article"]);
//         $forRender["article"] = $this->articleRepository->getAllArticle();
        return $this->render('admin/article/listarticles.html.twig',["articles" => $forRender["article"]],);
    } 
    
}

