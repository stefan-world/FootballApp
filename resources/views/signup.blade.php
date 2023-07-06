<!-- <form method="POST" action="{{ route('signup') }}">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" required>
    <label for="email">Email</label>
    <input type="email" name="email" required>
    <label for="password">Password</label>
    <input type="password" name="password" required>
    <button type="submit">Register</button>
</form> -->

<html>
    <head>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}" />
    <script src="{{ asset('js/signup.js') }}"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Iscriviti - Football.com</title>
    </head>
    <body>
        <h1>Iscriviti gratis qui!</h1>
        <main>
            <form id='signup' name='signup' method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
                <label for='nome'> 
                    Nome <input type='text' name='nome' id='nome' <?php if(isset($_POST["nome"])){echo "value=".$_POST["nome"];} ?>> 
                    <span class='nonOpaco' id='nome2'> Campo obbligatorio</span> 
                </label>
                <label for='cognome'> 
                    Cognome <input type='text' name='cognome' id='cognome' <?php if(isset($_POST["cognome"])){echo "value=".$_POST["cognome"];} ?>> 
                    <span class='nonOpaco' id='cognome2'> Campo obbligatorio</span>
                </label>
                <label for='e-mail'> 
                    E-mail<input type='text' name='e-mail' id='eMail' <?php if(isset($_POST["e-mail"])){echo "value=".$_POST["e-mail"];} ?>> 
                    <span class='nonOpaco' id='email2'> Campo obbligatorio</span>
                </label>
                <label for='username'>
                    Username<input type='text' name='username' id='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>> 
                    <span class='nonOpaco' id='username2'>Campo obbligatorio </span>
                </label>
                <label for='password'> 
                    Password (10 caratteri minimo)  <input type='password' name='password' id='password'<?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>> 
                    <span class='nonOpaco' id='password2'> Campo obbligatorio</span> 
                    </label>
                <label for='conferma_password'> 
                    Conferma password <input type='password' name='conferma_password' id='conferma_password' <?php if(isset($_POST["conferma_password"])){echo "value=".$_POST["conferma_password"];} ?>> 
                    <span class='nonOpaco' id='conferma_password2'> Campo obbligatorio</span>
                </label>
                <input type='submit' value="Registrati" id="submit">
            </form>
        </main>
        <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='errore'>$err </div>";
                    }
                } ?>
    </body>
</html>