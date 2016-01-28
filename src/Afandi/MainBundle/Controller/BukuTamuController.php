<?php

namespace Afandi\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Afandi\MainBundle\Entity\BukuTamu;
use Afandi\MainBundle\Form\Type\BukuTamuType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class BukuTamuController extends Controller
{
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('AfandiMainBundle:BukuTamu')
            ->findAllBukuTamuPagination();

        $paginator  = $this->get('knp_paginator');
        $bukutamu = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );

        return $this->render('AfandiMainBundle:BukuTamu:index.html.twig', array(
            'bukutamu' => $bukutamu
        ));
    }

    public function addAction(Request $request)
    {
        $bukutamu = new BukuTamu();

        $form = $this->createForm(BukuTamuType::class, $bukutamu, array(
            'method' => 'POST',
        ));

        $errors = null;

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $validator = $this->get('validator');
            $errors = $validator->validate($bukutamu);

            if (count($errors) == 0 && $form->isValid()) {

                $nama = $form->getData()->getNama();
                $pesan = $form->getData()->getPesan();
                $file = $form->getData()->getImageFile();

                $bukutamu->setNama($nama);
                $bukutamu->setPesan($pesan);
                $bukutamu->setImageFile($file);

                $em = $this->getDoctrine()->getManager();

                $em->persist($bukutamu);
                $em->flush();

                $this->addFlash(
                    'notice',
                    'Buku Tamu Saved'
                );

            }

        }

        return $this->render('AfandiMainBundle:BukuTamu:form.html.twig', array(
            'form' => $form->createView(),
            'errors' => $errors 
        ));
    }

    public function editAction($id, Request $request)
    {

        $repository = $this->getDoctrine()
            ->getRepository('AfandiMainBundle:BukuTamu');

        $bukutamu = $repository->findOneById($id);

        if (!$bukutamu) {
            return $this->render('AfandiMainBundle:BukuTamu:form.html.twig', array(
                'form' => null
            ));
        }

        $errors = null;

        $form = $this->createForm(BukuTamuType::class, $bukutamu, array(
            'method' => 'POST',
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $validator = $this->get('validator');
            $errors = $validator->validate($bukutamu);

            if (count($errors) == 0 && $form->isValid()) {

                $nama = $form->getData()->getNama();
                $pesan = $form->getData()->getPesan();
                $file = $form->getData()->getImageFile();

                $bukutamu->setNama($nama);
                $bukutamu->setPesan($pesan);
                $bukutamu->setImageFile($file);

                $em = $this->getDoctrine()->getManager();

                $em->flush();

                $this->addFlash(
                    'notice',
                    'Buku Tamu Update'
                );
            }

        }

        return $this->render('AfandiMainBundle:BukuTamu:form.html.twig', array(
            'form' => $form->createView(),
            'errors' => $errors
        ));
    }

    public function deleteAction($id)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AfandiMainBundle:BukuTamu');

        $bukutamu = $repository->findOneById($id);

        if (!$bukutamu) {
            $this->addFlash(
                'notice_nulldata',
                'Buku Tamu tidak ada'
            );

            return new RedirectResponse($this->generateUrl('bukutamu_index'));
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($bukutamu);
        $em->flush();   

        $this->addFlash(
            'notice',
            'Buku Tamu Deleted'
        );

        return new RedirectResponse($this->generateUrl('bukutamu_index'));
    }

}
