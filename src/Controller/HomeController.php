<?php

namespace App\Controller;

use App\Entity\Gare;
use App\Entity\Relation;
use App\Entity\Ligne;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $allStations = $this->getDoctrine()->getRepository(Gare::class)
        ->findAll();

        $relation = $this->getDoctrine()->getRepository(Relation::class)
        ->findAll();
        
        $Api = array();

        foreach($allStations as $station){
        
         $lignes = array();

            foreach($relation as $rel)
            {
                if($rel->getGareId() == $station->getGareNom()){
                   
                  array_push($lignes, $rel);
                }
            }

            $obj = array('gare'=> $station, 'lignes'=> $lignes);
          //  var_dump($obj);
            array_push($Api, $obj);

        //     $allInfos = array([
        //         "gare" => $station,
        //         "lignes" => $lignes
        //    ] );
        //    array_push($Api,  $allInfos);

        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'gares' => $allStations,
            'infos' => $Api
        ]);
    }


    /**
     * @Route("/dynamic", name="dynamic")
     */
    public function DynamicIndex()
    {
        $allStations = $this->getDoctrine()->getRepository(Gare::class)
        ->findAll();

        $relation = $this->getDoctrine()->getRepository(Relation::class)
        ->findAll();

        $allLines = $this->getDoctrine()->getRepository(Ligne::class)
        ->findAll(array(),array('ligne' => 'ASC'));
        
        $Api = array();

      foreach($relation as $rel)
       {
        // $stationToChek = $rel->getGareId();
         $lignes = array();

           foreach($relation as $relToCollect)
            {  
                if($rel->getGareId() == $relToCollect->getGareId() && 
                $rel->getId() != $relToCollect->getId()){
                   
                  array_push($lignes, $relToCollect->getLigne());
                }
            }

            $obj = array('gare'=> $rel, 'lignes'=> $lignes);
          //  var_dump($obj);
            array_push($Api, $obj);

        //     $allInfos = array([
        //         "gare" => $station,
        //         "lignes" => $lignes
        //    ] );
        //    array_push($Api,  $allInfos);

        }

        return $this->render('home/dynamicHome.html.twig', [
            'controller_name' => 'HomeController',
            'gares' => $allStations,
            'infos' => $Api,
            'lignes' =>  $allLines
        ]);
    }








   /**
     * @Route("/dynamic/tofilter", name="filterList")
     */
    public function filter(request $request)
    {   
        $lineRequested = $request->request->get('line');
    //     var_dump($requestedLine);
    //     $response = new Response(json_encode(array(
    //     'line' => $requestedLine,
    // )));

    //  return $response;
         $allStations = $this->getDoctrine()->getRepository(Gare::class)
         ->findAll();

         $allLines = $this->getDoctrine()->getRepository(Ligne::class)
         ->findAll(array(),array('ligne' => 'ASC'));

          $allRelations = $this->getDoctrine()->getRepository(Relation::class)
         ->findAll();
        
         $Api = array();

        $relation = $this->getDoctrine()->getRepository(Relation::class)
         ->findByLigne($lineRequested);
         dump($relation);
       foreach($relation as $rel)
        {
         
         // $stationToChek = $rel->getGareId();
          $lignes = array();
        
            foreach($allRelations as $relToCollect)
             {  
                 if($rel->getGareId() == $relToCollect->getGareId() && 
                 $rel->getligne() != $relToCollect->getLigne()){
                   
                   array_push($lignes, $relToCollect->getLigne());
                 }
             }
            
             $obj = array('gare'=> $rel, 'lignes'=> $lignes);
           //  var_dump($obj);
             array_push($Api, $obj);

         //     $allInfos = array([
         //         "gare" => $station,
         //         "lignes" => $lignes
         //    ] );
         //    array_push($Api,  $allInfos);

         }

         return $this->render('home/filteredList.html.twig', [
             'controller_name' => 'HomeController',
             'gares' => $allStations,
             'infos' => $Api,
             'lignes' =>  $allLines
         ]);
    }
}
