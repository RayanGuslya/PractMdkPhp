<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(Request $request, UserRepository $userRepository): Response
    {
        $search = $request->query->get('search');
        $searchFirstName = $request->query->get('searchFirstName');
        $searchLastName = $request->query->get('searchLastName');
        $searchEmail = $request->query->get('searchEmail');

        // настройка сорт
        $sort = $request->query->get('sort', 'id'); 
        $direction = $request->query->get('direction', 'ASC'); 

        $qb = $userRepository->createQueryBuilder('u');

        if ($search) {
            $qb->andWhere('u.first_name LIKE :search OR u.last_name LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        if ($searchFirstName) {
            $qb->andWhere('u.first_name = :first_name')
               ->setParameter('first_name', $searchFirstName);
        }
    
        if ($searchLastName) {
            $qb->andWhere('u.last_name = :last_name')
               ->setParameter('last_name', $searchLastName);
        }

        if ($searchEmail){
            $qb->andWhere('u.email = :email')
                ->setParameter('email', $searchEmail);
        }
        
        $qb->orderBy('u.' . $sort, $direction);

        $user = $qb->getQuery()->getResult();

        return $this->render('user/index.html.twig', [
            'users' => $user,
            'sort' => $sort,
            'direction' => $direction,
        ]);
    }

    #[Route('/user/{user}', name: 'delete_user', methods: ["DELETE"])]
    public function delete(User $user, EntityManagerInterface $em): Response
    {
        $em->remove($user);
        $em->flush();

        return $this->redirect('/user');
    }

    #[Route('/user/{user}/edit', name: 'edit_user', methods: ["GET", "POST"])]
    public function edit(User $user, EntityManagerInterface $em, Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $user->setFirstName($request->request->get('firstName'));
            $user->setLastName($request->request->get('lastName'));
            $user->setAge($request->request->get('age'));
            $user->setStatus($request->request->get('status'));
            $user->setEmail($request->request->get('email'));
            $user->setTelegram($request->request->get('telegram'));
            $user->setAddress($request->request->get('address'));
    
            $em->flush();
    
            return $this->redirectToRoute('app_user');
        }
    
        return $this->render('user/edit.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/user/create', name: 'create_user', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $user->setFirstName($request->request->get('firstName'));
        $user->setLastName($request->request->get('lastName'));
        $user->setAge($request->request->get('age'));
        $user->setStatus($request->request->get('status'));
        $user->setEmail($request->request->get('email'));
        $user->setTelegram($request->request->get('telegram'));
        $user->setAddress($request->request->get('address'));

        // сохранение в базу
        $entityManager->persist($user);
        $entityManager->flush();

        // перехеод на страницу
        return $this->redirectToRoute('app_user');
    }

    #[Route('/user/create')]
    public function formCreate(): Response
    {
        return $this->render('user/create.html.twig');
    }
}