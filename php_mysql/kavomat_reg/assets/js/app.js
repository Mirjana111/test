$(document).ready(function() {

	var pathname = $(location).attr('pathname');
	$('#spark-navbar-collapse li').each(function(){
		var href = '/PHP/php_mysql/kavomat_reg/' + $('a', this).attr('href');
		if(pathname == href){
			$(this).addClass('active');
		}
	});

  $('#login').bind('click',function(e){
    e.preventDefault();
    var email = $('#email').val();
	var pass = $('#pass').val();
    var repeat_pass = $('#repeat_pass').val();
    var remember = $('#remember').is(':checked');
    var token = $('#csrf').val();
    var data = 'email='+email+'&pass='+pass+'&repeat_pass='+ponovljena lozinka+'remember='+remember+'&csrf='+token;

    $('.email, .pass').removeClass('has-error');
    $('.email .help-block, .pass .help-block').remove();
    $('.alert-danger').remove();

    $.ajax({
      type: "POST",
      url: "include/registration.php",
      data: data,
      success: function(result){
        if(result == 1){
          window.location.replace("dashboard.php");
        }
        else{
          err_msg = JSON.parse(result);
          if(err_msg.token){
            $('#loginModal .modal-body').prepend('<div class="alert alert-danger" role="alert"><strong>'+err_msg.token+'</strong></div>');
          }
          if(err_msg.wEmail){
            $('.email').addClass('has-error');
            $('.email').append('<span class="help-block"><strong>'+err_msg.wEmail+'</strong></span>');
          }
          if(err_msg.nEmail){
            $('.email').addClass('has-error');
            $('.email').append('<span class="help-block"><strong>'+err_msg.nEmail+'</strong></span>');
          }
          if(err_msg.nPass){
            $('.pass').addClass('has-error');
            $('.pass').append('<span class="help-block"><strong>'+err_msg.nPass+'</strong></span>');
          }
          if(err_msg.wPass){
            $('.pass').addClass('has-error');
            $('.pass').append('<span class="help-block"><strong>'+err_msg.wPass+'</strong></span>');
          }
		  
        }
      }
    });
  });

  $('a[data-target="#loginModal"]').bind('click',function(e){
    e.preventDefault();
    $('.email, .pass').removeClass('has-error');
    $('.email .help-block, .pass .help-block').remove();
    $('.alert-danger').remove();
  });

  $('#add').bind('click',function(e){
    e.preventDefault();
    var name = $('#naziv_kavomata').val();
    var location = $('#location').val();

    var data = 'name='+name+'&location='+location;

    $('.name, .location').removeClass('has-error');
    $('.name .help-block, .location .help-block').remove();

    $.ajax({
      type: "POST",
      url: "include/coffee-machines/add.php",
      data: data,
      success: function(result){
        if(result == 1){
          window.location.replace("coffee-machines.php");
        }
        else{
          err_msg = JSON.parse(result);
          if(err_msg.nName){
            $('.name').addClass('has-error');
            $('.name').append('<span class="help-block"><strong>'+err_msg.nName+'</strong></span>');
          }
          if(err_msg.nLocation){
            $('.location').addClass('has-error');
            $('.location').append('<span class="help-block"><strong>'+err_msg.nLocation+'</strong></span>');
          }
        }
      }
    });
  });

  $('a[data-target="#addModal"]').bind('click',function(e){
    e.preventDefault();
    $('.name, .location').removeClass('has-error');
    $('.name .help-block, .location .help-block').remove();
  });

  $('.edit-u').each(function(){
	$('#edit',this).bind('click',function(e){
		e.preventDefault();
		var parent = $(this).parent().parent();
		var name = $('#naziv_kavomata-u',parent).val();
		var location = $('#location-u',parent).val();
		var id = $('#id_automat',parent).val();

		var data = 'name='+name+'&location='+location+'&id='+id;

		$('.name, .location').removeClass('has-error');
		$('.name .help-block, .location .help-block').remove();

		$.ajax({
		  type: "POST",
		  url: "include/coffee-machines/edit.php",
		  data: data,
		  success: function(result){
			if(result == 1){
			  window.location.replace("coffee-machines.php");
			}
			else{
			  err_msg = JSON.parse(result);
			  if(err_msg.nName){
				$('.name').addClass('has-error');
				$('.name').append('<span class="help-block"><strong>'+err_msg.nName+'</strong></span>');
			  }
			}
		  }
		});
	});
  });

  $('.edit').each(function(){
	$(this).bind('click',function(e){
		e.preventDefault();
		$('.name, .location').removeClass('has-error');
		$('.name .help-block, .location .help-block').remove();
	});
  });

  $('#add-coffee').bind('click',function(e){
    e.preventDefault();
	var name = $('#automat').val();
    var id = $('#automat_id').val();
    var coffee = $('#coffee').val();

    var data = 'id='+id+'&coffee='+coffee;

    $('.coffee').removeClass('has-error');
    $('.coffee .help-block').remove();

    $.ajax({
      type: "POST",
      url: "include/coffee-machines/add-coffee.php",
      data: data,
      success: function(result){
        if(result == 1){
          window.location.replace("coffee-machines.php?id="+id+"&automat="+name);
        }
        else{
          err_msg = JSON.parse(result);
          if(err_msg.nCoffee){
            $('.coffee').addClass('has-error');
            $('.coffee').append('<span class="help-block"><strong>'+err_msg.nCoffee+'</strong></span>');
          }
        }
      }
    });
  });

  $('#check').bind('click',function(e){
	e.preventDefault();
	$('.delete-box').prop('checked',true);
	$(this).hide();
	$('#uncheck').show();

  });
  $('#uncheck').bind('click',function(e){
	e.preventDefault();
	$('.delete-box').prop('checked',false);
	$(this).hide();
	$('#check').show();
  });

  $('#delete-all').bind('click',function(e){
	e.preventDefault();
	var name = $('#automat').val();
    var automat_id = $('#automat_id').val();
    var coffee_id = new Array();

	$('.panel-footer .help-block').remove();

	$('.delete-box').each(function(){
		if($(this).is(':checked')){
			coffee_id.push($(this).val());
		}
	});

	var data = 'automat_id='+automat_id+'&coffee_id='+coffee_id;

	$.ajax({
      type: "POST",
      url: "include/coffee-machines/delete-all-coffee.php",
      data: data,
      success: function(result){
        if(result == 1){
          window.location.replace("coffee-machines.php?id="+automat_id+"&automat="+name);
        }
        else{
          err_msg = JSON.parse(result);
          if(err_msg.nCoffee){
            $('.panel-footer').append('<span class="help-block" style="float:right;"><strong>'+err_msg.nCoffee+'</strong></span>');
          }
        }
      }
    });

  });

  // Coffee script
	$('#add_coffee').bind('click',function(e){
    e.preventDefault();
    var name = $('#naziv_kave').val();
    var price = $('#cijena_kave').val();

    var data = 'name='+name+'&price='+price;

    $('.name, .cijena').removeClass('has-error');
    $('.name .help-block, .cijena .help-block').remove();

    $.ajax({
      type: "POST",
      url: "include/coffee/add.php",
      data: data,
      success: function(result){
        if(result == 1){
          window.location.replace("coffee.php");
        }
        else{
          err_msg = JSON.parse(result);
          if(err_msg.nName){
            $('.name').addClass('has-error');
            $('.name').append('<span class="help-block"><strong>'+err_msg.nName+'</strong></span>');
          }
          if(err_msg.nPrice){
            $('.cijena').addClass('has-error');
            $('.cijena').append('<span class="help-block"><strong>'+err_msg.nPrice+'</strong></span>');
          }
        }
      }
    });
  });

  $('a[data-target="#addModal"]').bind('click',function(e){
    e.preventDefault();
    $('.name, .cijena').removeClass('has-error');
    $('.name .help-block, .cijena .help-block').remove();
  });

	$('.edit-u').each(function(){
	$('#edit',this).bind('click',function(e){
		e.preventDefault();
		var parent = $(this).parent().parent();
		var name = $('#naziv_kave-u',parent).val();
		var price = $('#cijena_kave-u',parent).val();
		var id = $('#id_kava',parent).val();

		var data = 'name='+name+'&price='+price+'&id='+id;

		$('.name, .cijena').removeClass('has-error');
		$('.name .help-block, .cijena .help-block').remove();

		$.ajax({
		  type: "POST",
		  url: "include/coffee/edit.php",
		  data: data,
		  success: function(result){
			if(result == 1){
			  window.location.replace("coffee.php");
			}
		  }
		});
	});
  });

  $('.edit').each(function(){
	$(this).bind('click',function(e){
		e.preventDefault();
		$('.name, .cijena').removeClass('has-error');
		$('.name .help-block, .cijena .help-block').remove();
	});
  });

});
