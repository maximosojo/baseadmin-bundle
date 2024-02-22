<?php

namespace Maximosojo\Bundle\BaseAdminBundle\Model\User;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Modelo de usuario
 *
 * @author Máximo Sojo <maxsojo13@gmail.com>
 */
abstract class ModelUser extends BaseUser
{
    /**
     * Nombre
     * @var string
     */
    #[ORM\Column(name: 'firstname', type: 'string', length: 100, nullable: true)]
    protected $firstname;
    
    /**
     * Apellido
     * @var string
     */
    #[ORM\Column(name: 'lastname', type: 'string', length: 100, nullable: true)]
    protected $lastname;

    /**
     * Fecha de nacimiento
     * @var \Datetime
     */
    #[ORM\Column(name: 'birthday', type: 'datetime', nullable: true)]
    protected $birthday;

    /**
     * Idioma y pais
     * @var string
     */
    #[ORM\Column(name: 'locale', type: 'string', length: 8, nullable: true)]
    protected $locale = 'es_VE';

    /**
     * @var string
     */
    #[ORM\Column(name: 'timezone', type: 'string', length: 64, nullable: true)]
    protected $timezone;

    /**
     * @var boolean
     */
    #[ORM\Column(name: 'locked', type: 'boolean')]
    protected $locked = false;

    /**
     * @var GroupInterface
     */
    protected $groups;

    public function __construct()
    {
        parent::__construct();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): static
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): static
    {
        $this->locale = $locale;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): static
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function isLocked(): ?bool
    {
        return $this->locked;
    }

    public function setLocked(bool $locked): static
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * @return Collection<int, Group>
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(GroupInterface $group): static
    {
        if (!$this->groups->contains($group)) {
            $this->groups->add($group);
        }

        return $this;
    }

    public function removeGroup(GroupInterface $group): static
    {
        $this->groups->removeElement($group);

        return $this;
    }
}