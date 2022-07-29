<?php

use Leomarqz\Encuestas\Model\Poll;

if(isset($_GET['id']))
{
    $uuid = $_GET['id'];
    $poll = Poll::find($uuid);

    if(isset($_POST['option_id']))
    {
        $optionId = $_POST['option_id'];
        $poll = $poll->vote($optionId);
    }

}else{
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
    <title>View - Poll</title>
</head>
<body>
    <header class="navbar navbar-light bg-light shadow-sm mb-4">
        <h1 class="container"> <?php echo $poll->getTitle(); ?> </h1>
    </header>
    
    <main class="container">
        
        <p class="text-primary fs-3">Total votos: <?=$poll->getTotalVotes()?></p>
        <section class="row">
    
        <?php
            $options = $poll->getOptions();
            $total = $poll->getTotalVotes();
            foreach ($options as $option):
                $percent = 0;
                if(!($total === 0))
                {
                    $percent = number_format( ( $option['votes'] / $total ) * 100 , 2);
                }
        ?>
            <div class="col-md-4 mb-3 bg-light p-3">
                <form action="?view=view&id=<?=$poll->getUUID()?>" method="POST" >
                <div>
                    <div class="text-primary">Votos: <span class="text-danger"><?php echo $percent . '%'; ?></span></div>
                    <input type="range" class="form-range" value="<?=intval($percent)?>">
                </div>
                    <input type="hidden" name="option_id" value="<?=$option['id']?>">
                    <input type="submit" class="btn btn-primary" value="Votar por <?=$option['title']?>">
                </form>
            </div>
            <div></div>
            <div></div>
        <?php
            endforeach;
        ?>
        </section>
        <div class="mt-2 mb-2">
            <a href="?view=home" class="btn btn-success">< Regresar a Home</a>
        </div>
    </main>
</body>
</html>