jQuery(document).ready(function($){
  var form = $('#contact-form');
  var required= form.data('required');
  var error;

  /* Modal alert window */
  function alert_modal(data){
    $('.modal-body').html(data);
    $('#alert-modal').modal();
  }
  /* ---------- */

  /* Checking if empty and email validation */
    function checkInput() {
      
      form.find('.form-control-required').each(function () {
        var element = $(this);
        if (element.val() !="") {
          element.removeClass('invalide');
        } else {
          element.addClass('invalide').after('<div class="wrong-input">'+ required+ '</div>');
        }
      });      
     
      error = form.find('.invalide').length;
    }

  form.on("submit", function(e){ // когда будет подтверждена отправка контактной формы
    $('.wrong-input').remove();
    $('input').removeClass('invalide');

      e.preventDefault();
      var action = form.attr('action'); 
      checkInput();
      
      if (error == 0) {
        $this = $(this);
        $.ajax({ // обработчик событий
          type: "POST", // отправляет  данные на сервер
          dataType: "json",
          url: action, // в качетсве ссылки мы используем заданный в аттребуте action путь
          data: form.serialize(), // данные берем из формы, преобразовываем их в текст 
          beforeSend: function() {// данный обработчик будет вызван перед отправкой данного AJAX-запроса
            $('input[type=submit]').prop( 'disabled', true );
          },
          success: function(response){ // если все успешно обработано -             
            if (response.success==true){
              alert_modal(response.alert);
              form[0].reset(); // после закрытия окошка очищаем введенные данные
              
            } else {
              if (response.alert){
                alert_modal(response.alert);
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
            alert_modal(response.alert ); // выведем окно с сообщением
          },
          complete:function(){
            $('input[type=submit]').prop( 'disabled', false );
          }
        }); // end of ajax
      }
  }); // end of on.submit function
});
