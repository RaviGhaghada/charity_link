<?php 
  $title = "Charity Link";
  require("event_path.php");
	// include the header
  require("../../private/shared/header.php");
  
  require_once("../../private/initialize.php");
  
  if (!isset($_GET["id"])){
    redirect_to(url_for("index.php"));
  }

  $id = $_GET["id"];
  $event = CharityEvent::find_by_id($id);
  $organiser = User::find_by_id($event->organiser_id);
  
?>

<?php  $user_id = $_SESSION['id'];
  $charity_id = $_GET['id'];
  echo $user_id . $charity_id;

if ($_SERVER['REQUEST_METHOD']=='POST'){


}

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
         <?php //include '../nav.php'; ?>
        </div>

        <br/>
        
        <div class="container">
            <div class="row d-flex justify-content-center">
                     <img src="<?php echo "images/".$event->imgurl; ?>" alt="...">
            </div>
            
            <br/>
            
            <div class="row">
                <div class="col-md">
                    <div class="card">
                      <div class="card-body">
                        <p class="card-text"><b><?php echo ($event->name); ?></b></p>
                        <p class="card-text">Organised by <?php echo ($organiser->user_name); ?></p>
                        <p class="card-text"><?php echo ($event->description); ?></p>
                      </div>
                    </div> 
                </div>
                <div class="col-md">
                    <div class="card">
                      <div class="card-body">
                        <p class="card-text">Address: <?php echo ($event->address." ".$event->postcode)?> 
                        <a href="<?php echo 'https://google.com/maps?q='.($event->postcode);?>" target="_blank">
                                    <img src="images/gmaps.png" alt="..." style="width: 2rem; height: 2rem;" >
                                </a>
                        </p>
                        <p class="card-text">Start date: <?php echo ($event->start_date); ?></p>
                        <p class="card-text">End date: <?php echo ($event->end_date); ?></p>
                        <p class="card-text">Current fund: <?php echo ($event->donation_sum()); ?></p>
                        <p class="card-text">Fund goal: <?php echo ($event->fund_goal); ?></p>
                        <div class="row">
                            <div class="col-sm">
                                <a href="<?php echo (url_for("/event/eventjoin.php?id=".$event->id)); ?>" class="btn btn-outline-success btn-block">Join</a>
                            </div>
                            <div class="col-sm">
                                <a href="<?php echo (url_for("/event/eventdonate.php?id=".$event->id)); ?>" class="btn btn-outline-success btn-block">Donate</a>
                            </div>
                        </div>
                      </div>
                    </div>          
                </div>
            </div>
            
            </br>
        
            <div class="row">
                <div class="col-md">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title"><b>Participants</b></h5>
                        <?php  
                        $participants = $event->get_all_participants();
                        if (sizeof($participants)==0){
                          echo '</br>Support is on the way!';
                        }
                        foreach ($participants as $p){
                            echo '</br>
                                  <div class="row">
                                      <div class="col-md-3">
                                              <img src="images/user.png" class="card-img" alt="...">
                                      </div>
                                      <div class="col-md-9">
                                          <div class="card text-center">
                                            <div class="card-body">
                                              <h5 class="card-text">'.$p->user_name.'</h5>
                                              </div>
                                          </div>          
                                      </div>
                                  </div>';
                        }
                        ?>
                      </div>      
                    </div> 
                </div>
                <div class="col-md">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-text"><b>Donators</b></h5>
                          
                        
                        <?php
                          $donators = $event->get_all_donators();
                          if (sizeof($donators) == 0){
                            echo "</br>No donators? Aw, it'll be okay :)";
                          }
                          foreach ($donators as $u => $a){
                            echo '</br> <div class="row">
                                <div class="col-md-3">
                                        <img src="images/user.png" class="card-img" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="card text-center">
                                      <div class="card-body">
                                        <h5 class="card-title">'.$u->user_name.'</h5>
                                        </div>
                                    </div>          
                                </div>
                                <div class="col-md-3">
                                    <div class="card text-center">
                                      <div class="card-body">
                                        <h5 class="card-text">'.$d.'</h5>
                                        </div>
                                    </div>          
                                </div>
                            </div>';
                          }
                        ?> 
                      </div>
                    </div>          
                </div>
            </div>

            <br/>
            
            <?php
            if (isset($_SESSION['id'])){
              if ($_SESSION['id'] == $event->organiser_id || 1==1){
                echo '<div class="row">
                    <div class="col-sm">
                        <a href="'.url_for("event/eventform.php?id=".$event->id).'" class="btn btn-outline-success btn-block">Edit</a>
                    </div>
                    <div class="col-sm">
                        <a href="'.url_for("event/eventdelete.php?id=".$event->id).'" class="btn btn-outline-success btn-block">Delete</a>
                    </div>
                  </div>';
              }
            }
            ?>
                
        </div>
        
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>

<?php
	require("../../private/shared/footer.php");
?>