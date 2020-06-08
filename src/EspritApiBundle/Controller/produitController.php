<?php

namespace EspritApiBundle\Controller;

use EspritApiBundle\Entity\produit;
use EspritApiBundle\Entity\entreprise;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;




class produitController extends Controller
{
    public function AllAction(){
        $prod = $this->getDoctrine()->getManager()
        ->getRepository('EspritApiBundle:produit')->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($prod);
        return new JsonResponse($formatted);
    }

    public function findAction($nom){
        $prod = $this->getDoctrine()
        ->getRepository('EspritApiBundle:produit')
        ->findOneBy(['nom' => $nom]);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($prod);
        return new JsonResponse($formatted);
    }

    public function triAction( Request $request  )
    {
        $search=$request->get('search');

        $prod = $this->getDoctrine()->getManager()
        ->getRepository('EspritApiBundle:produit')->find($search);

        $serializer = new Serializer([new ObjectNormalizer()]);
    $formatted = $serializer->normalize($prod);
    return new JsonResponse($formatted);
       
    }


    public function newAction(Request $request){
    
        $em = $this->getDoctrine()->getManager();
        $prod = new produit();
        $prod->setNom($request->get('nom'));


        $prod->setDescription($request->get('description'));
        
        $prod->setCouleur($request->get('couleur'));
       
        $px = $prod->setPrix($request->get('prix'));
        
        $prod->setPrixt((float)($request->get('prix')) *1.35);

        $prod->setRemise($request->get('remise'));

        $prod->setImage($request->get('image'));

        $prod -> setPrixr((float)($request->get('prix')) *1.35- (float)($request->get('prix')) *1.35 * ($request->get('remise')) /100);
       
       $prod->setEntreprise($request->get('produit.entreprise.marque'));




        $em->persist($prod);
        $em->flush();
        
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($prod);
        return new JsonResponse($formatted);
    }

    
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $prod = $this->getDoctrine()
            ->getRepository('EspritApiBundle:produit')
            ->findOneBy(['id' => $id]);

        var_dump(' produ ');
        var_dump($prod);
        var_dump('from request ');
        var_dump($request->get('nom'));
        if ($request->isMethod("get")) {
            $prod->setNom($request->get('nom'));
            $prod->setDescription($request->get('description'));  
            $prod->setCouleur($request->get('couleur'));
            $prod->setPrix($request->get('prix'));
            $prod->setPrixt((float)($request->get('prix')) *1.35);
            $prod->setRemise($request->get('remise'));
            $prod -> setPrixr((float)($request->get('prix')) *1.35- (float)($request->get('prix')) *1.35 * ($request->get('remise')) /100);
            }

            $em->flush();
            $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($prod);
        return new JsonResponse($formatted);
           
      
    }

   
    public function deleteAction(Request $request, produit $prod)
    {
        $sn = $this->getDoctrine()->getManager();
        $prod = $sn->getRepository('EspritApiBundle:produit')->find($request->get('id'));
        $sn->remove($prod);
        $sn->flush();
        return new JsonResponse('ok');
    }
   
    
  
}