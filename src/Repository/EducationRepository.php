<?php

namespace App\Repository;

use App\Entity\Education;
use App\Controller\ProjectController;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

/**
 * @extends ServiceEntityRepository<Education>
 *
 * @method Education|null find($id, $lockMode = null, $lockVersion = null)
 * @method Education|null findOneBy(array $criteria, array $orderBy = null)
 * @method Education[]    findAll()
 * @method Education[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Education::class);
    }

    public function save(Education $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Education $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Education[] Returns an array of Education objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Education
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    /**
     * Set up the data for the Education entity.
     *
     * @param EducationRepository $educationRepository The repository for Education entities.
     * @param ProjectController $projectController The controller used to process project-related operations.
     * @param ManagerRegistry $doctrine Managing entities
     * @return void
     */
    public function setUp(
        EducationRepository $educationRepository,
        ProjectController $projectController,
        ManagerRegistry $doctrine,
    ): void {
        $data = $educationRepository
        ->findAll();

        foreach ($data as $value) {
            $educationRepository->remove($value, true);
        }

        // ADD ALL DATA USING THE JSON FILE
        $json = $projectController->csvJSON('../education.csv');
        $jsonData = json_decode($json, true);
        $entityManager = $doctrine->getManager();

        foreach ($jsonData as $educationData) {
            $value = new Education();
            $value->setGender($educationData['gender']);
            $value->setEducationLevel($educationData['education_level']);
            $value->setYear($educationData['year']);
            $value->setPercentage($educationData['percentage']);

            $entityManager->persist($value);
        }

        $entityManager->flush();
    }

     /**
     * Creates a line chart showing women in tertiary education
     *
     * @param ChartBuilderInterface $chartBuilder The chart builder object.
     * @param array<object> $data The data used to generate the chart.
     *
     * @return object The created chart
     */
    public function feUni(
        ChartBuilderInterface $chartBuilder,
        $data
    ): object {
        $feUniLabels = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $level = $row->getEducationLevel();
            if ($gender === 'Female' and $level == 'Eftergymnasial') {
                $feUniLabels[] = $row->getYear();
            }
        }

        $feUniData = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $level = $row->getEducationLevel();
            if ($gender === 'Female' and $level == 'Eftergymnasial') {
                $feUniData[] = $row->getPercentage();
            }
        }

        $feUni = $chartBuilder->createChart(Chart::TYPE_LINE);

        $feUni->setData([
            'labels' => $feUniLabels,
            'datasets' => [
                [
                    'label' => 'Education Level higher than College (Eftergymanisal)',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $feUniData,
                ],
            ],
        ]);

        $feUni->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ]);

        return $feUni;
    }

    /**
     * Creates a pie chart of female education in 1990
     *
     * @param ChartBuilderInterface $chartBuilder The chart builder object.
     * @param array<object> $data The data used to generate the chart.
     *
     * @return object The created chart
     */
    public function fePie1990(
        ChartBuilderInterface $chartBuilder,
        $data
    ): object {
        $fePie1990Labels = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $year = $row->getYear();
            if ($gender === 'Female' and $year == '1990') {
                $fePie1990Labels[] = $row->getEducationLevel();
            }
        }

        $fePie1990Data = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $year = $row->getYear();
            if ($gender === 'Female' and $year == '1990') {
                $fePie1990Data[] = $row->getPercentage();
            }
        }

        $fePie1990 = $chartBuilder->createChart(Chart::TYPE_PIE);

        $fePie1990->setData([
            'labels' => $fePie1990Labels,
            'datasets' => [
                [
                    'label' => "Women's Education Level in 1990",
                    'backgroundColor' => ["#51EAEA", "#FCDDB0",
                    "#FF9D76", "#FB3569"],
                    // 'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $fePie1990Data,
                ],
            ],
        ]);

        $fePie1990->setOptions([
            'scales' => [
                // 'y' => [
                //     'suggestedMin' => 0,
                //     'suggestedMax' => 100,
                // ],
            ],
        ]);

        return $fePie1990;
    }

    /**
     * Creates a pie chart of female education in 2019
     *
     * @param ChartBuilderInterface $chartBuilder The chart builder object.
     * @param array<object> $data The data used to generate the chart.
     *
     * @return object The created chart
     */
    public function fePie2019(
        ChartBuilderInterface $chartBuilder,
        $data
    ): object {
        $fePie2019Labels = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $year = $row->getYear();
            if ($gender === 'Female' and $year == '2019') {
                $fePie2019Labels[] = $row->getEducationLevel();
            }
        }

        $fePie2019Data = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $year = $row->getYear();
            if ($gender === 'Female' and $year == '2019') {
                $fePie2019Data[] = $row->getPercentage();
            }
        }

        $fePie2019 = $chartBuilder->createChart(Chart::TYPE_PIE);

        $fePie2019->setData([
            'labels' => $fePie2019Labels,
            'datasets' => [
                [
                    'label' => "Women's Education Level in 2019",
                    'backgroundColor' => ["#51EAEA", "#FCDDB0",
                    "#FF9D76", "#FB3569"],
                    // 'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $fePie2019Data,
                ],
            ],
        ]);

        $fePie2019->setOptions([
            'scales' => [
                // 'y' => [
                //     'suggestedMin' => 0,
                //     'suggestedMax' => 100,
                // ],
            ],
        ]);

        return $fePie2019;
    }

    /**
     * Creates a line chart of tertiary education for both genders
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
        $uniLabels = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $level = $row->getEducationLevel();
            if ($gender === 'Female' and $level == 'Eftergymnasial') {
                $uniLabels[] = $row->getYear();
            }
        }

        $feUniData = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $level = $row->getEducationLevel();
            if ($gender === 'Female' and $level == 'Eftergymnasial') {
                $feUniData[] = $row->getPercentage();
            }
        }

        $maUniData = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $level = $row->getEducationLevel();
            if ($gender === 'Male' and $level == 'Eftergymnasial') {
                $maUniData[] = $row->getPercentage();
            }
        }

        $bothSexesLine = $chartBuilder->createChart(Chart::TYPE_LINE);

        $bothSexesLine->setData([
            'labels' => $uniLabels,
            'datasets' => [
                [
                    'label' => 'Women: Education Level higher than College (Eftergymanisal)',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $feUniData,
                ],
                [
                    'label' => 'Men: Education Level higher than College (Eftergymanisal)',
                    'backgroundColor' => 'rgb(0, 0, 255)',
                    'borderColor' => 'rgb(0, 0, 255)',
                    'data' => $maUniData,
                ]
            ],
        ]);

        $bothSexesLine->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ]);
        return $bothSexesLine;
    }

    /**
     * Creates a bar chart of tertiary education for both genders in 2019
     *
     * @param ChartBuilderInterface $chartBuilder The chart builder object.
     * @param array<object> $data The data used to generate the chart.
     *
     * @return object The created chart
     */
    public function bothSexes2019(
        ChartBuilderInterface $chartBuilder,
        $data
    ): object {
        $labels = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $year = $row->getYear();
            if ($gender === 'Female' and $year == '2019') {
                $labels[] = $row->getEducationLevel();
            }
        }

        $feUniData = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $year = $row->getYear();
            if ($gender === 'Female' and $year == '2019') {
                $feUniData[] = $row->getPercentage();
            }
        }

        $maUniData = [];

        foreach ($data as $row) {
            $gender = $row->getGender();
            $year = $row->getYear();
            if ($gender === 'Male' and $year == '2019') {
                $maUniData[] = $row->getPercentage();
            }
        }

        $bothSexes2019 = $chartBuilder->createChart(Chart::TYPE_BAR);

        $bothSexes2019->setData([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Women',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $feUniData,
                ],
                [
                    'label' => 'Men',
                    'backgroundColor' => 'rgb(0, 0, 255)',
                    'borderColor' => 'rgb(0, 0, 255)',
                    'data' => $maUniData,
                ]
            ],
        ]);

        $bothSexes2019->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 50,
                ],
            ],
        ]);
        return $bothSexes2019;
    }
}
