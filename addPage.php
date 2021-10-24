

    <div class="container" id="wrapper">
        <h1 class="display-4"> Add a Film here </h1>
        <br>

        <form action="./" method="post">
            <input type="hidden" name="action" value="signup_process">
            <li class="list-group-item">
                <div class="form-group">
                    <input type="text" name="title" placeholder="Film Title" class="form-control" required>
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
                    <input type="text" name="description" placeholder="Film Description" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="embargo" placeholder="Film's Embargo if it has one" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="URL" placeholder="Film Cover Art URL" class="form-control">
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-brand btn-block">Next</button>
                </div>
            </li>
        </form>
    </div>
