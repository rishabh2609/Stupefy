<?php
    if(isset($_COOKIE["user"])) {
        header("Location: php/auto_login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up for free</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1 style="font-family: hBold;">Welcome to Stupefy</h1>
			<div id="signup">
				<form method="get" action="php/add_user.php">
					<input style="text-transform: capitalize;" type="text" name="name" placeholder="Name" required class="form-control">

					<input style="text-transform: lowercase;" type="text" name="uname" placeholder="Choose username" required class="form-control" onchange="check(this.value)" autocomplete="off">
                    <p id="uname_err" style="font-size: 1rem; color: red;"></p>

					<input type="password" name="pass" placeholder="Choose password" required class="form-control" id="pass" onchange="check_pass()">

					<input type="password" name="con-pass" placeholder="Confirm password" required class="form-control" onchange="check_pass()" id="con-pass">
                    <p id="pass_err" style="font-size: 1rem; color: red;"></p>

					<!-- <div class="form-group">
   						<label for="pwd">Date of Birth</label>
    					<ul class="list-group">
                
                <li class="list-group-item">
                  <select id="Month" required>
                    <option selected disabled>Month</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                  </select>
                </li>
                
                <li class="list-group-item">
                  <select id="Day" required>
                    <option selected disabled>Day</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                    <option>21</option>
                    <option>22</option>
                    <option>23</option>
                    <option>24</option>
                    <option>25</option>
                    <option>26</option>
                    <option>27</option>
                    <option>28</option>
                    <option>29</option>
                    <option>30</option>
                    <option>31</option>
                  </select> 
                </li>
                
                <li class="list-group-item">
                  <input type="text" name="year" placeholder="Year" required style="border: 0px solid; border-bottom-width: 1px; border-radius: 0px;" maxlength="4">
                </li>

              </ul>

  					</div> -->

            <div class="form-group">
            <select id="gender" required name="gender">
              <option selected disabled>I am...</option>
              <option>Male</option>
              <option>Female</option>
            </select>
            </div>
            
  					<button type="submit" class="btn btn-success" style="margin-top: 10px; margin-bottom: 20px;" id="btn-signup" onclick="this.style.display = 'none';">Sign up</button>	



				</form>

				<a href = "index.php">Already a member?<u>Sign in</u></a>

  				<footer class = "text-center" style="margin-top: 35px;">Made by Rishabh</footer>
			</div>
		</div>
	</div>
</body>
<script src="js/jquery.min.js"></script>
<script srd="js/bootstrap.min.js"></script>
<script src="js/check_username_exists.js"></script>
</html>