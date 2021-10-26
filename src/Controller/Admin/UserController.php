<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
//use App\Repository\CategoriesRepositoryInterface;
//use App\Repository\SubcategoriesRepositoryInterface;
//use App\Repository\ArticlesRepositoryInterface;
use App\Entity\Users;
use App\Form\UserType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Repository\UsersRepositoryInterface ;

class UserController extends AbstractController
{
    
    
    private $userRepository;
    
        public function __construct(
         UsersRepositoryInterface  $userRepository)
    {
//        $this->categoryRepository = $categoryRepository;
//        $this->subcategoryRepository = $subcategoryRepository;
          $this->userRepository = $userRepository;
    }
    /**
     * @Route("admin/main", name="admin_main")
     * @return \App\Controller\Admin\RedirectResponse
     */
    public function index(): RedirectResponse
{
    // redirects to the "admin_articles" route
    return $this->redirectToRoute("admin_main_articles");
}

    /**
     * @Route("admin/users", name="all_users")
     */
   public function allUsers()
   {
     
     $users = $this->userRepository->getAllUsers();
//    dd($users);
     
      return $this->render('admin/user/allusers.html.twig',["users" => $users],);
    }

    
    /**
     * @Route("admin/user/create", name="admin_create_user")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return type
     * @return RedirectResponse/Response
     */
    public function create(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new Users();
        $form = $this->createForm(UserType::class,$user);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
        if(($form->isSubmitted()) && ($form->isValid()))
        {
            $password = $passwordEncoder->encodePassword($user, $user->getplainPassword());
            $user->setPassword($password);
            $user->setRoles(["ROLE_ADMIN"]);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute("all_users");
        }
        
        $forRender["form"] = $form->createView();
        $title = "Новый пользователь";
        return $this->render('admin/user/form.html.twig',["form" => $forRender["form"],"title" => $title],);
    }
}
