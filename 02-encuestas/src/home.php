<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Poll</title>
</head>
<body>
    
<header class="navbar navbar-light bg-light mb-4 shadow-sm">
    <h1 class="container">Home</h1>
</header>

    <main class="container">
        <div class="mt-2 mb-2">
            <a class="btn btn-warning" href="?view=create">Create Poll ></a>
        </div>
        <section class=" p-3 row">
        <?php
            use Leomarqz\Encuestas\Model\Poll;
            $polls = Poll::getPolls();
            foreach ($polls as $poll): 
            ?>
            
            <div class='p-2'>
                    <a href='?view=view&id=<?=$poll->getUUID()?>' class="text-decoration-none "> <☼> <?=$poll->getTitle()?></a>
            </div>
           
        <?php
        endforeach;
        ?>
        </section>

    </main>

</body>
</html>