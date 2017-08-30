<?php

namespace MoneyManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Trade;
use MoneyManagementBundle\Form\Type\TradeFormType;

class TradeController extends Controller
{
	public function indexAction(Request $request)
	{
		// return $this->render('MoneyManagementBundle:Trade:trading_overview.html.twig');
		return $this->getAllAction($request,'all');
	}

	public function newAction(Request $request)
	{
		$trade = new Trade();
 		$form = $this->createForm(TradeFormType::class, $trade);

 		$form->handleRequest($request);
 		if ($form->isSubmitted() && $form->isValid()) {
 			
 			$em->persist($trade);
 			$em->flush();

 			$request->getSession()->getFlashBag()->add('success', "Le trade a bien été enregistré.");

      // On redirige vers la page de visualisation de l'annonce nouvellement créée
 			return $this->redirect($this->generateUrl('awaiting_trades'));
 		}
 		else {
 			return $this->render('MoneyManagementBundle:Trade:new_trade.html.twig',array('form' => $form->createView(), 'trade' => $trade));
 		}
	}

	public function getAllAction(Request $request, $filter) 
	{

		$user = $this->getUser();
		$repository = $this
 		->getDoctrine()
 		->getManager()
 		->getRepository('AppBundle:Trade');
 		$trades = $repository->findAll();

 		return $this->render('MoneyManagementBundle:Trade:all_trades.html.twig', array('trades' => $trades));
		// if (strcmp($filter, "awaiting-trades") == 0) {
		// 	getAllAwaitingTradesAction();
		// }
		// else if (strcmp ($filter, "unsafe-trades") == 0) {

		// }
		// else if
	}

	public function getAllAwaitingTradesAction() 
	{

	}

	public function getAllUnsafeTradesAction() 
	{

	}

	public function getAllSafeTradesAction()
	{

	}

	

	public function setUnsafeAction(Request $request, $tradeID)
	{

	}

	public function setSafeAction(Request $request, $tradeID) 
	{

	}
}
