<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../web/index.php";
    require_once __DIR__."/../src/Place.php";


    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));


    session_start();
    if(empty($_SESSION['cities'])) {
        $_SESSION['cities'] = array();
    }


    $app->get("/", function() use ($app){

        return $app['twig']->render('place_input_form.html.twig');
    });


    $app->post("/result", function() use ($app) {
        $new_city = new Place($_POST["country-name"],$_POST["city-name"],$_POST["city-year"] );
        $new_city->save();

        return $app['twig']->render('place_result.html.twig', array("cities" => Place::getAll()));
    });

    $app->get("/delete", function() use ($app) {
      Place::clearAll();
      return $app['twig']->render('delete.html.twig');
    });

    return $app;
?>
