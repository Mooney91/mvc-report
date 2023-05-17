<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// use App\Entity\Project;
// use App\Repository\ProjectRepository;
// use Doctrine\Persistence\ManagerRegistry;

use App\Entity\Education;
use App\Repository\EducationRepository;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ProjectController extends AbstractController
{
    #[Route('/proj', name: 'proj')]
    public function index(
        EducationRepository $educationRepository,
        ManagerRegistry $doctrine
    ): Response
    {
        $data= $educationRepository
        ->findAll();

        foreach ($data as $value) {
            $educationRepository->remove($value, true);
        }

        // ADD ALL DATA USING THE JSON FILE
        // $json = 
        // $json = file_get_contents('../library.json');
        // $json = $this->csvJSON(file_get_contents('../education.csv'));
        $json = $this->csvJSON('../education.csv');
        $jsonData = json_decode($json, true);
        // var_dump($jsonData[0]);
        $entityManager = $doctrine->getManager();

        foreach ($jsonData as $educationData) {
            // var_dump($educationData);
            $value = new Education();
            $value->setGender($educationData['gender']);
            $value->setEducationLevel($educationData['education_level']);
            $value->setYear($educationData['year']);
            $value->setPercentage($educationData['percentage']);

            $entityManager->persist($value);
        }

        $entityManager->flush();

        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }

    #[Route('/proj/about', name: 'proj-about')]
    public function projAbout(): Response
    {
        return $this->render('project/about.html.twig');
    }

    #[Route('/proj/about/database', name: 'proj-database')]
    public function projDatabase(): Response
    {
        return $this->render('project/data.html.twig');
    }


    #[Route('/proj/education', name: 'proj-education')]
    public function education(
        EducationRepository $educationRepository,
        ManagerRegistry $doctrine,
        ChartBuilderInterface $chartBuilder
    ): Response
    {
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);

        $chart->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 10, 5, 2, 20, 30, 45],
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ]);

        return $this->render('project/edu.html.twig', [
            'chart' => $chart,
        ]);
    }

    #[Route('/proj/api', name: 'proj-api')]
    public function projApi(
        EducationRepository $educationRepository,
        ManagerRegistry $doctrine
    ): Response
    {
        return $this->render('project/api.html.twig');
    }

    #[Route('/proj/api/education', name: 'proj_api_education')]
    public function projApiEducation(
        EducationRepository $educationRepository
    ): Response {
        $data = $educationRepository
            ->findAll();

        $response = $this->json($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }


    //var csv is the CSV file with headers
    //Adapted from Javascript to PHP. Original code accredited to http://techslides.com/convert-csv-to-json-in-javascript
    // Adapted from https://www.w3schools.in/php/examples/convert-csv-to-json-in-php 
    public function csvJSON($csv) {
        // $lines = explode("\n", $csv);
    
        // $result = [];
    
        // $headers = str_getcsv($lines[0]);
    
        // for ($i = 1; $i < count($lines); $i++) {
        //     $obj = [];
        //     $currentLine = str_getcsv($lines[$i]);
    
        //     for ($j = 0; $j < count($headers); $j++) {
        //         // $obj[$headers[$j]] = $currentLine[$j];
        //         $key = trim($headers[$j]);
        //         $obj[$key] = $currentLine[$j];
        //     }
    
        //     $result[] = $obj;
        //     // var_dump($result);
        // }

        $fp = fopen($csv, 'r');
        $headers = fgetcsv($fp); // Get column headers

        // Remove BOM character from the first header
        foreach ($headers as &$header) {
            $header = trim($header, "\xEF\xBB\xBF");
        }

        $data = array();
        while (($row = fgetcsv($fp))) {
            $data[] = array_combine($headers, $row);
            // var_dump($headers);
            // var_dump($row);
        }
        fclose($fp);
    
        return json_encode($data);
    }
}