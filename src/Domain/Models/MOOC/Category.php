<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: Matthieu
 * Date: 07/09/2019
 * Time: 20:28
 */

namespace App\Domain\Models\MOOC;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Annotations as OA;

/**
 * Class Chapter
 * @package App\Domain\Model\MOOC
 *
 * @ORM\Table(name="mooc.category")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\MOOC\CategoryRepository")
 * @OA\Schema
 */
class Category
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @OA\Property(type="integer")
     */
    private $id;

    /**
     * @var string
     *
    /**
     * @var string
     * @ORM\OneToMany(targetEntity="Chapter", mappedBy="category", cascade={"remove"})
     * @OA\Property(type="integer")
     */
    private $chapter;

    /**
     * @var string|null
     *
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     * @OA\Property(type="string", nullable=false)
     */
    private $pictureName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=true)
     * @OA\Property(type="string", nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=false)
     * @OA\Property(type="string", nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=3, unique=false, nullable=false)
     * @OA\Property(type="string", nullable=false)
     *
     */
    private $language;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->chapter = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getChapter()
    {
        return $this->chapter;
    }

    /**
     * @return null|string
     */
    public function getPictureName(): ?string
    {
        return $this->pictureName;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return null|string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param $chapter
     * @return $this
     */
    public function setChapter($chapter)
    {
        $this->chapter=$chapter;

        return $this;
    }

    /**
     * @param $pictureName
     * @return $this
     */
    public function setPictureName($pictureName)
    {
        $this->pictureName = $pictureName;

        return $this;
    }

    /**
     * @param $language
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @param $name
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param $slug
     * @return string
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return null|string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
