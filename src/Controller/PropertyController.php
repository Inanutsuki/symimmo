<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @Route("/biens", name="property-index")
     */
    public function index(Request $request): Response
    {
        $property = new Property;
        $property->setTitle('Mon premier bien')
                ->setPrice('200000')
                ->setRooms(4)
                ->setBedrooms(3)
                ->setDescription("Une petite description")
                ->setSurface(60)
                ->setFloor(2)
                ->setHeat(0)
                ->setCity("Momtpellier")
                ->setAdress("15 Boulevard Gambetta")
                ->setPostalCode("34000");
        $this->persist($property);
        $this->flush();

        return $this->render( 'property/property.html.twig', [
            'current_menu' => 'properties'
        ]);
    }
}
