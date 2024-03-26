
<center>
<h1>Login Page</h1>
    <form action="user" method="post" >
        @csrf
        <div>
            <label >Username</label>
                <input type="text" name="userid" placeholder="Enter UserId">
        </div>
        <div>
            <label >Password</label>
                <input type="password" name="password" placeholder="Enter Password">
        </div>
        
        <div>
            <button type="submit">Login</button>
        </div>

    </form>
</center>    