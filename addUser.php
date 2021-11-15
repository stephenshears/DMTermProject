<div class="container" id="wrapper">
        <h1 class="display-4"> User Signup </h1>
        <br>

    <?php
        if(array_key_exists('error', $_REQUEST) && $_REQUEST['error'] == '1'){
    ?>
        <form action="./?action=loginUser" method="post">
            <button type="submit" class="btn btn-light">There is already a user with that username and email. Click here to Login.</button>
        </form>
    <?php } ?>

        <form action="./?action=addUser_Process" method="post">
            <li class="list-group-item">
                <p class="lead">Username:</p>
                <div class="form-group">
                    <input type="text" name="username" placeholder="Joe Smith" class="form-control" maxlength="60" required>
                </div>
                <p class="lead">Email Address:</p>
                <div class="form-group">
                    <input type="email" name="email" placeholder="joesmith@gmail.com" class="form-control" maxlength="60" required>
                </div>
                <p class="lead">Password:</p>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                    class="form-control" minlength="8" onkeyup='check();' required>
                </div>
                <p class="lead">Confirm Password:</p>
                <div class="form-group">
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Re-enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                    class="form-control" minlength="8" onkeyup='check();' required>
                    <span id='message'></span>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-brand btn-block" id="signUpButton" disabled="true">Next</button>
                </div>
                <a href="./?action=loginUser">Already have an account? Login here!</a>
            </li>
        </form>
    </div>

    <script>
        var check = function() {
            if (document.getElementById('password').value == document.getElementById('confirm-password').value) 
            {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = '';
                document.getElementById('signUpButton').disabled = false;
            } 
            else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Passwords do not match';
            }
        }
    </script>