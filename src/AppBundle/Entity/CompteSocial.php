<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompteSocial
 *
 * @ORM\Table(name="compte_social")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompteSocialRepository")
 */
class CompteSocial
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
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="typeCompte", type="string", length=50)
     */
    private $typeCompte;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Etudiant", inversedBy="compteSocials")
     */
    private $etudiant;


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
     * Set numero
     *
     * @param integer $numero
     *
     * @return CompteSocial
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set typeCompte
     *
     * @param string $typeCompte
     *
     * @return CompteSocial
     */
    public function setTypeCompte($typeCompte)
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }

    /**
     * Get typeCompte
     *
     * @return string
     */
    public function getTypeCompte()
    {
        return $this->typeCompte;
    }

    /**
     * Set etudiant
     *
     * @param \AppBundle\Entity\Etudiant $etudiant
     *
     * @return CompteSocial
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
