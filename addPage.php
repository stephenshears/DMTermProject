
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
                    <input type="number" name="runtime" placeholder="Film Runtime in Minutes" min="90" max="300" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="description" placeholder="Film Description" class="form-control" maxlength="1000" required>
                </div>
                <div class="form-group">
                    <input type="date" name="embargo" placeholder="Film's Embargo if it has one" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="URL" placeholder="Film Cover Art URL" class="form-control" maxlength="1000">
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-brand btn-block">Next</button>
                </div>
            </li>
        </form>
    </div>