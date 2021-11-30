<?php

require_once('classes/Movie.php');
require_once('classes/Rating.php');

if (!array_key_exists('id', $_REQUEST) || !is_numeric($_REQUEST['id'])) {
    echo '<div class="alert alert-danger">Error - No movie ID found</div>';
    return;
}

$movie = new Movie((int)$_REQUEST['id']);
$rating = new Rating((int)$_REQUEST['id']);
$db->set_charset("utf8");

?>

<style>
    #rate {
        display: inline-block;
        height: 46px;
        padding: 0 10px;
    }
    #rate:not(:checked) > input {
        position:absolute;
        visibility: hidden;
    }
    #rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    #rate:not(:checked) > label:before {
        content: '★ ';
    }
    #rate > input:checked ~ label {
        color: #35b8cd;    
    }
    #rate:not(:checked) > label:hover,
    #rate:not(:checked) > label:hover ~ label {
        color: #17a2b8;  
    }
    #rate > input:checked + label:hover,
    #rate > input:checked + label:hover ~ label,
    #rate > input:checked ~ label:hover,
    #rate > input:checked ~ label:hover ~ label,
    #rate > label:hover ~ input:checked ~ label {
        color: #05bdca;
    }
</style>

    <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h1><?= $movie->gettitle() ?></h1>
                <p class="mb-0">
                    <strong>Release Date:</strong> <?= $movie->getreleaseDate("n/j/Y") ?>
                    <strong style="padding-left: 20px;">Genres: </strong> 
                    <?= $genres = implode(', ', $movie->getGenres());
                        if(empty($genres))
                        {
                            print("N/A");
                        }
                    ?>
                </p>
                <hr>
                <img src="<?= $movie->getURL() ?>" alt="<?= $movie->gettitle() ?>" class="img-thumbnail" style="width: auto; height: 500px;">
                
                <?php 
                
                if(isset($_SESSION['status']))
                {
                    $userID = $_SESSION['id'];
                    $movieID = $_REQUEST['id'];
                    
                    $query = "SELECT * FROM userratings WHERE userID = '" . $userID . "' AND movieID = '" . $movieID . "';";
                    $result = mysqli_query($db, $query);

                    if (!$result) {
                        print "Error - the query could not be executed";
                        $error = mysqli_error($db);
                        print "<p>" . $error . "</p>";
                        exit;
                    }
                }

                if (isset($_SESSION['status']) && mysqli_num_rows($result)==0) 
                {
                        print("
                        <form style='border:1px outset #ced4da; border-radius: 5px; -webkit-box-shadow: 5px 5px 5px rgba(0,0,0,0.2); width: 80%; margin: auto; margin-top: 100px; text-align: center;'
                        action='./?action=addReview&id=" . $movie->getId() . "' method='post'>
                            <div style='margin: 10px 100px; padding: 10px;'>
                                <fieldset>
                                    <legend>Rating and Review</legend>
                                    <div class='form-group' id='rate' style='margin: auto;'>
                                        <input type='radio' id='star5' name='rate' value='5' required='required'>
                                        <label for='star5' title='5 Stars'>5 stars</label>
                                        <input type='radio' id='star4' name='rate' value='4' required='required'>
                                        <label for='star4' title='4 Stars'>4 stars</label>
                                        <input type='radio' id='star3' name='rate' value='3' required='required'>
                                        <label for='star3' title='3 Stars'>3 stars</label>
                                        <input type='radio' id='star2' name='rate' value='2' required='required'>
                                        <label for='star2' title='2 Stars'>2 stars</label>
                                        <input type='radio' id='star1' name='rate' value='1' required='required'>
                                        <label for='star1' title='1 Star'>1 star</label>
                                    </div>
                                </fieldset>
                                <textarea style='width: 100%; height: 145px;' name='review' maxlength='300' placeholder='Tell us how you thought of the movie!' required ></textarea>
                                <button type='submit' class='btn btn-primary'>Submit Review</button>
                            </div>
                        </form>");
                } 
                else if(!isset($_SESSION['status'])) 
                {
                    print("
                    <form style='margin: auto; margin-top: 100px; text-align: center;'
                    action='./?action=loginUser' method='post'>
                        <div style='padding: 10px;'>
                            <button style='margin: auto;' type='submit' class='btn btn-primary'>Login to Write a Review</button>
                        </div>
                    </form>
                    ");
                }
                else
                {
                    $alreadyReviewed = $result->fetch_assoc();
                    switch($alreadyReviewed['ratingScore']) {
                        case 2:
                            $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='font-size:30px;'>★ </span>
                                        <span style='font-size:30px;'>★ </span>
                                        <span style='font-size:30px;'>★ </span>
                                        <span style='font-size:30px;'>★ </span>";
                            break;
                        case 4:
                            $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='font-size:30px;'>★ </span>
                                        <span style='font-size:30px;'>★ </span>
                                        <span style='font-size:30px;'>★ </span>";
                            break;
                        case 6:
                            $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='font-size:30px;'>★ </span>
                                        <span style='font-size:30px;'>★ </span>";
                            break;
                        case 8:
                            $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='font-size:30px;'>★ </span>";
                            break;
                        case 10:
                            $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                        <span style='color:#35b8cd; font-size:30px;'>★ </span>";
                            break;
                    }

                    print("
                    <form style='border:1px outset #ced4da; border-radius: 5px; -webkit-box-shadow: 5px 5px 5px rgba(0,0,0,0.2); width: 80%; margin: auto; margin-top: 100px; text-align: center;'
                    action='./?action=removeReview&id=" . $movie->getId() . "' method='post'>
                        <div style='margin: 10px 100px; padding: 10px;'>
                            <fieldset>
                                <legend>Your Rating & Review</legend>
                                <div class='form-group' id='rate' style='margin: auto;'>
                                        ". $stars ."
                                </div>
                            </fieldset>
                            <p style='width: 100%; height: 145px;' name='review' >" . $alreadyReviewed['ratingDescr'] . "</p>
                            <button type='submit' class='btn btn-primary'>Delete Review</button>
                        </div>
                    </form>
                    ");
                }
                ?>

            </div>
            <div class="col-sm-6">
                <h2> OverView </h2>
                <hr>
                <h3>Description</h3>
                <p><?php print $movie->getDescription(); ?></p>
                <h3>Runtime</h3>
                <p><?php print $movie->getruntime() ?> minutes</p>
                <h4>Budget</h4>
                <p>$<?= $movie->getbudget() ?></p>
                <hr>
                <h2>Review Scores </h2>
                <h5><b>IMDb Score:</b></h5> 
                <p><b><?= $rating->getimdbRating() ?></b> / 10 </p>
                <h5><b>Rotten Tomatoes Score:</b></h5>
                <p><b><?= $rating->gettomatoRating() ?></b>% </p>
                <h4><b>BlocScore:</b></h4>
                <h5><b><?= $rating->getblocRating() ?></b> / 10</h5>

                <hr>
                <div class="col-sm-6">
                    <form action="./?action=updateMovie&id=<?= $movie->getId() ?>" method="post">
                    <input type="password" name="pass" placeholder="Admin Password Required" class="form-control" maxlength="20" required>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
                <br>
                <div class="col-sm-6">
                    <form action="./?action=delete_Process&id=<?= $movie->getId() ?>" method="post">
                    <input type="password" name="pass" placeholder="Admin Password Required" class="form-control" maxlength="20" required>
                    <button type="submit" class="btn btn-secondary">Delete</button>
                    </form>
                </div>
                <br>
                <?php 
                if(isset($_SESSION['status']))
                {
                    if(in_array($movie->getID(), $_SESSION['movieList']))
                    {
                        print("
                        <div class='col-sm-6'>
                                <form action='./?action=removeFromList_Process&id=". $movie->getId() ."' method='post'>
                                <button type='submit' class='btn btn-secondary'>Remove from List</button>
                                </form>
                        </div>");
                    }
                    else
                    {
                        print("
                        <div class='col-sm-6'>
                            <form action='./?action=addToList_Process&id=". $movie->getId() ."' method='post'>
                            <button onclick='type='submit' class='btn btn-secondary'>Add to List</button>
                            </form>
                        </div>");
                    }
                }
                ?>
            </div>
        </div>
        <br><hr><br>
        <div class="row">
            <div style="margin: auto;">
                <h2>Reviews and Ratings</h2>
                <?php 
                if(isset($_SESSION['status']))
                {
                    $userID = $_SESSION['id'];
                }
                $movieID = $_REQUEST['id'];
                
                $query = "SELECT * FROM userratings WHERE movieID = '" . $movieID . "';";
                $result = mysqli_query($db, $query);

                if (!$result) {
                    print "Error - the query could not be executed";
                    $error = mysqli_error($db);
                    print "<p>" . $error . "</p>";
                    exit;
                }

                if (mysqli_num_rows($result) == 0)
                {
                    print("<p>No one has written a review yet. Be the first one!</p>");
                }
                else
                {
                    if(isset($_SESSION['status']))
                    {
                        while($reviews = $result->fetch_assoc())
                        {
                            if ($reviews['userID'] != $_SESSION['id'])
                            {
                                switch($reviews['ratingScore']) {
                                    case 2:
                                        $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='font-size:30px;'>★ </span>
                                                    <span style='font-size:30px;'>★ </span>
                                                    <span style='font-size:30px;'>★ </span>
                                                    <span style='font-size:30px;'>★ </span>";
                                        break;
                                    case 4:
                                        $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='font-size:30px;'>★ </span>
                                                    <span style='font-size:30px;'>★ </span>
                                                    <span style='font-size:30px;'>★ </span>";
                                        break;
                                    case 6:
                                        $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='font-size:30px;'>★ </span>
                                                    <span style='font-size:30px;'>★ </span>";
                                        break;
                                    case 8:
                                        $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='font-size:30px;'>★ </span>";
                                        break;
                                    case 10:
                                        $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                    <span style='color:#35b8cd; font-size:30px;'>★ </span>";
                                        break;
                                }
        
                                print("
                                <div style='border:3px outset #ced4da; border-radius: 5px; -webkit-box-shadow: 5px 5px 5px rgba(0,0,0,0.2); margin: auto; margin-top: 100px; text-align: center;'>
                                    <div style='margin: 10px; padding: 10px;'>
                                        <fieldset>
                                            <h3> " . $reviews['username'] . " </h3>
                                            <div class='form-group' id='rate' style='margin: auto;'>
                                                    ". $stars ."
                                            </div>
                                        </fieldset>
                                        <p style='width: 100%;' name='review' >" . $reviews['ratingDescr'] . "</p>
                                    </div>
                                </div>
                                ");
                            }
                        }
                    }
                    else
                    {
                        while($reviews = $result->fetch_assoc())
                        {
                            switch($reviews['ratingScore']) {
                                case 2:
                                    $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='font-size:30px;'>★ </span>
                                                <span style='font-size:30px;'>★ </span>
                                                <span style='font-size:30px;'>★ </span>
                                                <span style='font-size:30px;'>★ </span>";
                                    break;
                                case 4:
                                    $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='font-size:30px;'>★ </span>
                                                <span style='font-size:30px;'>★ </span>
                                                <span style='font-size:30px;'>★ </span>";
                                    break;
                                case 6:
                                    $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='font-size:30px;'>★ </span>
                                                <span style='font-size:30px;'>★ </span>";
                                    break;
                                case 8:
                                    $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='font-size:30px;'>★ </span>";
                                    break;
                                case 10:
                                    $stars = "  <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='color:#35b8cd; font-size:30px;'>★ </span>
                                                <span style='color:#35b8cd; font-size:30px;'>★ </span>";
                                    break;
                                }
        
                            print("
                            <div style='border:1px outset #ced4da; border-radius: 5px; -webkit-box-shadow: 5px 5px 5px rgba(0,0,0,0.2); margin: 50px auto; text-align: center;'>
                                <div style='margin: 10px 50px; padding: 10px;'>
                                    <fieldset>
                                        <h3> " . $reviews['username'] . " </h3>
                                        <div class='form-group' id='rate' style='margin: auto;'>
                                                ". $stars ."
                                        </div>
                                    </fieldset>
                                    <p style='width: 100%;' name='review' >" . $reviews['ratingDescr'] . "</p>
                                </div>
                            </div>
                            ");
                        }
                    }
                    
                }
                
                ?>
            </div>
        </div>
    </div>
</div>