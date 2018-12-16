<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PersonneController
 * @package AppBundle\Controller
 *
 * @Route("/personne")
 */

class PersonneController extends Controller
{
    /**
     * @Route("/list")
     */
    public function listAction()
    {
        $doctrine= $this->getDoctrine();
        $repository= $doctrine->getRepository('AppBundle:Personne');
        //$personnes= $repository->getPersonneByAgeInterval(20,30);
        $personnes=$repository->findAll();
        return $this->render('@App/Personne/list.html.twig', array('personnes'=>$personnes
            // ...
        ));
    }

    /**
     * @Route("/add/{nom}/{prenom}/{age}/{path}",requirements={"age":"^[1-9][0-9]$","path":".*\.jpg$|.*\.jpeg$|.*\.png$"})
     */
    public function addAction(Request $request, $nom,$prenom,$age,$path)
    {

        $session= $request->getSession();


            $filename = "D://Xampp//htdocs//Doctrine//web//images//".$path;
            if (! file_exists($filename)) {
                $path="default.jpg";
            }
        $personne = new Personne($nom,$prenom,$age,$path);
        $em= $this->getDoctrine()->getManager();
        $em->persist($personne);
        $em->flush();

        $session->getFlashBag()->add('success','Personne ajoutée avec succès');

        return $this->forward('AppBundle:Personne:list');
    }

    /**
     * @Route("/update/{personne}/{nom}/{prenom}/{age}/{path}",requirements={"age":"^[1-9][0-9]$","path":".*\.jpg$|.*\.jpeg$|.*\.png$"})
     */
    public function updateAction(Request $request,Personne $personne=null,$nom,$prenom,$age,$path)
    {

        $filename = "D://Xampp//htdocs//Doctrine//web//images//".$path;
        if (! file_exists($filename)) {
            $path="default.jpg";
        }
        if ($personne) {
            $personne->setNom($nom);
            $personne->setPrenom($prenom);
            $personne->setPath($path);
            $personne->setAge($age);
            $em = $this->getDoctrine()->getManager();
            $em->persist($personne);
            $em->flush();
            $session = $request->getSession();
            $session->getFlashBag()->add('success','Personne mise à jour avec succès');
        }
        else {
            $session = $request->getSession();
            $session->getFlashBag()->add('error','Personne inexistante');


        }

        return $this->render('@App/Personne/update.html.twig', array( 'personne' => $personne
            // ...
        ));
    }
    /**
     * @Route("/delete/{personne}")
     */
    public function deleteAction (Request $request,Personne $personne=null) {
        $session = $request->getSession();
        if (!$personne){
            $session->getFlashBag()->add('error','Personne inexistante');
        }
        else {
            $em= $this->getDoctrine()->getManager();
            $em->remove($personne);
            $em->flush();
            $session->getFlashBag()->add('success','Personne supprimée avec succès');
        }
        return $this->forward('AppBundle:Personne:list');

    }
    /**
     * @Route("/showPersonne",name="showPersonne")
     */
    public function showPersonneAction (Request $request) {
        $id=$_GET['id'];
        $session = $request->getSession();
        $repository= $this->getDoctrine()->getRepository('AppBundle:Personne');
        $personne = $repository->find($id);
        if (!$personne){
            $session->getFlashBag()->add('error','Personne inexistante');
        }
        else {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personne);
            $em->flush();
            $session->getFlashBag()->add('success','Personne affichée avec succès');
        }
        return $this->render('@App/Personne/showPersonne.html.twig', array( 'personne' => $personne
            // ...
        ));

    }

    /**
     * @Route("/findByAge/{age}",name="findByAgePage")
     */


    public function findByAgeAction($age)
    {
        $doctrine= $this->getDoctrine();
        $repository= $doctrine->getRepository('AppBundle:Personne');
        //$personnes= $repository->getPersonneByAgeInterval(20,30);
        $personnes=$repository->findBy(array('age'=>$age),array('prenom'=>'Asc'));
        return $this->render('@App/Personne/list.html.twig', array('personnes'=>$personnes
            // ...
        ));
    }

    /**
     * @Route("/findByNom/{nom}",name="findByNomPage")
     */


    public function findByNomAction($nom)
    {
        $doctrine= $this->getDoctrine();
        $repository= $doctrine->getRepository('AppBundle:Personne');
        //$personnes= $repository->getPersonneByAgeInterval(20,30);
        $personnes=$repository->findBy(array('nom'=>$nom),array('prenom'=>'Asc'));
        return $this->render('@App/Personne/list.html.twig', array('personnes'=>$personnes
            // ...
        ));
    }

}
