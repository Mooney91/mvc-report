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
use App\Entity\LowEconomic;
use App\Repository\LowEconomicRepository;
use App\Entity\AgeEconomic;
use App\Repository\AgeEconomicRepository;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ProjectController extends AbstractController
{
    #[Route('/proj', name: 'proj')]
    public function index(
        EducationRepository $educationRepository,
        LowEconomicRepository $lowEconomicRepository,
        AgeEconomicRepository $ageEconomicRepository,
        ManagerRegistry $doctrine
    ): Response {
        $educationRepository->setUp(
            $educationRepository,
            $this,
            $doctrine
        );
        $lowEconomicRepository->setUp(
            $lowEconomicRepository,
            $this,
            $doctrine
        );
        $ageEconomicRepository->setUp(
            $ageEconomicRepository,
            $this,
            $doctrine
        );

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
        // ManagerRegistry $doctrine,
        ChartBuilderInterface $chartBuilder
    ): Response {
        $data = $educationRepository
            ->findAll();

        // FEMALE - UNIVERSITY
        $feUni = $educationRepository->feUni($chartBuilder, $data);
        // FEMALE - PIE CHART 1990
        $fePie1990 = $educationRepository->fePie1990($chartBuilder, $data);
        // FEMALE - PIE CHART 2019
        $fePie2019 = $educationRepository->fePie2019($chartBuilder, $data);
        // UNIVERSITY - BOTH SEXES
        $bothSexesLine = $educationRepository->bothSexesLine($chartBuilder, $data);
        // EDUCATION - BOTH SEXES
        $bothSexes2019 = $educationRepository->bothSexes2019($chartBuilder, $data);

        return $this->render('project/edu.html.twig', [
            'feUni' => $feUni, 'fePie1990' => $fePie1990, 'fePie2019' => $fePie2019, 'bothSexesLine' => $bothSexesLine, 'bothSexes2019' => $bothSexes2019
        ]);
    }

    #[Route('/proj/economy', name: 'proj-economy')]
    public function economy(
        LowEconomicRepository $lowEconomicRepository,
        AgeEconomicRepository $ageEconomicRepository,
        // ManagerRegistry $doctrine,
        ChartBuilderInterface $chartBuilder
    ): Response {

        $data = $lowEconomicRepository
            ->findAll();

        // PERCENTAGE OF LOW ECONOMIC STANDARD BY BIRTHPLACE
        $povertyCountries = $lowEconomicRepository->povertyCountries($chartBuilder, $data);

        $data2 = $ageEconomicRepository
            ->findAll();

        // GENDER - ECONOMIC STANDARD
        $bothSexesLine = $ageEconomicRepository->bothSexesLine($chartBuilder, $data2);
        // ECONOMIC STANDARDS IN 2018 - GENDER AND AGE
        $ageGender2018 = $ageEconomicRepository->ageGender2018($chartBuilder, $data2);

        return $this->render('project/eco.html.twig', [
            'povertyCountries' => $povertyCountries, 'bothSexesLine' => $bothSexesLine, 'ageGender2018' => $ageGender2018
        ]);
    }

    #[Route('/proj/api', name: 'proj-api')]
    public function projApi(
        // EducationRepository $educationRepository,
        // ManagerRegistry $doctrine
    ): Response {
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

    #[Route('/proj/api/education/male', name: 'proj_api_education_male')]
    public function projApiEducationMale(
        EducationRepository $educationRepository
    ): Response {
        $data = $educationRepository
            ->findAll();

        $result = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            if ($gender === 'Male') {
                $result[] = $row;
            }
        }

        $response = $this->json($result);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;
    }

    #[Route('/proj/api/education/female', name: 'proj_api_education_female')]
    public function projApiEducationFemale(
        EducationRepository $educationRepository
    ): Response {
        $data = $educationRepository
            ->findAll();

        $result = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            if ($gender === 'Female') {
                $result[] = $row;
            }
        }

        $response = $this->json($result);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route('/proj/api/education/year', name: 'proj_api_education_year', methods: ['POST'])]
    public function projApiEducationYear(
        EducationRepository $educationRepository,
        Request $request,
    ): Response {

        $postYear = $request->request->get('year');

        $data = $educationRepository
        ->findAll();

        $result = [];

        foreach ($data as $row) {
            $year = $row->getYear();
            if ($year == $postYear) {
                $result[] = $row;
            }
        }

        $response = $this->json($result);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route('/proj/api/loweconomic', name: 'proj_api_loweconomic')]
    public function projApiLowEconomic(
        LowEconomicRepository $lowEconomicRepository
    ): Response {
        $data = $lowEconomicRepository
            ->findAll();

        $response = $this->json($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }


    #[Route('/proj/api/loweconomic/birthplace', name: 'proj_api_loweconomic_birthplace', methods: ['POST'])]
    public function projApiLowEconomicBirthplace(
        LowEconomicRepository $lowEconomicRepository,
        Request $request,
    ): Response {

        $postBirthplace = $request->request->get('birthplace');

        $data = $lowEconomicRepository
        ->findAll();

        $result = [];

        foreach ($data as $row) {
            $birthplace = $row->getBirthplace();
            if ($birthplace == $postBirthplace) {
                $result[] = $row;
            }
        }

        $response = $this->json($result);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route('/proj/api/ageeconomic', name: 'proj_api_ageeconomic')]
    public function projApiAgeEconomic(
        AgeEconomicRepository $ageEconomicRepository
    ): Response {
        $data = $ageEconomicRepository
            ->findAll();

        $response = $this->json($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    /**
     * Converts a CSV file to JSON format.
     * Adapted from https://www.w3schools.in/php/examples/convert-csv-to-json-in-php
     *
     * @param string $csv The path to the CSV file.
     *
     * @return string The JSON representation of the CSV data.
     */
    public function csvJSON($csv)
    {
        $file = fopen($csv, 'r');
        $headers = fgetcsv($file);

        // REMOVE HIDDEN CHARACTERS FROM THE HEADERS
        foreach ($headers as &$header) {
            $header = trim($header, "\xEF\xBB\xBF");
        }

        $data = array();
        while (($row = fgetcsv($file))) {
            $data[] = array_combine($headers, $row);
        }
        fclose($file);

        return json_encode($data);
    }
}
