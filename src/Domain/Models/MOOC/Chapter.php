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
 * @package App\Domain\Model\Entity\MOOC
 *
 * @ORM\Table(name="mooc.chapter")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\MOOC\ChapterRepository")
 * @OA\Schema
 */
class Chapter
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @OA\Property(type="integer")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="chapter")
     * @OA\Property(type="integer")
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="Post", mappedBy="chapterid", cascade={"remove"})
     * @OA\Property(type="integer")
     */
    private $post;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     * @OA\Property(type="integer")
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=true)
     *
     * @Assert\NotBlank(
     *      message = "chapter.name.blank"
     * )
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "chapter.name.lengthMin",
     *      maxMessage = "chapter.name.lengthMax"
     * )
     * @OA\Property(type="string")
     *
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\NotBlank(
     *      message = "chapter.slug.blank"
     * )
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "chapter.slug.lengthMin",
     *      maxMessage = "chapter.slug.lengthMax"
     * )
     *
     * @ORM\Column(type="string", length=100, unique=false)
     * @OA\Property(type="string")
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
     * Chapter constructor.
     */
    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection|int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return int
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return int|null
     */
    public function getNumber()
    {
        return $this->number;
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
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param $slug
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @param $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category=$category;

        return $this;
    }

    /**
     * @param $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @param $contents
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if (\is_null($this->getName())) {
            return 'null';
        }
        return $this->getName();
    }
}
