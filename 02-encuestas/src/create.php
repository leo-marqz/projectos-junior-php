<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Create Poll</title>
</head>
<body>
<header class="navbar navbar-light bg-light mb-4 shadow-sm">
    <h1 class="container">Create new Poll</h1>
</header>

<main class="container">
 <div class="row">
     <form class="col-md-4 p-3 bg-light" action="?view=options" method="POST">
        <label for="title">Title</label>
        <input type="text" class="form-control mb-2" name="title" id="title" required />
         <input type="submit" class="btn btn-primary" value="Next  >">
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