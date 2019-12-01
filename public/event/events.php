<?php 
    $title = "Charity Link";
    require("event_path.php");
	// include the header
    require("../../private/shared/header.php");
?>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../nav.css">

        <title>Charity Link</title>
    </head>
    <body>
        <div>
         <?php include '../nav.php'; ?>
        </div>

        <br/>
        
        <div class="container">
            <div class="row d-flex justify-content-center">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn" id="searchButton" my-2 my-sm-0" type="submit">Search</button>
                    </form>
            </div>
            
            <br/>
            
            <div class="row">
                <div class="col-md-2">
                        <img src="images/charity_icon.png" class="card-img" alt="...">
                </div>
                                                                                     
                <div class="col-md-10">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo("event_name") ?></h5>
                        <p class="card-text"><?php echo ("event_decription") ?></p>
                        <a href="../event.php?id=<?php echo ("event_id") ?>" class="btn btn-outline-success">Read more</a>
                      </div>   
                    </div>          
                </div>
            </div>
    
            </br>

            <div class="row">
                <div class="col-md-2">
                        <img src="https://upload.wikimedia.org/wikipedia/en/6/61/Squircle_circle_square.png" class="card-img" alt="...">
                </div>
                <div class="col-md-10">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo("event_name") ?></h5>
                        <p class="card-text"><?php echo ("event_decription") ?></p>
                        <a href="../event.php?id=<?php echo ("event_id") ?>" class="btn btn-outline-success">Read more</a>
                      </div>
                    </div>          
                </div>
            </div>
        </div>
        
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>

<?php
	require("../shared/footer.php");
?>