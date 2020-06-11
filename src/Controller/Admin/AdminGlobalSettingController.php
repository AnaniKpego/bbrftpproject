<?php

namespace App\Controller\Admin;

use App\Controller\BaseController;
use App\Entity\GlobalSetting;
use App\Form\GlobalSettingType;
use App\Repository\GlobalSettingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminGlobalSettingController
 * @package App\Controller\Admin
 * @Route("/admin/global-setting", name="admin_global_setting")
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdminGlobalSettingController extends BaseController
{

    private function createOrEdit($request, $form, $globalSetting, $typeFlash, $messageFlash)
    {
        $manager = $this->getDoctrine()->getManager();
        dump($form);
        if ($this->handleForm($request, $form)) {
            $manager->persist($globalSetting);
            $manager->flush();
            $this->addFlash($typeFlash, $messageFlash);
        }
    }

    /**
     * @Route("/new", name="_new")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param GlobalSettingRepository $globalSettingRepository
     * @return Response
     */
    public function new(Request $request, EntityManagerInterface $manager, GlobalSettingRepository $globalSettingRepository)
    {
        $globalSettings = $globalSettingRepository->findAll();
        if (count($globalSettings) > 1) {
            $this->addFlash(
                'warning',
                "Impossible d'ajouter plusieurs paramètres. Modifiez le paramètre existant"
            );
        }

        $globalSetting = new GlobalSetting();
        $form = $this->createForm(GlobalSettingType::class, $globalSetting);
        $this->createOrEdit($request, $form, $globalSetting, 'success', 'Vos paramères ont été enrégistrés avec succès');

        return $this->render("admin/global_setting/new.html.twig", [
            'global_setting' => $globalSetting,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{globalSetting}/edit", name="_edit")
     * @param Request $request
     * @param GlobalSetting $globalSetting
     * @return Response
     */
    public function edit(Request $request, GlobalSetting $globalSetting){
        $form = $this->createForm(GlobalSettingType::class,$globalSetting);
        $this->createOrEdit($request,$form,$globalSetting,'success',"Vos paramètres ont été mis à jour avec succès");
        return $this->render("admin/global_setting/new.html.twig", [
            'global_setting' => $globalSetting,
            'form' => $form->createView()
        ]);
    }

}
