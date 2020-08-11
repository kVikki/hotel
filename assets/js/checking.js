jQuery(document).ready(function($){  
  var form = $('#check');
  var error;
  console.log('available ' + $('#available').val());
  localStorage.clear();  

  /* Modal alert window */
  function alert_modal(data){
    $('.modal-body').html(data);
    $('#alert-modal').modal();
  }
  /* ---------- */



   

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

  form.on('submit', function(e) {
    $(".wrong-input").remove();
    $('input').removeClass('invalide');
   
    e.preventDefault();
    var action = form.attr('action');
    checkInput();    

    if (error == 0){ 
      $this = $(this);
      $.ajax({ // обработчик событий
        type: "POST", // отправляет  данные на сервер
        dataType: "json",
        url: action, // в качетсве ссылки мы используем заданный в аттребуте action путь
        data: $this.serialize(), // данные берем из формы, преобразовываем их в текст 
        beforeSend: function() {// данный обработчик будет вызван перед отправкой данного AJAX-запроса
          $('button[type=submit]').prop( 'disabled', true );
        },
        success: function(response){ // если все успешно обработано -             
          if (response.success==true){
            form[0].reset(); //  очищаем введенные данные 
            localStorage.setItem('alert', response.alert);
            $.each(response.data, function (index, value) {
              localStorage.setItem(index, value);
            }); 
            console.log( 'Alert_message ' + localStorage.getItem('alert'));
  

            window.location.href = response.url;
          } else {
              if (response.alert){
                alert_modal(response.alert);
                $('#alert-modal').on('hidden.bs.modal', function () { 
                  /* паразегрузка, чтобы рэндомное значение изменилось */
                  location.reload(true);
                  localStorage.clear();
                });
              }
              if (response.error){
                $.each(response.error, function (index, value) {
                  $('input[name='+index+']').addClass('invalide').after('<div class="wrong-input">'+ value+ '</div>');
                  console.log(response.error);
                });
                
              }
          }
          
        },
        error: function(request, txtstatus, errorThrown){ // если что-то пойдет не так
          console.log(request); // отображаем данные об ошибке в консоль
          console.log(txtstatus);
          console.log(errorThrown);

          alert_modal(response.error);
          
        },
        complete:function(){
          $('button[type=submit]').prop( 'disabled', false );         
        }
      }); // end of ajax
    } 
  });

  
  
}); 