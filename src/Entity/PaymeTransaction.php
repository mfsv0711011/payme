<?php declare(strict_types=1);

namespace Kadirov\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Kadirov\Component\Billing\Payment\Payme\Constants\PaymeTransactionState;
use Kadirov\Component\Billing\Payment\Payme\Dtos\PaymeRequestDto;
use Kadirov\Controller\PaymeInputAction;
use Kadirov\Controller\PaymeTransactionCreateAction;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     itemOperations = {
 *          "get" = { "security" = "is_granted('ROLE_ADMIN')" },
 *     },
 *     collectionOperations = {
 *          "post" = {
 *              "method" = "post",
 *              "path" = "payments/payme",
 *              "deserialize" = false,
 *              "input" = PaymeRequestDto::class,
 *              "controller" = PaymeInputAction::class,
 *              "output" = false,
 *          },
 *          "make" = {
 *              "method" = "post",
 *              "controller" = PaymeTransactionCreateAction::class,
 *          },
 *     }
 * )
 * @see PaymeRequestDto
 * @see PaymeInputAction
 * @see TestController
 * @see PaymeTransactionCreateAction
 * @ORM\Entity(repositoryClass="Kadirov\Repository\PaymeTransactionRepository")
 */
class PaymeTransaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paymeId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $time;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amount;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $createTime;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $performTime;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $cancelTime;

    /**
     * A constant of {@see PaymeTransactionState}
     *
     * @see PaymeTransactionState
     * @ORM\Column(type="integer")
     */
    private $state;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reason;

    /**
     * Type of payment on your system.
     * for example: Plan, Buy products etc.
     *
     * @ORM\Column(type="integer")
     */
    private $customType;

    /**
     * ID of payment on your system.
     * for example: Plan id, or id of buying products
     *
     * @ORM\Column(type="integer")
     */
    private $customId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymeId(): ?string
    {
        return $this->paymeId;
    }

    public function setPaymeId(?string $paymeId): self
    {
        $this->paymeId = $paymeId;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(?int $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCreateTime(): int
    {
        return (int)$this->createTime;
    }

    public function setCreateTime(?int $createTime): self
    {
        $this->createTime = $createTime;

        return $this;
    }

    public function getPerformTime(): int
    {
        return (int)$this->performTime;
    }

    public function setPerformTime(?int $performTime): self
    {
        $this->performTime = $performTime;

        return $this;
    }

    public function getCancelTime(): int
    {
        return (int)$this->cancelTime;
    }

    public function setCancelTime(?int $cancelTime): self
    {
        $this->cancelTime = $cancelTime;

        return $this;
    }

    /**
     * @return int|null A constant of {@see PaymeTransactionState}
     */
    public function getState(): ?int
    {
        return $this->state;
    }

    /**
     * @param int $state A constant of {@see PaymeTransactionState}
     *
     * @return $this
     */
    public function setState(int $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getReason(): ?int
    {
        return $this->reason;
    }

    public function setReason(?int $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function getCustomType(): ?int
    {
        return $this->customType;
    }

    public function setCustomType(?int $customType): self
    {
        $this->customType = $customType;

        return $this;
    }
}
