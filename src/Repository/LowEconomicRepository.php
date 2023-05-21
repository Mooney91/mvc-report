<?php

namespace App\Repository;

use App\Entity\LowEconomic;
use App\Controller\ProjectController;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

/**
 * @extends ServiceEntityRepository<LowEconomic>
 *
 * @method LowEconomic|null find($id, $lockMode = null, $lockVersion = null)
 * @method LowEconomic|null findOneBy(array $criteria, array $orderBy = null)
 * @method LowEconomic[]    findAll()
 * @method LowEconomic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LowEconomicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LowEconomic::class);
    }

    public function save(LowEconomic $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(LowEconomic $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return LowEconomic[] Returns an array of LowEconomic objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LowEconomic
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    /**
     * Set up the data for the LowEconomic entity.
     *
     * @param LowEconomicRepository $lowEconomicRepository The repository for LowEconomic entities.
     * @param ProjectController $projectController The controller used to process project-related operations.
     * @param ManagerRegistry $doctrine Managing entities
     * @return void
     */
    public function setUp(
        LowEconomicRepository $lowEconomicRepository,
        ProjectController $projectController,
        ManagerRegistry $doctrine,
    ) {

        $data= $lowEconomicRepository
        ->findAll();

        foreach ($data as $value) {
            $lowEconomicRepository->remove($value, true);
        }

        // ADD ALL DATA USING THE JSON FILE
        $json =  $projectController->csvJSON('../loweconomic.csv');
        $jsonData = json_decode($json, true);
        $entityManager = $doctrine->getManager();

        foreach ($jsonData as $loweconomicData) {
            $value = new LowEconomic();
            $value->setBirthplace($loweconomicData['birthplace']);
            $value->setYear($loweconomicData['year']);
            $value->setPercentage($loweconomicData['percentage']);

            $entityManager->persist($value);
        }

        // UPDATES TO THE DATABASE
        $entityManager->flush();
    }

    /**
     * Creates a line chart showing the percentage of people resident in Sweden who live in low economic standards
     * and where they were born
     * @param ChartBuilderInterface $chartBuilder The chart builder object.
     * @param array<object> $data The data used to generate the chart.
     *
     * @return object The created chart
     */
    public function povertyCountries(
        ChartBuilderInterface $chartBuilder,
        $data
    ): object {
        $labels = [];

        foreach ($data as $row) {
            $birth = $row->getBirthPlace();
            if ($birth === 'Asien') {
                $labels[] = $row->getYear();
            }
        }

        $povertyCountriesData = [];

        foreach ($data as $item) {
            $birthplace = $item->getBirthplace();
            $percentage = $item->getPercentage();

            if (!isset($povertyCountriesData[$birthplace])) {
                $povertyCountriesData[$birthplace] = [];
            }

            $povertyCountriesData[$birthplace][] = $percentage;
        }

        $colours = [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 206, 86)',
            'rgb(75, 192, 192)',
            'rgb(153, 102, 255)',
            'rgb(255, 159, 64)',
            'rgb(255, 0, 0)',
            'rgb(0, 128, 0)',
            'rgb(0, 0, 255)',
            'rgb(128, 0, 128)',
        ];

        $index = 0;
        $datasets = [];

        foreach ($povertyCountriesData as $key => $value) {
            $array = [
                'label' => $key,
                'backgroundColor' => $colours[$index],
                'borderColor' => $colours[$index],
                'data' => $value,
            ];

            $datasets[] = $array;

            $index += 1;

            if ($index == count($povertyCountriesData)) {
                $index = 0;
            }
        }

        $povertyCountries = $chartBuilder->createChart(Chart::TYPE_LINE);

        $povertyCountries->setData([
            'labels' => $labels,
            'datasets' => $datasets,
        ]);

        $povertyCountries->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 50,
                ],
            ],
        ]);

        return $povertyCountries;
    }
}
