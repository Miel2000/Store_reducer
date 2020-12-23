<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\DiscountRule;
use App\Form\DiscountRuleType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StoreController extends AbstractController
{
    /**
     * @Route("/store", name="store")
     */
    public function index(EntityManagerInterface $em,Request $request, ProductRepository $productRepo): Response
{

        $discountRule = new DiscountRule();
        $form = $this->createForm(DiscountRuleType::class, $discountRule);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $discountRule = $form->getData();

            $em->persist($discountRule);
            $em->flush();
        }


        return $this->render('store/index.html.twig', [
            'yeet' => 'yeboi',
            'form' => $form->createView(),
            'products' => $productRepo->findAll()
      
        ]);
    }
}
