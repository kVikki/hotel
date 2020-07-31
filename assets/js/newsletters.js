jQuery(document).ready(function($){
  var form = $('#newsletters');
  var input=$('#email_newsletters');
  console.log(input.val());
    

  form.on('submit', function(e){ // когда будет подтверждена отправка контактной формы
    $('.wrong-input').remove(); 
    $('.subscribed').remove(); 
     
    e.preventDefault();
    var action = form.attr('action');
      
    $.ajax({ // обработчик событий
      type: "POST", // отправляет  данные на сервер
      dataType: "json",
      url: action, // в качетсве ссылки мы используем заданный в аттребуте action путь
      data: input.serialize(), // данные берем из формы, преобразовываем их в текст 
      beforeSend: function() {// данный обработчик будет вызван перед отправкой данного AJAX-запроса
        $('input[type=submit]').prop( 'disabled', true );
      },
      success: function(response){ // если все успешно обработано -             
        if (response.success==true){
          input.after('<div class="subscribed">'+ response.alert+ '</div>');
          
          form[0].reset(); // после закрытия окошка очищаем введенные данные 
        
        } else {
          if (response.alert){
            alert(response.alert);
          } else {
            $.each(response.error, function (index, value) {
              $('input[name='+index+'],textarea[name='+index+']').after('<div class="wrong-input">'+ value+ '</div>');
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
        $('input[type=button]').prop( 'disabled', false );
      }
    }); // end of ajax
      
  }); // end of on.submit function
});
