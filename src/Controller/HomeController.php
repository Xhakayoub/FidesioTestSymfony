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
        ->findAll();
        
        
        $Api = array();

      foreach($relation as $rel)
       {
        // $stationToChek = $rel->getGareId();
         $lignes = array();

           foreach($relation as $relToCollect)
            {  
                if($rel->getGareId() == $relToCollect->getGareId() && 
                $rel->getId() != $relToCollect->getId()){
                  
                   
                  $correspondance = array(
                     "ligne"=> $relToCollect->getLigne(),
                     "terminus"=> $relToCollect->getTerminus());
                   
                   array_push($lignes, $correspondance);
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
    
         $allStations = $this->getDoctrine()->getRepository(Gare::class)
         ->findAll();

         $allLines = $this->getDoctrine()->getRepository(Ligne::class)
         ->findAll();
         
          $allRelations = $this->getDoctrine()->getRepository(Relation::class)
         ->findAll();
        
         $Api = array();
        if($lineRequested == "All"){
          $relation = $this->getDoctrine()->getRepository(Relation::class)
        ->findAll();
        }else{
        $relation = $this->getDoctrine()->getRepository(Relation::class)
         ->findByLigne($lineRequested);
      }
       foreach($relation as $rel)
        {
         
         // $stationToChek = $rel->getGareId();
          $lignes = array();
        
            foreach($allRelations as $relToCollect)
             {  
                 if($rel->getGareId() == $relToCollect->getGareId()){

                  if($rel->getligne() != $relToCollect->getLigne()) {
                   $correspondance = array(
                     "ligne"=> $relToCollect->getLigne(),
                     "terminus"=> $rel->getTerminus());
                    }
                    else{
                      $correspondance = array(
                     "ligne"=> "",
                     "terminus"=> $rel->getTerminus());
                    
                    }
                   
                   array_push($lignes, $correspondance);
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
