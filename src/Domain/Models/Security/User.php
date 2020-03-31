<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: Matthieu
 * Date: 14/12/2018
 * Time: 20:28
 */

namespace App\Domain\Models\Security;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Class User
 * @package App\Domain\Models\Secuity
 *
 * @ORM\Table(name="security.users")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\Security\UserRepository")
 *
 */
class User implements UserInterface
{


    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $username;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $email;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=false)
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $active;

    /**
     * @var array
     *
     * @ORM\Column(type="array", length=100, unique=false, nullable=true)
     */
    private $roles = [];

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=1, unique=false)
     */
    private $civilite;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=false)
     */
    private $firstname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $expireAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=5, unique=false)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=false)
     */
    private $country;

    /**
     * @var Media|null
     *
     * @ORM\OneToOne(targetEntity="Media", cascade={"persist"})
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $profileImage = null;

    /**
     * @var string
     *
     * @ORM\Column(name="validation_account_token", type="string", length=100, unique=true, nullable=true)
     */
    private $validationAccountoken;

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return array_unique($this->roles);
    }

    /**
     * @return string
     */
    public function getCivilite(): string
    {
        return $this->civilite;
    }

    /**
     * @return Media|null
     */
    public function getProfileImage(): ?Media
    {
        return $this->profileImage;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return \DateTime
     */
    public function getExpireAt(): \DateTime
    {
        return $this->expireAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreateAt(): \DateTime
    {
        return $this->createAt;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    public function getSalt()
    {
        return;
    }

    public function eraseCredentials()
    {
        return;
    }

    /**
     * @return null|string
     */
    public function getValidationAccountToken(): ?string
    {
        return $this->validationAccountoken;
    }

    /**
     * @param $username
     * @return string
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param $email
     * @return string
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param $password
     * @return string
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param $active
     * @return bool
     */
    public function setActive($active): bool
    {
        if ($active === true) {
            return $this->active = true;
        } else {
            return $this->active = false;
        }
    }

    /**
     * @param $roles
     * @return $this
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;

        return $this;
    }


    /**
     * @param $postcode
     * @return string
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * @param $city
     * @return string
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @param $country
     * @return string
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }


    /**
     * @param $profilefile
     * @return $this
     */
    public function setProfileImage($profilefile)
    {
        $this->active = $profilefile;

        return $this;
    }


    /**
     * @param $civilite
     * @return $this
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * @param $firstname
     * @return $this
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return $this
     */
    public function setCreateAt()
    {
        $this->createAt = new \DateTime('now');

        return $this;
    }

    /**
     * @return $this
     */
    public function setExpireAt()
    {
        $nowDate = new \DateTime('now');
        $interval = new \DateInterval('P1Y');

        $this->expireAt = $nowDate->add($interval);

        return $this;
    }

    public function __toString()
    {
        return $this;
    }
}
