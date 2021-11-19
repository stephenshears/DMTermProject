<?php

require_once('classes/Movie.php');

if (!array_key_exists('id', $_REQUEST) || !is_numeric($_REQUEST['id'])) {
    echo '<div class="alert alert-danger">Error - No movie ID found</div>';
    return;
}

$searchQuery = "SELECT pass FROM movieblock.admin WHERE adminID = 0 LIMIT 1";
    $result = $db->query($searchQuery);
    if (!$result) {
        print "Error - the query could not be executed";
        $error = mysqli_error($db);
        print "<p>" . $error . "</p>";
        exit;
    }
    $info = $result->fetch_assoc();
    if($info['pass'] == $_REQUEST['pass']){

$movie = new Movie((int)$_REQUEST['id']);
$db->set_charset("utf8");

?>

    <div class="container" id="wrapper">
        <h1 class="display-4"> Update <?= $movie->gettitle() ?> here </h1>
        <br>

        <form action="./?action=updateMovie_Process&id=<?= $movie->getId() ?>" method="post">
            <li class="list-group-item">
                <div class="form-group">
                    <input type="text" name="title" value="<?= $movie->gettitle() ?>" class="form-control" maxlength="60" required>
                </div>
                <p class="lead">Release Date:</p>
                <div class="form-group">
                    <input type="date" name="release_date" value="<?= $movie->getreleaseDate() ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="number" name="budget" value="<?= $movie->getbudget() ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="number" name="runtime" value="<?= $movie->getruntime() ?>" min="30" max="300" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="description" value="<?= $movie->getDescription() ?>" class="form-control" maxlength="1000" required>
                </div>
                <div class="form-group">
                    <input type="date" name="embargo" value="<?= $movie->getembargo() ?>" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="URL" value="<?= $movie->getURL() ?>" class="form-control" maxlength="1000">
                </div>
                <div class="form-group" style="text-align: center;">

                        <?php
                            $pullQuery = "SELECT * FROM genre";
                            $result = mysqli_query($db, $pullQuery);

                            if (!$result) {
                                print "Error - the query could not be executed";
                                $error = mysqli_error($db);
                                print "<p>" . $error . "</p>";
                                exit;
                            }

                            while($row = mysqli_fetch_row($result)) {   
                        ?>
                            <input type="checkbox" name="genres[]" value="<?= $row[0] ?>">
                            <label style="margin-right: 20px;"><?= $row[1] ?></label>
                            <?php if($row[0] == 8){ ?>
                                <br>
                            <?php } ?>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-brand btn-block">Next</button>
                </div>
            </li>
        </form>
    </div>
<?php
    }
    else{
        print("That password was incorrect. Please try again.");
    }
?>