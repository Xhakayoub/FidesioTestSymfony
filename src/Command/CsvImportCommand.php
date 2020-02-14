<?php
namespace App\Src\Command;
use App\Entity\Gare;
use App\Entity\Ligne;
use App\Entity\Relation;
use Symfony\Component\Console\Command\Command;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use League\Csv\Reader;

class CsvImportCommand extends Command
{
   public function __construct(EntityManagerInterface $em){
      parent::__construct();
      $this->em = $em;
   }

 protected function configure(){
  $this->setName('file:csv:import')
       ->setDescription('importation du fichier CSV');
 }

 protected function execute(InputInterface $input, OutputInterface $output){
    $intToVerif = 0;
    $i=1;
    $io = new SymfonyStyle($input, $output);
    $io->title('import en progression...');
    
    $reader = Reader::createFromPath('%kernel.root_dir%/../src/exports-des-gares-idf.csv');
    $reader->setDelimiter(';');
    $results = $reader->fetchAssoc();

    foreach($results as $row){
       $intToVerif = 0;
       

       $verifyGareForRelation = $this->em->getRepository(Gare::class)
       ->findOneBy([
          'gareId' => $row['gares_id']
       ]);

       if(empty($verifyGareForRelation)){$intToVerif++;}

       $verifyGare = $this->em->getRepository(Gare::class)
       ->findOneBy([
          'gareNom' => $row['nom_gare']
       ]);

       $verifyLigne = $this->em->getRepository(Ligne::class)
       ->findOneBy([
          'ligne' => $row['ligne']
       ]);

       if(empty($verifyGare)){
         
         $gare = (new gare())
       ->setGareNom($row['nom_gare'])
       ->setGareId($row['gares_id'])
       ->setLongNom($row['nomlong'])
       ->setNomIv($row['nom_iv'])
       ->setNumMod($row['num_mod'])
       ->setMode($row['mode_'])
       ->setFer($row['fer'])
       ->setTrain($row['train'])
       ->setRer($row['rer'])
       ->setMetro($row['metro'])
       ->setTramway($row['tramway'])
       ->setNavette($row['navette'])
       ->setVal($row['val'])
       ->setGeoPoint($row['Geo_Point'])
       ->setGeoShape($row['Geo_Shape'])
       ;
       $this->em->persist($gare);
       }

       if(empty($verifyLigne)){
         $intToVerif++;
         $ligne = (new ligne())
       ->setLigne($row['ligne'])
       ->setCodeLigf($row['cod_ligf'])
       ->setIndiceLig($row['indice_lig'])
       ->setReseau($row['reseau'])
       ->setResCom($row['res_com'])
       ->setResStif($row['res_stif'])
       ->setExploitant($row['exploitant'])
       ->setX($row['x'])
       ->setY($row['y'])
       ->setPrincipal($row['principal'])
       ;
       $this->em->persist($ligne);
       }

         $verifyRelation = $this->em->getRepository(Relation::class)
         ->findOneBy([
            'gareId' => $row['gares_id'],
            'ligne' => $row['ligne']
         ]);
      
       if(empty($verifyRelation)){
         $i++;
         
        //if(!empty($gare) && !empty($gare)){}
         $relation = (new relation())
         ->setGareId($row['nom_gare'])
         ->setLigne($row['ligne'])
         ->setTerminus($row['termetro'])
         ;
          echo $relation->getLigne();

         $this->em->persist($relation);
       }

      

       
      
        
      $this->em->flush();
      
    }
   

    
    
    $io->success('importation avec succés');
 }
    
}
?>