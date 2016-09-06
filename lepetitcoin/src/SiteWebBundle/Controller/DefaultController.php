<?php

namespace SiteWebBundle\Controller;

use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SiteWebBundle\Entity\annonce;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/lpc",name = "home")
     * @Template("SiteWebBundle:Default:annonce.html.twig")
     */
    public function getNews() {
        $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('SiteWebBundle:annonce', 'black');
        $query = $em->createNativeQuery("select * from annonce", $rsm);
        $niouzes = $query->getResult();
        return array('poste' => $niouzes);
    }

    /**
     * @Route("/lpc/ajout")
     * @Template("SiteWebBundle:Default:ajoutAnnonce.html.twig")
     * 
     */
    public function newAnnonce() {

        $niw = new annonce();

        $formBuilder = $this->createFormBuilder($niw);
        $formBuilder->add("titre");
        $formBuilder->add("prix");
        $formBuilder->add("tel");
        $formBuilder->add("image");
        $formBuilder->add("description");
        $formBuilder->add("categorie");
        $formBuilder->add("localite");
        $formBuilder->add("vendeur");
        $formBuilder->add("date");

        $formBuilder->add("save", SubmitType::class);

        $f = $formBuilder->getForm();

        return array("formNews" => $f->createView());
    }

    /**
     * Methode pour ajouter une news
     * lors du click sur le submit du formulaire on execute cette methode
     * Vu que nous avons envoyé des infos via POST on va recuperer les valeurs du post
     * via le parametre $requete
     * @Route("/lpc/ajout/valid",name = "valid")
     * @Template("SiteWebBundle:Default:ajoutAnnonce.html.twig")
     */
    public function addNews(Request $request) {
        //nouvelle instance
        $niw = new annonce();
        //liaison de l'objet avec le formulaire temporaire
        //creation du formulaire tampon
        $formBuilder = $this->createFormBuilder($niw);
        $formBuilder->add("titre");
        $formBuilder->add("prix");
        $formBuilder->add("tel");
        $formBuilder->add("image");
        $formBuilder->add("description");
        $formBuilder->add("categorie");
        $formBuilder->add("localite");
        $formBuilder->add("vendeur");
        $formBuilder->add("date");
        $f = $formBuilder->getForm();
        //on fait quand meme une verif pour s'assurer d'avoir eu un POST comme requete http
        //on lie le formulaire temporaire avec les valeurs de la requete de type post
        //en gros on se retrouve avec un fork de notre formulaire en local ;) 
        $f->handleRequest($request);
        //Partie persistance des données ou l'on sauvegarde notre news en base de données
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($niw);
        $em->flush();


        return $this->redirect($this->generateUrl('home'));
    }

}
