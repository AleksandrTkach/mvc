<div class="coll">
    <h3> Sing In </h3>

    <form class="mb-3" action="/login" method="post">
        <div> Login </div>
        <input class="mb-3 w-100" type="text" name="login" min="3" max="191" required>

        <div> Password </div>
        <input class="mb-3 w-100" type="password" name="password" min="8" max="191" required>

        <button class="btn btn-sm btn-success w-100" type="submit">
            Send
        </button>
    </form>

    <div class="text-center">
        <a href="/registration"> Sing Up </a>
    </div>
</div>
