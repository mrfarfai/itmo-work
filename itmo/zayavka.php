<?php 
session_start();

if(!$_SESSION["user"]) {
	header("LOcation: /");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title>Conference Submission Form</title>

<style>
  .footer {
    background-color: #f5f5f5; /
  }
  .footer-column {
    margin-bottom: 15px;
  }
  .footer-column h6 {
    font-weight: bold;
  }
  .footer-column ul {
    list-style: none;
    padding-left: 0;
  }
  .footer-column ul li a {
    color: #333; 
    text-decoration: none;
    transition: color 0.3s;
  }
  .footer-column ul li a:hover {
    color: #007bff; 
  }
</style>
</head>
<body>

<header class="navbar navbar-expand-lg navbar-dark bg-secondary" style="margin: 0 20px;
    border-radius: 0 0 20px 20px;">
  <a class="navbar-brand" href="#">Наука</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav" style="display: flex; justify-content: space-around; width: 100%;">
      <li class="nav-item">
        <a class="nav-link" href="#">Мероприятия</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Новости</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Конкурсы</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Исследователям других вузов</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Сообщество (СНО)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Контакты</a>
      </li>
    </ul>
  </div>
</header>


<div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">
              Главная
            </a>
            <a class="nav-link" href="#">
              Личный данные
            </a>
            <a class="nav-link" href="#">
              Мои публикации
            </a>
            <a class="nav-link active" href="#">
              Подача заявки
            </a>
            <a class="nav-link" href="#">
              Сервисы 
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 ">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Подача заявки</h1>
      </div>

      <form class="container zayavka_form" form action="server.php" method="post" enctype="multipart/form-data">
	    <div class="form-group">
	      <label for="fullName">ФИО докладчика*</label>
	      <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Иванов Иван Иванович">
	      <span id="fullName_err" style="color:red"></span>
	    </div>

	    <div class="form-group">
	      <label for="organizationName">Название организации (ВУЗа)*</label>
	      <select class="form-control" name="organizationName" id="organizationName">
	        <option style="display: none;" value="">Выберите организацию из списка</option>
	        <?php  
          		include "db.php";

          		$q = mysqli_query($conn, "SELECT * FROM `university`;");

          		while($row = mysqli_fetch_assoc($q)) {
          			echo '<option value="'. $row["id"] .'">' . $row["name"] .'</option>';
          		}
          	?>
	      </select>
	      <span id="organizationName_err" style="color:red"></span>
	    </div>

	    <div class="form-group">
	      <label for="presentationTitle">Название доклада*</label>
	      <input type="text" name="presentationTitle" class="form-control" id="presentationTitle" placeholder="Введите название доклада">
	      <span id="doclad_name_err" style="color:red"></span>
	    </div>

	    <div class="form-group">
	      <label for="authorsList">Соавторы</label>
	      <input type="text" name="authorsList" class="form-control" id="authorsList" placeholder="">
	    </div>

	    <div class="form-group">
	      <label for="supervisor">Научный руководитель*</label>
	      <select class="form-control" name="supervisor" id="supervisor">
	        <option style="display: none;" value="">Выберите научного руководителя</option>
	        <option value="Иванов И.И.">Иванов И.И.</option>
	        <option value="Петров И.И.">Петров И.И.</option>
	        <option value="Кошкин И.И.">Кошкин И.И.</option>
	      </select>
	      <span id="supervisor_err" style="color:red"></span>
	    </div>

	    <div class="row">
	    	<div class="form-group col-md-6">
		      <label for="conferenceName">Конференция*</label>
		      <select class="form-control" name="conferenceName" id="conferenceName">
		        <option value="Конгресс молодых ученых">Конгресс молодых ученых</option>
		        <option value="Конгресс 2">Конгресс 2</option>
		        <option value="Конгресс 3">Конгресс 3</option>
		        <option value="Конгресс 4">Конгресс 4</option>
		      </select>
		      <span id="conferenceName_err" style="color:red"></span>
		    </div>

		    <div class="form-group col-md-6">
		      <label for="fieldConference">Направление конференции*</label>
		      <select class="form-control" id="fieldConference" name="fieldConference">
		        <option value="Инженерия">Инженерия</option>
		        <option value="Физика">Физика</option>
		        <option value="Математика">Математика</option>
		      </select>
		      <span id="fieldConference_err" style="color:red"></span>
		    </div>

		    <div class="form-group col-md-6">
		      <label for="language">Язык выступления*</label>
		      <select class="form-control" name="language" id="language">
		        <option value="Русский">Русский</option>
		        <option value="Английский">Английский</option>
		      </select>
		      <span id="language_err" style="color:red"></span>
		    </div>
	    </div>
	   
	   	<div class="row">
		   	<div class="form-group col-md-6">
		      <label for="abstract">Тезисы доклада* (.docx)</label>
		      <input type="file" class="form-control-file" id="abstract" accept=".docx" name="abstract">
		      <span id="abstract_err" style="color:red"></span>
		    </div>


		    <div class="form-group col-md-6">
		      <label for="statya">Статья (.docx)</label>
		      <input type="file" class="form-control-file" id="statya" accept=".docx" name="statya">
		    </div>
	   	</div>
	    

	    <div class="form-group col-md-6">
	      <button type="button" id="zayavka_btn" class="btn btn-secondary">Подать заявку</button>
	    </div>

	  </form>


    </main>
</div>

<footer class="footer">
  <div class="container">
    <div class="row">
    	<div class="col-md-3 footer-column">
	        <h6>Контакты</h6>
	        <ul class="nav flex-column">
	          <li class="nav-item">
	            <span class="nav-link">8 (812) 480-10-91</span>
	          </li>
	          <li class="nav-item">
	            <span class="nav-link">8 (812) 480-10-92</span>
	          </li>
	          <li class="nav-item">
	            <span class="nav-link">Кронверкский проспект, д.49, лит.А, ком. 320</span>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="mailto:csn@itmo.ru">csn@itmo.ru</a>
	          </li>
	        </ul>
	    </div>

      <div class="col-md-3 footer-column">
        <h6>ИТМО</h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">Университет</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Университет</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Университет</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Университет</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Университет</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Университет</a>
          </li>
        </ul>
      </div>
      
      <div class="col-md-3 footer-column">
        <h6>Наука</h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">О СтудНауке</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">О СтудНауке</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">О СтудНауке</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">О СтудНауке</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">О СтудНауке</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">О СтудНауке</a>
          </li>
        </ul>
      </div>

      <div class="col-md-3 footer-column">
        <h6>Ресурсы</h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">Конференции и гранты</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Конференции и гранты</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Конференции и гранты</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Конференции и гранты</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Конференции и гранты</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>
