<div class="left">
       <img src="img/cbt1.jpg" alt="Computer-Based Test">
</div>
<div class="right">
       <div class="login-container">
              <h2>Login</h2>
              <form id="loginForm" method="POST" onsubmit="setActionBasedOnRole(event)">
                     <div class="form-group">
                            <label for="role">Login as:</label>
                            <select id="role" name="role">
                                   <option value="">Select Role</option>
                                   <option value="admin">Admin</option>
                                   <option value="ac">Academic Coordinator</option>
                                   <option value="student">Student</option>
                            </select>
                            <div id="roleError" class="error">Please select a role.</div>
                     </div>
                     <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username">
                            <div id="usernameError" class="error">Username is required.</div>
                     </div>
                     <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password">
                            <div id="passwordError" class="error">Password is required.</div>
                     </div>
                     <button type="submit">Login</button>
                     <div class="forgot-password">
                     <a href="forgot-password.php">Forgot Password?</a>
                     </div>
              </form>
       </div>
</div>