<?php

namespace App\Controller\Admin;

use App\Controller\BaseController;
use App\Entity\Image;
use App\Form\ImageType;
use App\Service\UploadImage;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/image", name="admin_image_")
 * Class AdminImageController
 * @package App\Controller\Admin
 * @Security("is_granted('ROLE_SUPER_ADMIN')")
 */
class AdminImageController extends BaseController
{
    /**
     * @Route("s", name="index")
     */
    public function index()
    {
        return $this->render('admin/images/index.html.twig', [
            'images' => $this->getImages(),
        ]);
    }

    /**
     * @Route("/new", name="new")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param UploadImage $uploadImage
     * @return Response
     */
    public function new(Request $request, EntityManagerInterface $manager, UploadImage $uploadImage){
        $image = new Image();
        $form = $this->createForm(ImageType::class, $image);
        if($this->handleForm($request, $form)){
            $uploadImage->persistImage($image);
            $manager->flush();
            $this->addFlash(
                'success',
                "L'image a bien été créée"
            );
        }
        return $this->render("admin/images/new.html.twig",[
            "form"=>$form->createView()
        ]);
    }
}
