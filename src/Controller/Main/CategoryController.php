<?php


namespace App\Controller\Main;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoriesRepositoryInterface;
//use App\Repository\SubcategoriesRepositoryInterface;
use App\Repository\ArticlesRepositoryInterface;
use App\Entity\Categories;
use App\Entity\Articles;

class CategoryController extends AbstractController
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
     * @Route("archive/category{articleCat_id}",name="archive_category") 
     */
    public function archiveArticlesCatId($articleCat_id)
    {
       $forRender = Array();
//         $forRender["category"] = $this->categoryRepository->getAllCategory();
//         $forRender["subcategory"] = $this->subcategoryRepository->getAllSubcategory();
        $forRender["article"] = $this->articleRepository->getArticlesCategoryId($articleCat_id);
//        dd($forRender["article"]);
//         $forRender["article"] = $this->articleRepository->getAllArticle();
        return $this->render('category/archivecategories.html.twig',["articlesArchiveCat" => $forRender["article"]],);
    }
}