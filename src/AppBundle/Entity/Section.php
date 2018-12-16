<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Section
 *
 * @ORM\Table(name="section")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SectionRepository")
 */
class Section
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
     * @ORM\Column(name="nomSection", type="string", length=50)
     */
    private $nomSection;


    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Etudiant",mappedBy="section")
     */
    private $etudiants;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomSection
     *
     * @param string $nomSection
     *
     * @return Section
     */
    public function setNomSection($nomSection)
    {
        $this->nomSection = $nomSection;

        return $this;
    }

    /**
     * Get nomSection
     *
     * @return string
     */
    public function getNomSection()
    {
        return $this->nomSection;
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
     * @return Section
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
