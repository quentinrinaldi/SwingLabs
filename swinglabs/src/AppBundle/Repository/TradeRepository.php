<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TradegRepository extends EntityRepository {

	public function getAwaitingTrades($userID) {
		$qb = $this
  			->createQueryBuilder('trade')
  				->where("trade.user = :userID AND trade.recording = :recordingID AND reg.user = :userID AND reg.state='En Attente'")
  				->setParameter('userID', $userID);
	}

	public function getUnsafeTrades($userID) {
		$qb = $this
  			->createQueryBuilder('trade')
  				->where("trade.user = :userID AND trade.recording = :recordingID AND reg.user = :userID AND reg.state='A risque'")
  				->setParameter('userID', $userID);
	}

	public function getSafeTrades($userID) {
		$qb = $this
  			->createQueryBuilder('trade')
  				->where("trade.user = :userID AND trade.recording = :recordingID AND reg.user = :userID AND reg.state='Gratuit'")
  				->setParameter('userID', $userID);
	}

	public function getClosedTrades($userID) {
		$qb = $this
  			->createQueryBuilder('trade')
  				->where("trade.user = :userID AND trade.recording = :recordingID AND reg.user = :userID AND reg.state='Cloturé'")
  				->setParameter('userID', $userID);
	}

	public function getCanceledTrades($userID) {
		$qb = $this
  			->createQueryBuilder('trade')
  				->where("trade.user = :userID AND trade.recording = :recordingID AND reg.user = :userID AND reg.state='Annulé'")
  				->setParameter('userID', $userID);
	}
}