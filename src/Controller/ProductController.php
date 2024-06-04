<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'app_products')]
    public function index(EntityManagerInterface $em, PaginatorInterface $paginator, Request $request): Response
    {
		
		$dql   = "SELECT p FROM App\Entity\Product p WHERE p.quantity > 0";
		
		$query = $em->createQuery($dql);
		$pagination = $paginator->paginate(
			$query, /* query NOT result */
			$request->query->getInt('page', 1), /*page number*/
			10 /*limit per page*/
		);
        return $this->render('product/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }
	
	#[Route('/product/{id}', name: 'app_product')]
    public function show(ManagerRegistry $doctrine, $id): Response
    {
		$product = $doctrine->getRepository(Product::class)->findOneBy(['id'  => $id]); 

		return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
		
    }
	
	#[Route('/add-to-cart/{id}', name: 'app_add_to_cart')]
    public function add(ManagerRegistry $doctrine, Request $request, $id): Response
    {
		$session = $request->getSession();
		$products = $session->get('products', []);
		if (isset($products[$id])) {
			$products[$id]++;
		} else {
			$products[$id] = 1;
		}
		$session->set('products', $products);
		$route = $request->headers->get('referer');

		return $this->redirect('/products');
		
    }
}
