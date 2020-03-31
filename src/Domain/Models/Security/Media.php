<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: Matthieu
 * Date: 07/09/2019
 * Time: 20:28
 */

namespace App\Domain\Models\Security;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Media
 * @package App\Domain\Model\Entity\Security
 *
 * @ORM\Table(name="security.media")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\Security\MediaRepository")
 */
class Media
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
     * @ORM\Column(type="string", length=100, unique=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=false)
     */
    private $alt;

    /**
     * {@inheritdoc}
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function __toString()
    {
        return $this->name;
    }
}
