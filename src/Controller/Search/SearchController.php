<?php

namespace App\Controller\Search;

use App\Controller\BaseController;
use App\Entity\SearchData;
use App\Form\SearchDataType;
use App\Repository\RoomRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class SearchController extends BaseController
{
    /**
     * @Route("/search", name="search")
     * @param Request $request
     * @param RoomRepository $roomRepository
     * @param SerializerInterface $serializer
     * @return JsonResponse|Response
     */
    public function index(Request $request, RoomRepository $roomRepository,SerializerInterface $serializer, NormalizerInterface $normalizer)
    {
        $data = new SearchData();
        $data->page = $request->get('page', 1);

        $form = $this->createForm(SearchDataType::class, $data);
        $form->handleRequest($request);

        if ($request->isXmlHttpRequest()) {
            $dataFromForm = $request->request->all();
            $data->q = $dataFromForm['q'];
            $data->minWeekPrice = intval($dataFromForm['minWeekPrice']);
            $data->maxWeekPrice = intval($dataFromForm['maxWeekPrice']);
            $data->minWeekendPrice = intval($dataFromForm['minWeekendPrice']);
            $data->maxWeekendPrice = intval($dataFromForm['maxWeekendPrice']);
            $data->guestPlaceCount = intval($dataFromForm['guestPlaceCount']);
            $data->equipments = $dataFromForm['equipments'];
            $rooms = $roomRepository->findSearch($data);

            $response = $serializer->serialize($rooms, 'json', [
                'groups' => ['rooms']
            ]);

            return new JsonResponse($response);
        }

        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
            'minMax'=>$roomRepository->findMinMax($data)
        ]);
    }
}
