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

class SubcategoryController extends AbstractController
{
    /**
     * @Route("archive/subcategory{subcategory_id}",name="archive_subcategory") 
     */
    public function archiveSubcategory($id)
    {
       $forRender = Array();
//         $forRender["category"] = $this->categoryRepository->getAllCategory();
//         $forRender["subcategory"] = $this->subcategoryRepository->getAllSubcategory();
        $forRender["article"] = $this->articleRepository->getFiveArticleActive();
//         $forRender["article"] = $this->articleRepository->getAllArticle();  
    }
}