jQuery(document).ready(function($){
  var form = $('#check');
  var error;

  /* Checking if empty */
  function checkInput() {
    form.find('.form-control-required').each(function () {
      var element = $(this);
      if (element.val() !="") {
        element.removeClass('invalide');
      } else {
        element.addClass('invalide');
      }
    });

    error = form.find('.invalide').length;
  }


  form.on("submit", function(e){ // когда будет подтверждена отправка контактной формы
    $('input').removeClass('invalide');
    $('.wrong-input').remove();
    e.preventDefault();// предотвращаем поведение браузера по умолчанию
    var action = form.attr('action');
    checkInput();
    
    if (error == 0){ 
      $this = $(this);
      $.ajax({ // обработчик событий
				type: 'POST', // отправляет  данные на сервер
				url: action, // в качетсве ссылки мы используем заданный в аттребуте action путь
        dataType: "json",
        data: $this.serialize(), // данные берем из формы, преобразовываем их в текст 
        beforeSend: function() {// данный обработчик будет вызван перед отправкой данного AJAX-запроса
          $('button[type=submit]').prop( 'disabled', true );
        },
        success: function(response){ // если все успешно обработано -
          if (response.success==true){
            alert(response.alert); //  выводим сообщение в виде окошка
            form[0].reset(); // после закрытия окошка очищаем введенные данные
          } else {
            if (response.alert){
              alert(response.alert);
            } else {
              $.each(response.error, function (index, value) {
                $('input[name='+index+'],textarea[name='+index+']').addClass('invalide').after('<div class="wrong-input">'+ value+ '</div>');
                console.log(response.error);
              });
            }
          }
        },
        error: function(request, txtstatus, errorThrown){ // если что-то пойдет не так
          console.log(request); // отображаем данные об ошибке в консоль
          console.log(txtstatus);
          console.log(errorThrown);
          alert(response.alert ); // выведем окно с сообщением
        },
        complete:function(){
          $('button[type=submit]').prop( 'disabled', false );
        }

      }); // end of ajax
    } 
  }); // end of on.submit function
});