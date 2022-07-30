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
    <style>
        .btn-delete{
            width:20px;
            height: auto ;
            background-color: red;
            color:red;
        }
    </style>
</head>
<body>

<header class="navbar navbar-light bg-light shadow-sm mb-4">
    <h1 class="container">Questions</h1>
</header>

<main class="container">
 <div class="row">
 <form class="col-md-4 p-3 bg-light" action="?view=options" method="POST">
        <input type="hidden" name="title" value="<?=$_POST['title']?>">
        <input type="text" class="iinput form-control mb-2" name="option[]" id="" placeholder="Question 1" autocomplete="off" required />
        <input type="text" class="input form-control mb-2" name="option[]" id="" placeholder="Question 2" autocomplete="off" required />
        <div id="container-inputs"></div>

        <div class="mt-3">
            <button id="add-input" class="btn btn-primary">Add another option</button>
            <input type="submit" id="create-poll" class="btn btn-success" value="Create Poll">
        </div>
    </form>
     <div class="col-md-5"></div>
     <div class="col-md-3"></div>
 </div>
 <div class="mt-2 mb-2">
            <a href="?view=home" class="btn btn-success">< Regresar a Home</a>
        </div>
</main>

<script type="text/javascript">

const containerInputs = document.getElementById('container-inputs')
const addInput = document.getElementById('add-input')

addInput.addEventListener('click', handleInput)

function handleInput(e)
{
    e.preventDefault()
    const input = document.createElement('input')
    const box = document.createElement('div')
    const btnDelete = document.createElement('button')

    input.setAttribute('type', 'text')
    input.setAttribute('class', 'input form-control')
    input.setAttribute('name', 'option[]')
    input.setAttribute('required', 'true')
    input.setAttribute('placeholder', 'Other question..')
    input.setAttribute('autocomplete', 'off')

    btnDelete.append(' X ')
    btnDelete.setAttribute('class', 'btn btn-danger')
    btnDelete.setAttribute('type', 'button')
    btnDelete.addEventListener('click', (e)=>{
        e.preventDefault()
        box.remove()
    })

    box.setAttribute('class', 'd-flex gap-2 pt-1 pb-1')
    box.appendChild(input)
    box.appendChild(btnDelete)
    containerInputs.appendChild(box)    

}


</script>
    
</body>
</html>