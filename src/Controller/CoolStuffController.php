<?php

namespace App\Controller;

use App\Entity\CoolStuff;
use App\Form\CoolStuffType;
use App\Repository\CoolStuffRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cool/stuff")
 */
class CoolStuffController extends Controller
{
    /**
     * @Route("/", name="cool_stuff_index", methods="GET")
     */
    public function index(CoolStuffRepository $coolStuffRepository): Response
    {
        return $this->render('cool_stuff/index.html.twig', ['cool_stuffs' => $coolStuffRepository->findAll()]);
    }

    /**
     * @Route("/new", name="cool_stuff_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $coolStuff = new CoolStuff();
        $form = $this->createForm(CoolStuffType::class, $coolStuff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coolStuff);
            $em->flush();

            return $this->redirectToRoute('cool_stuff_index');
        }

        return $this->render('cool_stuff/new.html.twig', [
            'cool_stuff' => $coolStuff,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cool_stuff_show", methods="GET")
     */
    public function show(CoolStuff $coolStuff): Response
    {
        return $this->render('cool_stuff/show.html.twig', ['cool_stuff' => $coolStuff]);
    }

    /**
     * @Route("/{id}/edit", name="cool_stuff_edit", methods="GET|POST")
     */
    public function edit(Request $request, CoolStuff $coolStuff): Response
    {
        $form = $this->createForm(CoolStuffType::class, $coolStuff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cool_stuff_edit', ['id' => $coolStuff->getId()]);
        }

        return $this->render('cool_stuff/edit.html.twig', [
            'cool_stuff' => $coolStuff,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cool_stuff_delete", methods="DELETE")
     */
    public function delete(Request $request, CoolStuff $coolStuff): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coolStuff->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coolStuff);
            $em->flush();
        }

        return $this->redirectToRoute('cool_stuff_index');
    }
}
