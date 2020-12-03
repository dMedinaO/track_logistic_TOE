$(document).ready(function() {

  $('#start_pedido').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            pedidos: {
                validators: {
                    notEmpty: {
                        message: 'Debes ingresar los pedidos'
                    },
                    regexp: {
                        regexp: /^[0-9_]+$/,
                        message: 'Sólo números!'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {
      e.preventDefault();      
      var comuna = $("#start_pedido #comuna").val();
      var pedidos = $("#start_pedido #pedidos").val();
      var data_chofer = getQuerystring('chofer');
      $.ajax({
        method: "POST",
        url: "../php/reparto/create_reparto.php",
        data: {
          "comuna"   : comuna,
          "pedidos"   : pedidos,
          "data_chofer"   : data_chofer,
        }
      }).done( function( info ){
        var response = JSON.parse(info);

        var url_destine = "location.href='../?chofer="+data_chofer+"'";
        if (response.exec== "ERROR"){
          $('#errorResponse').show();
          setTimeout(url_destine, 5000);
        }else{
          $('#okResponse').show();

          setTimeout(url_destine, 5000);
        }
      });
  });
});

function getQuerystring(key) {
  var url_string = window.location;
  var url = new URL(url_string);
  var c = url.searchParams.get(key);
  return c;
}