<?php

namespace App\Controller\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticlesRepositoryInterface;
use App\Form\ArticleType;
use App\Entity\Articles;

class ArticleController extends AbstractController
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
     * @Route("list/articles",name="admin_main_articles") 
     */
    public function listArticles()
    {
       $forRender = Array();
//         $forRender["category"] = $this->categoryRepository->getAllCategory();
//         $forRender["subcategory"] = $this->subcategoryRepository->getAllSubcategory();
        $forRender["article"] = $this->articleRepository-> getAllArticle();
//        $forRender["article"] = $this->articleRepository-> getAllArticle();
//        $forRender["article"] = $this->articleRepository-> getAllArticle();
//       dd($forRender["article"]);
//         $forRender["article"] = $this->articleRepository->getAllArticle();
        return $this->render('admin/article/index.html.twig',["articles" => $forRender["article"]],);
    } 
    
    
    /**
     * @Route("admin/article/create", name="admin_article_create")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function createAction(Request $request)
    {   
        $em = $this->getDoctrine()->getManager();
        $article = new Articles();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()){
//                $this->categoryService->handleCreate($article);
                $em->persist($article);
                $em->flush();
                $this->addFlash('success', 'Статья добавлена');
                return $this->redirectToRoute('admin_main_articles');
            }
        $forRender["title"] = "Добавление статьи";
        $forRender['form'] = $form->createView();
        return $this->render('admin/article/form.html.twig', $forRender);
    }

}

