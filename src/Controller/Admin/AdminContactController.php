<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 30/03/2020
 * Time: 11:10
 */

namespace App\Controller\Admin;


use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class AdminRoomController
 * @package App\Controller\Admin
 * @Route("/admin/contact", name="admin_contact")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminContactController extends AbstractController
{
    /**
     * @Route("/", name="s", methods={"GET"})
     */
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render('admin/contact/index.html.twig', [
            'contacts' => $contactRepository->findAll(),
        ]);
    }

//    /**
//     * @Route("/new", name="contact_new", methods={"GET","POST"})
//     */
//    public function new(Request $request): Response
//    {
//        $contact = new Contact();
//        $form = $this->createForm(ContactType::class, $contact);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($contact);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('app_bbr_admin_contact_index');
//        }
//
//        return $this->render('admin/contact/new.html.twig', [
//            'contact' => $contact,
//            'form' => $form->createView(),
//        ]);
//    }

    /**
     * @Route("/{id}/show", name="_show", methods={"GET"})
     */
    public function show(Contact $contact): Response
    {
        return $this->render('admin/contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }

//    /**
//     * @Route("/{id}/edit", name="_edit", methods={"GET","POST"})
//     */
//    public function edit(Request $request, Contact $contact): Response
//    {
//        $form = $this->createForm(ContactType::class, $contact);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('app_bbr_admin_contact_index');
//        }
//
//        return $this->render('admin/contact/edit.html.twig', [
//            'contact' => $contact,
//            'form' => $form->createView(),
//        ]);
//    }

    /**
     * @Route("/{id}", name="_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contact $contact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bbr_admin_contacts');
    }
}