<?php

namespace App\Repository;

use App\Entity\AgeEconomic;
use App\Controller\ProjectController;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AgeEconomic>
 *
 * @method AgeEconomic|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgeEconomic|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgeEconomic[]    findAll()
 * @method AgeEconomic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgeEconomicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgeEconomic::class);
    }

    public function save(AgeEconomic $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AgeEconomic $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return AgeEconomic[] Returns an array of AgeEconomic objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AgeEconomic
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    /**
     * Set up the data for the AgeEconomic entity.
     *
     * @param AgeEconomicRepository $ageEconomicRepository The repository for AgeEconomic entities.
     * @param ProjectController $projectController The controller used to process project-related operations.
     * @param ManagerRegistry $doctrine Managing entities
     * @return void
     */
    public function setUp(
        AgeEconomicRepository $ageEconomicRepository,
        ProjectController $projectController,
        ManagerRegistry $doctrine,
    ) {

        $data= $ageEconomicRepository
        ->findAll();

        foreach ($data as $value) {
            $ageEconomicRepository->remove($value, true);
        }

        // ADD ALL DATA USING THE JSON FILE
        $json =  $projectController->csvJSON('../ageeconomic.csv');
        $jsonData = json_decode($json, true);
        $entityManager = $doctrine->getManager();

        foreach ($jsonData as $ageeconomicData) {
            // var_dump($educationData);
            $value = new AgeEconomic();
            $value->setAge($ageeconomicData['age']);
            $value->setGender($ageeconomicData['gender']);
            $value->setYear($ageeconomicData['year']);
            $value->setPercentage($ageeconomicData['percentage']);

            $entityManager->persist($value);
        }

        $entityManager->flush();
    }

    /**
     * Creates a line chart showing both genders over time
     *
     * @param ChartBuilderInterface $chartBuilder The chart builder object.
     * @param array<object> $data The data used to generate the chart.
     *
     * @return object The created chart
     */
    public function bothSexesLine(
        ChartBuilderInterface $chartBuilder,
        $data
    ): object {

        $labels = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $age = $row->getAge();
            if ($gender === 'Female' and $age == '10-15') {
                $labels[] = $row->getYear();
            }
        }
        // var_dump($labels);

        $feData = [];

        foreach ($labels as $label) {
            $currentIndex = 0;
            $currentValue = 0;
            foreach ($data as $row) {
                $gender = $row->getGender();
                $year = $row->getYear();

                if ($gender === 'Female' and $label == $year) {
                    $currentValue += $row->getPercentage();
                    $currentIndex += 1;
                }
            }

            $feData[] = ($currentValue/$currentIndex);
        }

        $maData = [];

        foreach ($labels as $label) {
            $currentIndex = 0;
            $currentValue = 0;
            foreach ($data as $row) {
                $gender = $row->getGender();
                $year = $row->getYear();

                if ($gender === 'Male' and $label == $year) {
                    $currentValue += $row->getPercentage();
                    $currentIndex += 1;
                }
            }

            $maData[] = ($currentValue/$currentIndex);
        }

        $bothSexesLine = $chartBuilder->createChart(Chart::TYPE_LINE);

        $bothSexesLine->setData([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Women',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $feData,
                ],
                [
                    'label' => 'Men',
                    'backgroundColor' => 'rgb(0, 0, 255)',
                    'borderColor' => 'rgb(0, 0, 255)',
                    'data' => $maData,
                ]
            ],
        ]);

        $bothSexesLine->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 20,
                ],
            ],
        ]);
        return $bothSexesLine;
    }

    /**
     * Creates a bar chart showing data by gender and age-group in 2018
     *
     * @param ChartBuilderInterface $chartBuilder The chart builder object.
     * @param array<object> $data The data used to generate the chart.
     *
     * @return object The created chart
     */
    public function ageGender2018(
        ChartBuilderInterface $chartBuilder,
        $data
    ): object {
        $labels = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $year = $row->getYear();
            if ($gender === 'Female' and $year == '2018') {
                $labels[] = $row->getAge();
            }
        }

        $feData = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $year = $row->getYear();

            if ($gender === 'Female' and $year == '2018') {
                $feData[] = $row->getPercentage();
            }
        }

        $maData = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $year = $row->getYear();

            if ($gender === 'Male' and $year == '2018') {
                $maData[] = $row->getPercentage();
            }
        }

        $ageGender2018 = $chartBuilder->createChart(Chart::TYPE_BAR);

        $ageGender2018->setData([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Women',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $feData,
                ],
                [
                    'label' => 'Men',
                    'backgroundColor' => 'rgb(0, 0, 255)',
                    'borderColor' => 'rgb(0, 0, 255)',
                    'data' => $maData,
                ]
            ],
        ]);

        $ageGender2018->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 20,
                ],
            ],
        ]);
        return $ageGender2018;
    }
}
