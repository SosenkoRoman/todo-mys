<?php

namespace App\Controller;

use App\Form\TodoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Todo;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;

class TodoController extends Controller
{
    /**
     * @Route("/todo", name="todo")
     */
    public function index()
    {
        $todos = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->findAll();

        dump($todos);

        return $this->render('todo/index.html.twig', [
            'controller_name' => 'TodoController',
            'todos' => $todos
        ]);
    }

    /**
     * @Route("/todo/view/{id}", name="todo_view")
     */
    public function view(int $id)
    {
        $todo = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->find($id);



        return $this->render('todo/view.html.twig', [
            'todo' => $todo
        ]);
    }

    /**
     * @Route("/todo/edit/{id}", name="todo_edit")
     */
    public function edit(int $id, Request $request)
    {
        $todo = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->find($id);

             $serializer = new Serializer(array(new DateTimeNormalizer()));
             $dateAsObject = $serializer->denormalize('2016-01-01T00:00:00+00:00', \DateTime::class));

             $todo->setCreateDate($dateAsObject);

        $form = $this->createForm(TodoType::class, $todo);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            dump($data);
        }

        return $this->render('todo/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}