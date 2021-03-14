<div class="container">
    <h2>Login To Your Account / Register New</h2>
    <div id="containerForm">
        <?php    
            if(isset($error)){
                echo '<div class="alert alert-danger">' . $error . '</div>';
            }  
        ?> 
        <div class="legendForm">
            <div class="icon"></div>
            <div class="legend">Login To Your Account  <span>/ Register New</span></div>
        </div>
        <div id="bodyForm">
            <div id="leftside">
                <div id="lines">
                    <div id="slash">/</div>
                    <hr id="thinninLine"/>
                </div>
                <form action="/form" method="POST" id="formLogInto">                        
                    <div class="wrapper">
                        <input type="text" class="inp" id="user-name" name="name" placeholder="User Name" value="<?= ($error ?? null) ? $_POST['name'] : null ?>">                        
                        <div class="success hide">&#10003</div>
                        <div class="error hide"">!</div>
                    </div>
                    <div class="wrapper">
                        <input id="user-password"  class="inp" name="password" type="password" autocomplete="current-password" placeholder="Password">
                        <div class="success hide">&#10003</div>
                        <div class="error hide"">!</div>
                    </div>
                    <div id="contCheck">
                        <label>
                            <input type="checkbox" id="remember" name="remember" value="1">
                            <span></span>
                            Remember My password
                        </label>
                        <button type="submit" id="enter" class="btn" name="enter" value="enter">Login</button>
                    </div>      
                </form>
            </div>

            <div id="line"></div>
            
            <div id="rightside">
                <div class="legendForm" id="appears">
                    <div class="icon"></div>
                    <div class="legend">Register New</div>
                </div>
                <form action="/form" method="POST" id="formRegister">
                    <h3 class="legend">Register</h3>
                    <label for="email" class="form-label">Email</label>
                    <div class="wrapper">
                        <input type="email" class="" id="email" name="email"  class="inp" value="<?= ($error ?? null) ? $_POST['email'] : null ?>">
                        <div class="success hide">&#10003</div>
                        <div class="error hide"">!</div>
                    </div>
                    <label for="name" class="form-label">User Name</label>
                    <div class="wrapper">
                        <input type="text"  class="inp" id="userName" name="userName" value="<?= ($error ?? null) ? $_POST['userName'] : null ?>">
                        <div class="success hide">&#10003</div>
                        <div class="error hide"">!</div>
                    </div>
                    <label  class="form-label" for="password">Password</label>
                    <div class="wrapper">
                        <input id="userPassword" name="password" type="password" class="inp" autocomplete="current-password">
                        <div class="success hide">&#10003</div>
                        <div class="error hide"">!</div>
                    </div>   
                    <button type="submit" id="registration" class="btn" name="registration" value="registration">Register</button>			                        
                </form>
            </div>
        </div>
    </div>
</div>

