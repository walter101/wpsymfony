<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 19-7-2018
 * Time: 07:16
 */

namespace AppBundle\Controller\servicetester;


use Knp\Snappy\Pdf;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;

class servicetester extends Controller
{

    /**
     * @Route("/servicetester", name="servicetest")
     * @return mixed
     */
    public function showTesterAction(){

        $service = $this->get('app.servicetester');

        $variable = [1=> 10, 'two' => 'twee', 'string'=> $service->test()];

        echo getcwd();
        $test = scandir($_SERVER['DOCUMENT_ROOT'].'/mypdf');
        dump($test);
        echo $_SERVER['DOCUMENT_ROOT'];

        //die();
        $snappy = new Pdf('/usr/local/bin/wkhtmltopdf');

        $html = '<h1>Hello</h1>';

        $filename = 'myFirstSnappyPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="c:'.$filename.'.pdf"'
            )
        );

        //die();
        $snappy->generateFromHtml('<h1>Bill</h1><p>You owe me money, dude.</p>', getcwd().'/mypdf/bill-123.pdf');

        die();
        $snappy = new Pdf('/usr/local/bin/wkhtmltopdf');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="file.pdf"');
        echo $snappy->getOutput('http://www.walterpothof.nl/symfony_eventlisteners.php');
        //die();

        return $this->render('/servicetester/servicetester.html.twig', ['variable'=>$variable]);

    }

}