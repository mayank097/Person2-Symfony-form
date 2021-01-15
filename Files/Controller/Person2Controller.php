<?php

namespace App\Controller;

use App\Entity\Person2;
use App\Form\Person2Type;
use App\Repository\Person2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/person2")
 */
class Person2Controller extends AbstractController
{
    /**
     * @Route("/", name="person2_index", methods={"GET"})
     */
    public function index(Person2Repository $person2Repository): Response
    {
        return $this->render('person2/index.html.twig', [
            'person2s' => $person2Repository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="person2_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $person2 = new Person2();
        $form = $this->createForm(Person2Type::class, $person2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($person2);
            $entityManager->flush();

            return $this->redirectToRoute('person2_index');
        }

        return $this->render('person2/new.html.twig', [
            'person2' => $person2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="person2_show", methods={"GET"})
     */
    public function show(Person2 $person2): Response
    {
        return $this->render('person2/show.html.twig', [
            'person2' => $person2,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="person2_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Person2 $person2): Response
    {
        $form = $this->createForm(Person2Type::class, $person2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('person2_index');
        }

        return $this->render('person2/edit.html.twig', [
            'person2' => $person2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="person2_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Person2 $person2): Response
    {
        if ($this->isCsrfTokenValid('delete'.$person2->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($person2);
            $entityManager->flush();
        }

        return $this->redirectToRoute('person2_index');
    }
}
