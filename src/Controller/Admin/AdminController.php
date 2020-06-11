<?php

namespace App\Controller\Admin;

use App\Controller\BaseController;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller
 * @Route("/admin", name="admin_")
 * @Security("is_granted('ROLE_SUPER_ADMIN')")
 */
class AdminController extends BaseController
{
    /**
     * @Route("/", name="home")
     */
    public function home(){

        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/users", name="users")
     */
    public function index()
    {
        return $this->render('admin/users/index.html.twig', [
            'users' => $this->getUsers(),
        ]);
    }

    /**
     * @Route("/user/{user}/edit-roles", name="user_edit_roles")
     * @param User $user
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response|RedirectResponse
     */
    public function editUserRole(User $user,Request $request, EntityManagerInterface $manager){
        $form = $this->createForm(UserType::class,$user);
        if($this->handleForm($request, $form)){
            $manager->persist($user);
            $manager->flush();
            $this->addFlash(
                'success',
                "Les roles de l'utilisateur <strong>{$user->getFullName()}</strong> ont bien été modifiés"
            );

            return $this->redirectToRoute('app_bbr_admin_users');
        }

        return $this->render("admin/users/editUserRoles.html.twig",[
            'user'=>$user,
            "form"=>$form->createView()
        ]);
    }

    public function deleteUser(){

    }
}
