<?php

namespace App\Controller\Contact;

use App\Controller\AbstractSimplecController;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Role\Role;

class ViewController extends AbstractSimplecController
{

    protected $em;
    protected $contactlist;

    public function __construct(EntityManagerInterface $em,ContactRepository $contactlist)
    {
        $this->em = $em;
        $this->contactlist = $contactlist;
    }
    

    /**
     * @Route("/contact-view/{id}", name="app_contact_view")
     */
    public function index($id, Request $request): Response
    {
        if($this->isFullyLoggedIn()){
            $contact = $this->contactlist->find($id);

            return $this->render('contact/view.html.twig', [
                'contact'=> $contact
            ]);    
        }
       
        return $this->redirectToRoute('app_login');

    }
}
