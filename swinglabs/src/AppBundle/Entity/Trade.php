<?php
// src/AppBundle/Entity/Trade.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use UserBundle\Entity\User as User;


/**
 * @ORM\Entity
 * @ORM\Table(name="trade")
 */
class Trade
{

    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
    }
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="trades")
     * @ORM\JoinColumn(nullable=false)
     */   
    private $user;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"En attente", "A risque", "Gratuit", "Cloturé", "Annulé"})
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=5)
     * @Assert\NotBlank()
     */
    private $ticker;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     */
    private $stockName;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"Nyse", "Nasdaq", "Euronext"})
     */
    private $market;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */

    private $entryPrice;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */

    private $stopPrice;

    /**
     * @ORM\Column(type="integer")
      * @Assert\Range(
     *      min = 1,
     *      minMessage = "Le nombre d'action ne peut être nul",
     * )
     */

    private $nbOfShares;

    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\Range(
     *      min = 0.01,
     *      max = 100,
     *      minMessage = "Le risque par trade ne peut être nul",
     *      maxMessage = "Le risque par trade ne peut dépasser 100%"
     * )
     */

    private $riskPerTrade;


    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\Range(
     *      min = 0.01,
     *      max = 100,
     *      minMessage = "Ce nombre ne peut être égal à 0",
     *      maxMessage = "Ce pourcentage ne peu être supérieur à 100"
     * )
     */

    private $assetRatio;


    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\Range(
     *      min = 0.01,
     *      minMessage = "Le R1 ne peut être égal à 0",
     * )
     */
    private $r1Price;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
    */
    private $submittedAt;

    /**
     * @ORM\Column(type="date")
    */
    private $executedAt;

    /**
     * @ORM\Column(type="date")
    */
    private $securedAt;

    /**
     * @ORM\Column(type="date")
    */
    private $closedAt;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */    
    private $createdAt;

    /**
     * @ORM\Column(type="text")
     */
    // private $description;

    public function getId() 
    {
        return $this->id;
    }

    public function getUser() 
    {
        return $this->user;
    }

    public function setUser($user) 
    {
        $this->user = $user;
        $this->user->addTrade($this);
    }

    public function getStatus() 
    {
        return $this->status;
    }

    public function setStatus($status) 
    {
        $this->status = $status;
    }

    public function getTicker() 
    {
        return $this->ticker;
    }

    public function setTicker($ticker) 
    {
        $this->ticker = $ticker;
    }

    public function getStockName() 
    {
        return $this->stockName;
    }

    public function setStockName($stockName)
    {
        $this->stockName = $stockName;
    }

    public function getMarket() 
    {
        return $this->market;
    }

    public function setMarket($market) 
    {
        $this->market = $market;
    }

    public function getEntryPrice() 
    {
        return $this->entryPrice;
    }

    public function setEntryPrice($entryPrice) 
    {
        $this->entryPrice = $entryPrice;
    }

    public function getStopPrice() 
    {
        return $this->stopPrice;
    }

    public function setStopPrice($stopPrice) 
    {
        $this->stopPrice = $stopPrice;
    }

    public function getNbOfShares() 
    {
        return $this->nbOfShares;
    }

    public function setNbOfShares($nbOfShares) 
    {
        $this->nbOfShares = $nbOfShares;
    }

    public function getRiskPerTrade() 
    {
        return $this->riskPerTrade;
    }

    public function setRiskPerTrade($riskPerTrade) 
    {
        $this->riskPerTrade = $riskPerTrade;
    }

    public function getAssetRatio() 
    {
        return $this->assetRatio;
    }

    public function setAssetRatio($assetRatio) 
    {
        $this->assetRatio = $assetRatio;
    }

    public function getR1Price() 
    {
        return $this->r1Price;
    }

    public function setR1Price($r1Price) 
    {
        $this->r1Price = $r1Price;
    }

    public function getSubmittedAt() {
        return $this->submittedAt;
    }

    public function setSubmittedAt($submittedAt) 
    {
        $this->submittedAt = $submittedAt;
    }

    public function getExecutedAt() 
    {
        return $this->executedAt;
    }

    public function setExecutedAt($executedAt) 
    {
        $this->executedAt = $executedAt;
    }

    public function getClosedAt() 
    {
        return $this->closedAt;
    }

    public function setClosedAt($closedAt) 
    {
        $this->closedAt = $closedAt;
    }

    public function getCreatedAt() 
    {
        return $this->r1Price;
    }

    public function setCreatedAt() 
    {
    }

}