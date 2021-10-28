<div class="container" id="wrapper">
        <br>
        <form action="./?action=searchPage" method="post">
        <div class="row align-items-start">
            <div class="col-sm-10">
                <input type="text" name="search_bar" placeholder="Search for movie" class="form-control" required>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-light" >Search</button>
            </div>
        </div>
        </form>
        <br>
        <br>
        <?php
            require_once('classes/Movie.php');

            try 
            {
                $db = new mysqli("localhost:3306", "root", "", "movieblock");
            } 
            catch (Exception $e) 
            {
            echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " .$db->connect_error;
            return false;
            }

            $searchQuery = "SELECT movieID, title, releaseDate, URL FROM movie WHERE title LIKE '%" . ($_POST['search_bar']) . "%'";
            $result = mysqli_query($db, $searchQuery);
            if (!$result) {
                print "Error - the query could not be executed";
                $error = mysqli_error($db);
                print "<p>" . $error . "</p>";
                exit;
            }

            // Get the number of rows in the result, as well as the first row
            //  and the number of fields in the rows
            $num_rows = mysqli_num_rows($result);
            print "<h3> Search Results: $num_rows </h3>";

            // Row is an array with the values taken from the query result. row = {movieID, title, releaseDate, URL}
            while($row = mysqli_fetch_row($result))
            {
                print "<a align = 'center' style='display: flex; align-items: center;' href = './?action=moviePage&id=" . $row[0] . "'>";
                print "<div class='col-sm-6' >";
                    print "<img class='card-img' src=" . $row[3] . " alt=" . $row[2] . " style='height: 150px; width: auto;'>";
                print "</div>";
                print "<div class='col-sm-6' >";
                    print "<h4>" . $row[1] . "</h4>";
                    print "<p>" . $row[2] . "</p>";
                print "</div>";
                print "</a>";
                print "<hr>";
            }
        ?>
        </div>
    </div>