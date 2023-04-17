<?php

declare(strict_types=1);


use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

use Psr\Http\Server\MiddlewareInterface;


return function (App $app) {
    
    
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });
    
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });
    
    $app->post('/api/location', function (Request $request, Response $response){
        require __DIR__ . '/../db/db.php';
        if($con === false){ 
            $response->getBody()->write('not connected!');
        }else{
            $contentType = $request->getHeaderLine('Content-Type');
            
            $name = $_POST['loc'];
            $insert = "insert into location(name) values('$name')";
            $run = mysqli_query($con, $insert);

            echo "<script>console.log('Successfully inserted location $name');</script>";
            $response->getBody()->write('success');
        }
        return $response
        ->withHeader('Location', 'http://localhost/btech/phc/client/')
        ->withStatus(302);
    });

    $app->post('/api/department', function (Request $request, Response $response){
        require __DIR__ . '/../db/db.php';
        if($con === false){ 
            $response->getBody()->write('not connected!');
        }else{
            $contentType = $request->getHeaderLine('Content-Type');
            
            $name = $_POST['dept'];
            $insert = "insert into department(name) values('$name')";
            $run = mysqli_query($con, $insert);

            echo "<script>console.log('Successfully inserted department $name');</script>";
            $response->getBody()->write('success');
        }
        return $response
        ->withHeader('Location', 'http://localhost/btech/phc/client/')
        ->withStatus(302);
    });

    $app->post('/api/vaccine', function (Request $request, Response $response){
        require __DIR__ . '/../db/db.php';
        if($con === false){ 
            $response->getBody()->write('not connected!');
        }else{
            $contentType = $request->getHeaderLine('Content-Type');
            
            $name = $_POST['vacc'];
            $available = $_POST['available'];
            $insert = "insert into vaccine(name, available) values('$name', '$available')";
            $run = mysqli_query($con, $insert);

            echo "<script>console.log('Successfully inserted vaccine $name');</script>";
            $response->getBody()->write('success');
        }
        return $response
        ->withHeader('Location', 'http://localhost/btech/phc/client/')
        ->withStatus(302);
    });

    $app->post('/api/phc', function (Request $request, Response $response){
        require __DIR__ . '/../db/db.php';
        if($con === false){ 
            $response->getBody()->write('not connected!');
        }else{
            $contentType = $request->getHeaderLine('Content-Type');
            
            $name = $_POST['phc'];
            $loc_id = $_POST['loc_id'];
            $insert = "insert into phc(name, loc_id) values('$name', '$loc_id')";
            $run = mysqli_query($con, $insert);

            echo "<script>console.log('Successfully inserted PHC $name');</script>";
            $response->getBody()->write('success');
        }
        return $response
        ->withHeader('Location', 'http://localhost/btech/phc/client/')
        ->withStatus(302);
    });

    $app->post('/api/da', function (Request $request, Response $response){
        require __DIR__ . '/../db/db.php';
        if($con === false){ 
            $response->getBody()->write('not connected!');
        }else{
            $contentType = $request->getHeaderLine('Content-Type');
            
            $st = $_POST['st'];
            $et = $_POST['et'];
            $insert = "insert into da(starttime, endtime) values('$st', '$et')";
            $run = mysqli_query($con, $insert);

            echo "<script>console.log('Successfully inserted DA');</script>";
            $response->getBody()->write('success');
        }
        return $response
        ->withHeader('Location', 'http://localhost/btech/phc/client/')
        ->withStatus(302);
    });

    $app->post('/api/doctor', function (Request $request, Response $response){
        require __DIR__ . '/../db/db.php';
        if($con === false){ 
            $response->getBody()->write('not connected!');
        }else{
            $contentType = $request->getHeaderLine('Content-Type');
            
            $name = $_POST['name'];
            $dept_id = $_POST['dept_id'];
            $phc_id = $_POST['phc_id'];
            $da_id = $_POST['da_id'];
            $insert = "insert into doctor(name, dept_id, phc_id, da_id) values('$name', '$dept_id', '$phc_id', '$da_id')";
            $run = mysqli_query($con, $insert);

            echo "<script>console.log('Successfully inserted Doctor');</script>";
            $response->getBody()->write('success');
        }
        return $response
        ->withHeader('Location', 'http://localhost/btech/phc/client/')
        ->withStatus(302);
    });

    $app->post('/api/book', function (Request $request, Response $response){
        require __DIR__ . '/../db/db.php';
        if($con === false){ 
            $response->getBody()->write('not connected!');
        }else{
            $contentType = $request->getHeaderLine('Content-Type');
            
            $dept_id = $_POST['dept_id'];
            $doc_id = $_POST['doc'];
            $name = $_POST['name'];
            $time = $_POST['time'];
            $insert = "insert into patient(name, time, dept_id, doc_id) values('$name', '$time','$dept_id', '$doc_id')";
            $run = mysqli_query($con, $insert);

            echo "<script>console.log('Successfully inserted Patient');</script>";
            $response->getBody()->write('success');
        }
        return $response
        ->withHeader('Location', 'http://localhost/btech/phc/client/')
        ->withStatus(302);
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
