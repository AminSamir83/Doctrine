<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MediaRepository")
 */
class Media
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
     * @var string
     *
     * @ORM\Column(name="NomMedia", type="string", length=50)
     */
    private $nomMedia;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;


    /**
     * Get id
     *
     * @return int
     */
    /**
     * @var
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Etudiant")
     */
    private $etudiant;
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomMedia
     *
     * @param string $nomMedia
     *
     * @return Media
     */
    public function setNomMedia($nomMedia)
    {
        $this->nomMedia = $nomMedia;

        return $this;
    }

    /**
     * Get nomMedia
     *
     * @return string
     */
    public function getNomMedia()
    {
        return $this->nomMedia;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Media
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set etudiant
     *
     * @param \AppBundle\Entity\Etudiant $etudiant
     *
     * @return Media
     */
    public function setEtudiant(\AppBundle\Entity\Etudiant $etudiant = null)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \AppBundle\Entity\Etudiant
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }
}
