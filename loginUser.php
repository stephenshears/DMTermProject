<div class="container" id="wrapper">
        <h1 class="display-4"> User Login </h1>
        <br>

    <?php
        if(array_key_exists('error', $_REQUEST) && $_REQUEST['error'] == '1'){
    ?>
        <form action="./?action=loginUser" method="post">
            <button type="submit" class="btn btn-light">The username and/or password entered are not valid.</button>
        </form>
    <?php } ?>

        <form action="./?action=loginUser_Process" method="post">
            <li class="list-group-item">
            <p class="lead">Username:</p>
                <div class="form-group">
                    <input type="text" name="username" placeholder="Joe Smith" class="form-control" maxlength="60" required>
                </div>
                <p class="lead">Password:</p>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-brand btn-block">Next</button>
                </div>
                <a href="./?action=addUser">Don't have an account? Signup here!</a>
            </li>
        </form>
    </div>