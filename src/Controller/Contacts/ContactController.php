<?php

namespace App\Controller\Contacts;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ContactController
 * @package App\Controller\Contacts
 * @Route("/contact", name="contact")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/thankyou", name="_thankyou")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render('contact/thankYou.html.twig', [
            'contacts' => $contactRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('app_bbr_contact_thankyou');
        }

        return $this->render('contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
            'current_menu'=>'contact'
        ]);
    }

//    /**
//     * @Route("/{id}", name="_show", methods={"GET"})
//     */
//    public function show(Contact $contact): Response
//    {
//        return $this->render('contact/show.html.twig', [
//            'contact' => $contact,
//        ]);
//    }

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
//            return $this->redirectToRoute('contact_index');
//        }
//
//        return $this->render('contact/edit.html.twig', [
//            'contact' => $contact,
//            'form' => $form->createView(),
//        ]);
//    }

//    /**
//     * @Route("/{id}", name="contact_delete", methods={"DELETE"})
//     */
//    public function delete(Request $request, Contact $contact): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->remove($contact);
//            $entityManager->flush();
//        }
//
//        return $this->redirectToRoute('contact_index');
//    }
}
