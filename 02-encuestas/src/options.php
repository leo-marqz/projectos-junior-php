<?php
use Leomarqz\Encuestas\Model\Poll;

if(isset($_POST['title']))
{
    if(isset($_POST['option']))
    {
        $title = $_POST['title'];
        $options = $_POST['option'];

        $poll = new Poll($title, true);
        $poll->save();
        $poll->insertOptions($options);
        header("Location: http://localhost/apps/02-encuestas/");
    }
}
else
{
    header("Location: http://localhost/apps/02-encuestas/");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Options - Poll</title>
</head>
<body>

<header class="navbar navbar-light bg-light shadow-sm mb-4">
    <h1 class="container">Questions</h1>
</header>

<main class="container">
 <div class="row">
 <form class="col-md-4 p-3 bg-light" action="?view=options" method="POST">
        <input type="hidden" name="title" value="<?=$_POST['title']?>">
        <input type="text" class="form-control mb-2" name="option[]" id="" placeholder="Question 1" >
        <input type="text" class="form-control mb-2" name="option[]" id="" placeholder="Question 2" />
        <div id="more-inputs"></div>

        <div class="mt-3">
            <button id="bAdd" class="btn btn-primary">Add another option</button>
            <input type="submit" class="btn btn-success" value="Create Poll">
        </div>
    </form>
     <div class="col-md-5"></div>
     <div class="col-md-3"></div>
 </div>
 <div class="mt-2 mb-2">
            <a href="?view=home" class="btn btn-success">< Regresar a Home</a>
        </div>
</main>
    
</body>
</html>