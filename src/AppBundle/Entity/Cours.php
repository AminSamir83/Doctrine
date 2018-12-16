<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CoursRepository")
 */
class Cours
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
     * @ORM\Column(name="nomCours", type="string", length=50)
     */
    private $nomCours;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    /**
     * Get id
     *
     * @return int
     */
    /**
     * @var
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Etudiant",inversedBy="cours",mappedBy="cours")
     */
    private $etudiants;
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomCours
     *
     * @param string $nomCours
     *
     * @return Cours
     */
    public function setNomCours($nomCours)
    {
        $this->nomCours = $nomCours;

        return $this;
    }

    /**
     * Get nomCours
     *
     * @return string
     */
    public function getNomCours()
    {
        return $this->nomCours;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cours
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etudiants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add etudiant
     *
     * @param \AppBundle\Entity\Etudiant $etudiant
     *
     * @return Cours
     */
    public function addEtudiant(\AppBundle\Entity\Etudiant $etudiant)
    {
        $this->etudiants[] = $etudiant;

        return $this;
    }

    /**
     * Remove etudiant
     *
     * @param \AppBundle\Entity\Etudiant $etudiant
     */
    public function removeEtudiant(\AppBundle\Entity\Etudiant $etudiant)
    {
        $this->etudiants->removeElement($etudiant);
    }

    /**
     * Get etudiants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtudiants()
    {
        return $this->etudiants;
    }
}
