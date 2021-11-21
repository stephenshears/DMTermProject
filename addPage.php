
    <div class="container" id="wrapper">
        <h1 class="display-4"> Add a Film here </h1>
        <br>

    <?php
        if(array_key_exists('error', $_REQUEST) && $_REQUEST['error'] == '1'){
    ?>
        <form action="./?action=main" method="post">
            <button type="submit" class="btn btn-light">There is already a film within the database with that title and date, click here to search for it from the homepage.</button>
        </form>
    <?php } ?>

        <form action="./?action=addPage_Process" method="post">
            <li class="list-group-item">
                <div class="form-group">
                    <input type="text" name="title" placeholder="Film Title" class="form-control" maxlength="60" required>
                </div>
                <p class="lead">Release Date:</p>
                <div class="form-group">
                    <input type="date" name="release_date" placeholder="Release Date" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="number" name="budget" placeholder="Film Budget" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="number" name="runtime" placeholder="Film Runtime in Minutes" min="30" max="300" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="description" placeholder="Film Description" class="form-control" maxlength="1000" required>
                </div>
                <p class="lead">Embargo:</p>
                <div class="form-group">
                    <input type="date" name="embargo" placeholder="Film's Embargo if it has one" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="URL" placeholder="Film Cover Art URL" class="form-control" maxlength="1000">
                </div>
                <div class="form-group">
                    <input type="number" step="0.1" name="imdbRating" placeholder="Film IMDB Rating out of 10" min="0" max="10" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="number" name="tomatoRating" placeholder="Film Rotten Tomato Rating Percentage" min="0" max="100" class="form-control" required>
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
                            <input type="checkbox" name="genres[]" id="flexCheckDefault" value="<?= $row[0] ?>">
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