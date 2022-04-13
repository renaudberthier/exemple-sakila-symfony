<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Store
 *
 * @ORM\Table(name="store", uniqueConstraints={@ORM\UniqueConstraint(name="idx_unique_manager", columns={"manager_staff_id"})}, indexes={@ORM\Index(name="idx_fk_address_id", columns={"address_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\StoreRepository")
 */
class Store
{
    /**
     * @var bool
     *
     * @ORM\Column(name="store_id", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $storeId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_update", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $lastUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var \Staff
     *
     * @ORM\ManyToOne(targetEntity="Staff")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="manager_staff_id", referencedColumnName="staff_id")
     * })
     */
    private $managerStaff;

    /**
     * @var \Address
     *
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address_id", referencedColumnName="address_id")
     * })
     */
    private $address;

    public function getStoreId(): ?bool
    {
        return $this->storeId;
    }

    public function getLastUpdate(): ?\DateTimeInterface
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate(\DateTimeInterface $lastUpdate): self
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    public function getManagerStaff(): ?Staff
    {
        return $this->managerStaff;
    }

    public function setManagerStaff(?Staff $managerStaff): self
    {
        $this->managerStaff = $managerStaff;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }


}
