<?php

namespace App\Controller;

// require __DIR__ . "/vendor/autoload.php";

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ReportController extends AbstractController
{
    #[Route("/", name: "index")]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route("/about", name: "about")]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }
               // if ($currentPlayer->getPoints() > 21) {
            //     $victory = "Player";
            //     // $game->victory($banker);
            // } else {
            //     $victory = "Banker";
            //     $game->victory($banker);
            // }

    #[Route("/report", name: "report")]
    public function report(): Response
    {

        // $filename = __DIR__ . "/../../templates/kmom.md";
        // $text     = file_get_contents($filename);
        // $filter   = new \Anax\TextFilter\TextFilter();
        // $parsed   = $filter->parse($text, ["shortcode", "markdown"]);
        // echo $parsed->text;

        // $data = [
        //     'parsed_text' => $parsed->text
        // ];

        return $this->render('report.html.twig');
    }

    #[Route("/api/quote", name: "quote")]
    public function quote(
        Request $request
    ): Response {
        $quotes = [
            "Education is the most powerful weapon which you can use to change the world. - Nelson Mandela",
            "The function of education is to teach one to think intensively and to think critically. Intelligence plus character - that is the goal of true education. - Martin Luther King Jr.",
            "Education is the passport to the future, for tomorrow belongs to those who prepare for it today. - Malcolm X",
            "Education is the great equalizer of the conditions of men, the balance-wheel of the social machinery. - Horace Mann",
            "The only way to ensure equality for all is to make education accessible to all. - Debasish Mridha",
            "Education is not just about going to school and getting a degree. It's about widening your knowledge and absorbing the truth about life. - Shakuntala Devi",
            "Education is a human right with immense power to transform. On its foundation rests the cornerstone of freedom, democracy, and sustainable human development. - Kofi Annan",
            "Education is the key to unlock the golden door of freedom. - George Washington Carver",
            "Education is not preparation for life; education is life itself. - John Dewey",
            "The function of education is to teach one to think intensively and to think critically. Intelligence plus character - that is the goal of true education. - Martin Luther King Jr."
          ];

        $number = random_int(0, count($quotes)-1);
        $quote = $quotes[$number];
        $today = date("Y-m-d H:i:s");
        // $timestamp = $_SERVER['REQUEST_TIME'];
        $timestamp = $request->server->get('REQUEST_TIME');
        $data = [
            'quote' => $quote,
            'today' => $today,
            'timestamp' => $timestamp
        ];

        return new JsonResponse($data);
    }

    #[Route("/lucky", name: "lucky")]
    public function number(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'number' => $number
        ];

        return $this->render('lucky.html.twig', $data);
    }
}
