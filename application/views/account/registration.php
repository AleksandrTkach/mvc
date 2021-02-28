<div class="coll">
    <h3> Sing Up </h3>

    <form class="mb-3" action="/registration" method="post">
        <div> Login </div>
        <input class="mb-3 w-100" type="text" name="login" minlength="3" maxlength="191" required>

        <div> Password </div>
        <input class="mb-3 w-100" type="password" name="password" minlength="8" maxlength="191" required>

        <div> Password confirmation</div>
        <input class="mb-3 w-100" type="password" name="password_confirmation">

        <button class="btn btn-sm btn-success w-100" type="submit">
            Send
        </button>
    </form>

    <div class="text-center">
        <a href="/login"> Sing In </a>
    </div>

    <?php if (isset($message)) echo $message?>
</div>