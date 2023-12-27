$("#signup").click(function() {
  $("#first").fadeOut("fast", function() {
    $("#second").fadeIn("fast");
  });
});

$("#signin").click(function() {
  $("#second").fadeOut("fast", function() {
    $("#first").fadeIn("fast");
  });
});

$("#login_btn").on("click", function(){
  $("#login_err").text("");
  var email = $(".login_email").val();
  var pass = $(".login_password").val();
  var err = 0;

  var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(!email.match(pattern)) {
    $("#login_email_error").text("Введите корректно !");
    err++;
  }
  else{
    $("#login_email_error").text("");
  }

  if(pass.length == 0) {
    err++;
    $("#login_pass_error").text("Введите пароль");
  }
  else {
    $("#login_pass_error").text("");
  }

  if(err == 0) {
    $.ajax({
      url: "server.php",
      method: "POST",
      data: {
        type : "login",
        email : email,
        pass : pass
      },
      dataType: "html",
      success: function(data) {
        if(data == "ok") {
          window.location = "/zayavka.php";
        }
        else {
          $("#login_err").text("Логин или пароль неправильный !");
        }
      }
    });
  }

});


$("#register_btn").on("click", function(){
  var name = $("#firstname").val();
  var surname = $("#surname").val();
  var lastname = $("#lastname").val();
  var phone = $("#phone").val();
  var email = $("#email").val();
  var password = $("#password").val();
  var conf_password = $("#conf_password").val();
  var university = $("#university").val();
  var city = $("#city").val();
  var err = false;

  $("#name_err").text("");
  $("#surname_err").text("");
  $("#lastname_err").text("");
  $("#phone_err").text("");
  $("#email_err").text("");
  $("#pass_err").text("");
  $("#conf_password_err").text("");
  $("#university_err").text("");
  $("#city_err").text("");

  var pattern = /^[\wа-яА-Я]+$/;
  if(!name.match(pattern)) {
    $("#name_err").text("Введите имя !");
    err = true;
  }

  if(!surname.match(pattern)) {
    $("#surname_err").text("Введите фамилию !");
    err = true;
  }

  var pattern = /^\+7[0-9]{10}$/;
  if(!phone.match(pattern)) {
    $("#phone_err").text("Введите корректно !");
    err = true;
  }

  var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(!email.match(pattern)) {
    $("#email_err").text("Введите корректно !");
    err = true;
  }

  if(password.length == 0) {
    $("#pass_err").text("Введите пароль");
    err = true;
  }

  if(conf_password.length == 0) {
    $("#conf_password_err").text("Введите пароль");
    err = true
  }

  if(conf_password != password) {
    $("#conf_password_err").text("Пароли не совпадают");
    err = true
  }

  if(university == "") {
    $("#university_err").text("Выберите");
    err = true;
  }

  if(city == "") {
    $("#city_err").text("Выберите");
    err = true;
  }


  if(!err) {
    $.ajax({
      url: "server.php",
      method: "POST",
      data: {
        type : "register",
        name : name,
        surname : surname,
        lastname : lastname,
        phone : phone,
        email : email,
        pass : password,
        university : university,
        city : city
      },
      dataType: "html",
      success: function(data) {
        console.log(data);
        if(data == "ok") {
          window.location = "/zayavka.php";
        }
        else {
          $("#email_err").text("Email уже используется !");
        }
      }
    });
  }



});

$("#zayavka_btn").on("click", function (){
  var fio = $("#fullName").val();
  var doclad_name = $("#presentationTitle").val();
  var supervisor = $("#supervisor").val();
  var conferenceName = $("#conferenceName").val();
  var fieldConference = $("#fieldConference").val();
  var language = $("#language").val();
  var organizationName = $("#organizationName").val();
  var abstract = $("#abstract").val();
  var err = false;

  $("#abstract_err").text("");
  $("#language_err").text("");
  $("#fieldConference_err").text("");
  $("#conferenceName_err").text("");
  $("#doclad_name_err").text("");
  $("#organizationName_err").text("");
  $("#fullName_err").text("");
  $("#supervisor_err").text("");

  var pattern = /^[\wа-яА-Я]+ [\wа-яА-Я]+ [\wа-яА-Я]+$/;
  if(!fio.match(pattern)) {
    $("#fullName_err").text("Введите имя !");
    err = true;
  }

  if(organizationName == "") {
    $("#organizationName_err").text("Выберите");
    err = true;
  }

  var pattern = /^\w+$/;
  if(!doclad_name.match(pattern)) {
    $("#doclad_name_err").text("Введите название доклада !");
    err = true;
  }

  if(supervisor == "") {
    $("#supervisor_err").text("Выберите");
    err = true;
  }

  if(fieldConference == "") {
    $("#fieldConference_err").text("Выберите");
    err = true;
  }
  if(language == "") {
    $("#language_err").text("Выберите");
    err = true;
  }
  if(conferenceName == "") {
    $("#conferenceName_err").text("Выберите");
    err = true;
  }
  if(supervisor == "") {
    $("#supervisor_err").text("Выберите");
    err = true;
  }

  if(abstract == "") {
    $("#abstract_err").text("Выберите");
    err = true;
  }

  if(!err) {
    $(".zayavka_form").trigger("submit");
  }

});