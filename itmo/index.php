<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<title>index</title>
</head>
<body>
	<div class="container">
        <div class="row" style="display: flex; justify-content: center;">
			<div class="col-md-5 mx-auto">
				<div id="first">
					<div class="myform form ">
						<div class="logo mb-3">
							 <div class="col-md-12 text-center">
								<h1>Войти</h1>
								<h3 style="color: red" id="login_err"></h3>
							 </div>
						</div>
	                   <form action="" method="post" name="login">
                           <div class="form-group">
                              <label for="login_email">Email</label>
                              <input type="email" name="login_email"  class="form-control login_email" id="login_email" aria-describedby="emailHelp" placeholder="Введите email">
                              <span style="color: red;" id="login_email_error"></span>
                           </div>
                           <div class="form-group">
                              <label for="login_password">Пароль</label>
                              <input type="password" name="login_password" id="login_password"  class="form-control login_password" aria-describedby="emailHelp" placeholder="Введите пароль">
                              <span style="color: red;" id="login_pass_error"></span>
                           </div>
                           <div class="col-md-12 text-center">
                              <button type="button" class=" btn btn-block mybtn btn-primary tx-tfm" id="login_btn">Войти</button>
                           </div>
                           
                           <div class="form-group">
                              <p class="text-center">Нет аккаунта? <a href="#" id="signup">Зарегистрироваться</a></p>
                           </div>
                        </form>
					</div>
				</div>
			  	<div id="second">
			      	<div class="myform form ">
	                    <div class="logo mb-3">
	                       <div class="col-md-12 text-center">
	                          <h1 >Регистрация</h1>
	                       </div>
	                    </div>
	                    <form action="#" name="registration">
	                       <div class="form-group">
	                          <label for="firstname">Имя*</label>
	                          <input type="text"  name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Введите имя">
	                          <span style="color: red;" id="name_err"></span>

	                       </div>
	                       <div class="form-group">
	                          <label for="surname">Фамилия*</label>
	                          <input type="text"  name="firstname" class="form-control" id="surname" aria-describedby="emailHelp" placeholder="Введите Фамилию">
	                          <span style="color: red;" id="surname_err"></span>

	                       </div>
	                       <div class="form-group">
	                          <label for="lastname">Отчество</label>
	                          <input type="text"  name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Введите отчество">
	                          <span style="color: red;" id="lastname_err"></span>

	                       </div>

	                       <div class="form-group">
	                          <label for="phone">Телефон*</label>
	                          <input type="text" name="phone"  class="form-control" id="phone" aria-describedby="emailHelp" placeholder="+71234567890">
	                          <span style="color: red;" id="phone_err"></span>

	                       </div>
	                       <div class="form-group">
	                          <label for="email">Email*</label>
	                          <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Введите email">
	                          <span style="color: red;" id="email_err"></span>

	                       </div>
	                       <div class="form-group">
	                          <label for="password">Пароль*</label>
	                          <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Введите пароль">
	                          <span style="color: red;" id="pass_err"></span>

	                       </div>
	                       <div class="form-group">
	                          <label for="conf_password">Подтвердить пароль*</label>
	                          <input type="password" name="conf_password" id="conf_password"  class="form-control" aria-describedby="emailHelp" placeholder="Введите пароль">
	                          <span style="color: red;" id="conf_password_err"></span>

	                       </div>

	                       <div class="form-group">
	                          <label for="university">Университет*</label>
	                          <select name="university" id="university" class="form-control">
	                          	<option style="display: none;" value="">-- выберите --</option>

	                          	<?php  
	                          		include "db.php";

	                          		$q = mysqli_query($conn, "SELECT * FROM `university`;");

	                          		while($row = mysqli_fetch_assoc($q)) {
	                          			echo '<option value="'. $row["id"] .'">' . $row["name"] .'</option>';
	                          		}
	                          	?>
	                          </select>
	                          <span style="color: red;" id="university_err"></span>

	                       </div>

	                       <div class="form-group">
	                          <label for="city">Город*</label>
	                          <select name="city" id="city" class="form-control">
	                          	<option style="display: none;" value="">-- выберите --</option>

	                          	<?php  
	                          		$q = mysqli_query($conn, "SELECT * FROM `city`;");

	                          		while($row = mysqli_fetch_assoc($q)) {
	                          			echo '<option value="'. $row["id"] .'">' . $row["name"] .'</option>';
	                          		}
	                          	?>
	                          </select>
	                          <span style="color: red;" id="city_err"></span>

	                       </div>

	                       <div class="col-md-12 text-center mb-3">
	                          <button type="button" class=" btn btn-block mybtn btn-primary tx-tfm" id="register_btn">Зарегистрироваться</button>
	                       </div>
	                       <div class="col-md-12 ">
	                          <div class="form-group">
	                             <p class="text-center">
	                             	<a href="#" id="signin">Есть аккаунт?</a>
	                             </p>
	                          </div>
	                       </div>
	                	</form>
	               	</div>
				</div>
			</div>
		</div>
	</div> 

	<script type="text/javascript" src="script.js"></script>
</body>
</html>