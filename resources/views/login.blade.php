<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accedi - Football.com</title>
    </head>
    <body>
    <h1>Esegui l'accesso</h1>
    <?php
                if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                }
                
            ?>
        <main>
            <form name='login' method='post' id='signup'>
            @csrf
                    <label for='username'>
                        Username <input type='text' name="username" id='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                    </label>
                    <label for='password'>
                        Password <input type='password' name="password" id='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    </label>
                        <input type='submit' value="Accedi">
            </form>
            <h2>Non hai un account?</h2>
            <a class="signup-btn" href="signup">Iscrivi a Football.com</a>
        </main>
    </body>
</html>