<?php

namespace App\Entity;

use App\Repository\DiscountRuleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscountRuleRepository::class)
 */
class DiscountRule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rule_expression;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $discount_percent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRuleExpression(): ?string
    {
        return $this->rule_expression;
    }

    public function setRuleExpression(?string $rule_expression): self
    {
        $this->rule_expression = $rule_expression;

        return $this;
    }

    public function getDiscountPercent(): ?float
    {
        return $this->discount_percent;
    }

    public function setDiscountPercent(?float $discount_percent): self
    {
        $this->discount_percent = $discount_percent;

        return $this;
    }
}