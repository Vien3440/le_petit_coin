<?php

namespace SiteWebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * vendeur
 *
 * @ORM\Table(name="vendeur")
 * @ORM\Entity(repositoryClass="SiteWebBundle\Repository\vendeurRepository")
 */
class vendeur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

