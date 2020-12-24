<?php

namespace App\Entity;

use App\Entity\DiscountRule;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    public $discounted_price;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $type;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDiscountedPrice(): ?float
    {
        return $this->discounted_price;
    }

    public function setDiscountedPrice(?float $discounted_price, Product $product): self
    {
    

        $this->discounted_price = $discounted_price;
        $reducer = 0.30; 
      
        if($this->getPrice() >= 100 && ($product->getType() === 'Electro-ménager') ){

            $reducedPrice = $this->getPrice() - ($this->getPrice()  * $reducer);
            $this->discounted_price = $reducedPrice;
            return $this;

        } else {

            $this->discounted_price = null;
            return $this;
        }

    }

    public function getType(): ?string
    {
      
            return $this->type;
        
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
