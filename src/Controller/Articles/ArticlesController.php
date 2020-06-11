<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 13/03/2020
 * Time: 08:02
 */

namespace App\Controller\Articles;


use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\RoomRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var ArticleRepository
     */
    private $repository;

    public function __construct(ArticleRepository $repository, EntityManagerInterface $em )
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/news", name="articles")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ArticleRepository $articleRepository, RoomRepository $roomRepository):Response
    {

//        $articles = $paginator->paginate(
//            $this->repository->findAllVisibleArticleQuery(),
//            $request->query->getInt('page', 1), /*page number*/
//            10 /*limit per page*/
//        );
        return $this->render('articles/index.html.twig',[
            'articles' => $articleRepository->findLatestArticleQuery(),
            'rooms' =>$roomRepository->findLatestRoomQuery()

        ]);
    }

    /**
     * @Route("/news/{id}", name="article_show", methods={"GET"})
     */
    public function show(Article $article): Response
    {

        return $this->render('articles/show.html.twig', [
            'article' => $article,
            'articles'=>$this->repository->findLatestArticle()
        ]);
    }
}