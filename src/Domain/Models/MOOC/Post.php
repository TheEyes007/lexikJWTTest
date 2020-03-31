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
 * Class Post
 * @package App\Domain\Model\Entity\MOOC
 *
 * @ORM\Table(name="mooc.posts")
 * @ORM\Entity(repositoryClass="App\Domain\Repository\MOOC\PostRepository")
 * @OA\Schema
 */
class Post
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @OA\Property(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Chapter", inversedBy="post")
     * @ORM\JoinColumn(name="chapter_id", referencedColumnName="id")
     * @OA\Property(type="integer")
     */
    private $chapterid;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="App\Domain\Models\Security\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @OA\Property(type="integer")
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=true)
     * @OA\Property(type="string", nullable=true)
     *
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=false)
     * @OA\Property(type="string", nullable=false)
     *
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=false)
     * @OA\Property(type="string", nullable=false)
     *
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @OA\Property(type="text")
     *
     */
    private $contents;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100, unique=false, nullable=true)
     * @OA\Property(type="string", nullable=true)
     */
    private $slug;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     * @OA\Property(type="string", nullable=true)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=3, unique=false, nullable=false)
     * @OA\Property(type="string", nullable=false)
     */
    private $language;

    /**
     * Post constructor.
     */
    public function __construct(){
        $this->chapterid = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userid;
    }

    /**
     * @return int|null
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return ArrayCollection
     */
    public function getChapterId()
    {
        return $this->chapterid;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return null|string
     */
    public function getContents(): ?string
    {
        return $this->contents;
    }

    /**
     * @return null|string
     */
    public function getTags(): ?string
    {
        return $this->tags;
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
     * @param $userid
     * @return $this
     */
    public function setUserId($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    public function setChapterId($chapterid)
    {
        $this->chapterid = $chapterid;

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
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * @param $tags
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @param $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param $contents
     * @return $this
     */
    public function setContents($contents)
    {
        $this->contents = $contents;

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
}
