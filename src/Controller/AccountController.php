<?php



namespace App\Controller;



use App\Entity\PasswordUpdate;

use App\Entity\Role;

use App\Entity\User;

use App\Form\AccountType;

use App\Form\PasswordUpdateType;

use App\Form\RegistrationType;

use DateTime;

use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\ORM\EntityManager;

use Doctrine\ORM\EntityManagerInterface;

use Doctrine\ORM\OptimisticLockException;

use Doctrine\ORM\ORMException;

use Exception;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;

use Symfony\Component\Form\FormError;

use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

use Symfony\Component\Mailer\MailerInterface;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Symfony\Component\Security\Core\Exception\AccountExpiredException;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



/**

 * Class AdminAccountController

 * @package App\Controller

 */

class AccountController extends BaseController

{



    /**

     * Permet d'afficher et de gérer le formulaire de connexion

     *

     * @Route("/login", name="account_login")

     *

     * @param AuthenticationUtils $utils

     * @return Response

     */

    public function login(AuthenticationUtils $utils)

    {

        $error = $utils->getLastAuthenticationError();

        $username = $utils->getLastUsername();





        return $this->render('account/login.html.twig', [

            'hasError' => $error !== null,

            'username' => $username

        ]);

    }



    /**

     * Permet de se déconnecter

     *

     * @Route("/logout", name="account_logout")

     *

     * @return void

     */

    public function logout()

    {



    }



    /**

     * @Route("/register", name="register")

     * @param Request $request

     * @param EntityManagerInterface $manager

     * @param UserPasswordEncoderInterface $encoder

     * @param MailerInterface $mailer

     * @return RedirectResponse|Response

     * @throws Exception

     * @throws TransportExceptionInterface

     */

    public function register(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, MailerInterface $mailer)

    {

        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);

        if ($this->handleForm($request, $form)) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $roleUser = $this->getDoctrine()->getRepository(Role::class)->findOneBy(['role' => "ROLE_USER"]);
            if ($roleUser === null) {
                $roleUser = new Role();
                $roleUser->setRole("ROLE_USER");
                $manager->persist($roleUser);
            }
            $user->addUserRole($roleUser);
            $user->setConfirmationToken(bin2hex(random_bytes(16)));

            try{
                $url = $this->generateUrl('app_bbr_register_confirmation', ['token' => $user->getConfirmationToken()], UrlGeneratorInterface::ABSOLUTE_URL);

                $email = new TemplatedEmail();
                $email->from("no-reply@boulaybeachresort.com")
                    ->to($user->getEmail())
                    ->subject("Inscription")
                    ->htmlTemplate("email/registration.html.twig")
                    ->context([
                        'expiration_date' => new DateTime('+1 days'),
                        'url'=>$url,
                        'user' => $user,
                    ]);
                $mailer->send($email);

                $manager->persist($user);
                $manager->flush();

                $this->addFlash(
                    'success',
                    "Votre compte a bien été créé! Un mail de confirmation a été envoyé à l'adresse mail ".$user->getEmail()
                );

                return $this->redirectToRoute('app_bbr_home');
            }catch (\Exception $e){
                dump($e->getMessage());
                $this->addFlash(
                    'warning',
                    "Un problème lors de l'envoie du mail."
                );
            }

        }

        return $this->render('account/registration.html.twig', [

            'form' => $form->createView()

        ]);

    }





    /**

     * Permet d'afficher et de traiter le formulaire de modification de profil

     *

     * @Route("/account/profile", name="account_profile")

     * @Security("is_granted('ROLE_USER')")

     *

     * @param Request $request

     * @param EntityManager $manager

     * @return Response

     * @throws ORMException

     * @throws OptimisticLockException

     */

    public function profile(Request $request, EntityManagerInterface $manager)

    {

        $user = $this->getUser();



        $form = $this->createForm(AccountType::class, $user);



        //$form->handleRequest($request);



        if ($this->handleForm($request, $form)) {

            $manager->persist($user);

            $manager->flush();



            $this->addFlash(

                'success',

                "Les données du profil ont été enregistrée avec succès !"

            );

        }



        return $this->render('account/profile.html.twig', [

            'form' => $form->createView(),

            'users'=>$user

        ]);

    }



    /**

     * Permet de modifier le mot de passe

     *

     * @Route("/account/password-update", name="account_password")

     * @Security("is_granted('ROLE_USER')")

     * @param Request $request

     * @param UserPasswordEncoderInterface $encoder

     * @param ObjectManager $manager

     * @return Response

     */

    public function updatePassword(Request $request, UserPasswordEncoderInterface $encoder, ObjectManager $manager)

    {

        $passwordUpdate = new PasswordUpdate();



        $user = $this->getUser();



        $form = $this->createForm(PasswordUpdateType::class, $passwordUpdate);



        $form->handleRequest($request);



        if ($this->handleForm($request, $form)) {

            // 1. Vérifier que le oldPassword du formulaire soit le même que le password de l'user

            if (!password_verify($passwordUpdate->getOldPassword(), $user->getHash())) {

                // Gérer l'erreur

                $form->get('oldPassword')->addError(new FormError("Le mot de passe que vous avez tapé n'est pas votre mot de passe actuel !"));

            } else {

                $newPassword = $passwordUpdate->getNewPassword();

                $hash = $encoder->encodePassword($user, $newPassword);



                $user->setHash($hash);



                $manager->persist($user);

                $manager->flush();



                $this->addFlash(

                    'success',

                    "Votre mot de passe a bien été modifié !"

                );



                return $this->redirectToRoute('app_bbr_account_profile');

            }

        }





        return $this->render('account/password.html.twig', [

            'form' => $form->createView()

        ]);

    }



    /**

     * @Route("/register/confirmation/{token}", name="register_confirmation")

     * @param $token

     * @return RedirectResponse

     * @throws Exception

     */

    public function confirmation($token)

    {

        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository(User::class)->findOneByConfirmationToken($token);

        if (null === $user) throw $this->createNotFoundException('Lien de confirmation non valide');

        $now = new DateTime();

        $expireAt = $user->getCreatedAt()->modify('+1 day');

        if ($expireAt < $now) throw new AccountExpiredException('Ce lien a expiré, veuillez vous réinscrire');

        $user->setConfirmationToken(null);

        $em->flush();



        $this->addFlash('confirmed_account', "Vôtre compte a été activé");

        return $this->redirectToRoute("app_bbr_account_login");

    }

}

