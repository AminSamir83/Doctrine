<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtudiantRepository")
 */
class Etudiant
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="cin", type="integer", unique=true)
     */
    private $cin;

    /**
     * @var
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Media",mappedBy="etudiant")
     */
    private $media;


    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Section",inversedBy="etudiants")
     */
    private $section;
    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CompteSocial",mappedBy="etudiant")
     */
    private $compteSocials;
    /**
     * Get id
     *
     * @return int
     */
    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Cours",mappedBy="etudiants",inversedBy="etudiants")
     */
    private $cours;
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Etudiant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Etudiant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set cin
     *
     * @param integer $cin
     *
     * @return Etudiant
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return int
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set media
     *
     * @param \AppBundle\Entity\Media $media
     *
     * @return Etudiant
     */
    public function setMedia(\AppBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \AppBundle\Entity\Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set section
     *
     * @param \AppBundle\Entity\Section $section
     *
     * @return Etudiant
     */
    public function setSection(\AppBundle\Entity\Section $section = null)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return \AppBundle\Entity\Section
     */
    public function getSection()
    {
        return $this->section;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->compteSocials = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add compteSocial
     *
     * @param \AppBundle\Entity\CompteSocial $compteSocial
     *
     * @return Etudiant
     */
    public function addCompteSocial(\AppBundle\Entity\CompteSocial $compteSocial)
    {
        $this->compteSocials[] = $compteSocial;

        return $this;
    }

    /**
     * Remove compteSocial
     *
     * @param \AppBundle\Entity\CompteSocial $compteSocial
     */
    public function removeCompteSocial(\AppBundle\Entity\CompteSocial $compteSocial)
    {
        $this->compteSocials->removeElement($compteSocial);
    }

    /**
     * Get compteSocials
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompteSocials()
    {
        return $this->compteSocials;
    }

    /**
     * Add cour
     *
     * @param \AppBundle\Entity\Cours $cour
     *
     * @return Etudiant
     */
    public function addCour(\AppBundle\Entity\Cours $cour)
    {
        $this->cours[] = $cour;

        return $this;
    }

    /**
     * Remove cour
     *
     * @param \AppBundle\Entity\Cours $cour
     */
    public function removeCour(\AppBundle\Entity\Cours $cour)
    {
        $this->cours->removeElement($cour);
    }

    /**
     * Get cours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCours()
    {
        return $this->cours;
    }
}
