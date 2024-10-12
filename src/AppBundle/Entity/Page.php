<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
class Page
{
    private $id;
    private $title;
    private $content;
    private $category;

    public function getId()
    {
        return $this->id;
    }
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function __construct()
    {
        $this->category = new ArrayCollection();
    }
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }
    public function getCategory()
    {
        return $this->category;
    }
}
