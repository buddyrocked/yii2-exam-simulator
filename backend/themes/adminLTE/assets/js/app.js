$(document).ready(function(){
		

        $('#btn-add').click(function(e){
            var self = $(this);
            var container = self.attr('data-container');
            var ipt = self.attr('data-html');
            $(container).append($(ipt).html());
            e.preventDefault();
        });

        if($('#timer').length > 0){
	        $('#timer-question').timer({
			    countdown: true,
			    duration: $('#timer-question').attr('data-timer'),    // This will start the countdown from 3 mins 40 seconds
				format: '%H:%M:%S',
				callback: function(){
					$('#form-question').submit();
				},
				repeat: false
			});

	        if($('#timer-question').attr('data-timer') == '0h00m00s'){
	        	$('#timer-question').timer('pause');
	        }
	    }
	    
	    if($('#event-pop').length > 0){
	    	var self = $('#event-pop');
        	var url = self.attr('href');
        	var title = self.attr('title');
        	$.ajax({
		    	type: "GET",
		    	url: url,
		    	beforeSend:function(){
		    		
		    	}
		    })
		    .done(function( data ) {
		    	$('.modal-body').html(data);
		    	$('.modal-title').text(title)    	
        		$('#myModal').modal('show');
        	});
	    }
		

        $('#clear-answer').click(function(e){
        	$('input[type="radio"]').attr('checked', false);
        	e.preventDefault();
        });

        $('.btn-msg').click(function(e){
        	$.msg({ autoUnblock : false, clickUnblock : false });
        	e.preventDefault();
        });

        $('.btn-toggle').click(function(e){
        	$('.hiddenx').toggle('slow');

		  	e.preventDefault();
        });

        $('.form-ajax').on('beforeSubmit', function(event, jqXHR, settings) {
            var form = $(this);
            if(form.find('.has-error').length) {
            	return false;
            }else if($('.checkbox-answer:checked').length == 0){
            	alert('Please set right options first');
            	return false;
            }else{
        		//$.msg({ autoUnblock : false, clickUnblock : false });
            }

            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: form.serialize(),
                success: function(data) {
                        console.log(data);
                        alert(data.message);
                        $('.checkbox-answer').prop('checked', false);
                        $('.form-control').val('');
                        $('.form-control').select2('val', '');
                        $('#question-question').redactor('code.set', '');
                        $('#question-explaination').redactor('code.set', '');
                        $('#question-level').select2('val', '');
                        //$.msg('unblock',0,1);
                        $.pjax.defaults.timeout = false;
                        //$.pjax.reload({container:'#pjax-form-question', async:false});
                        $.pjax.reload({container:'#grid-question'});
                        
                }
            });

            return false;
	    });

        if($('.parallax').length > 0){
        	$('.parallax').parallax("20%", 0.1);
        };

        $('#nav-section').onePageNav({
		    filter: ':not(.external)'
		});
        if($('.first-content').length > 0){
	        jQuery(window).bind('scroll', function (){
	            if(jQuery(window).length > 0 ){

	                var scrollBody = jQuery(window).scrollTop();
	                
	                if (scrollBody > jQuery('.first-content').offset().top) {
	                	console.log(scrollBody + ' > ' + jQuery('.first-content').offset().top);
	                    jQuery('.navbar-custom-login').addClass('active');
	                } else {
	                	console.log(scrollBody + ' < ' + jQuery('.first-content').offset().top);
	                    jQuery('.navbar-custom-login').removeClass('active');
	                }
	            }
	        });
    	}

        $('.grid').masonry({
		  // options
		  itemSelector: '.grid-item',
		  columnWidth: 250
		});

        $('.newsticker').each(function(i, e){
        	
        	$(this).newsTicker({
			    row_height: 80,
			    max_rows: 5,
			    duration: 4000,
			    prevButton: $('#nt-prev-'+i),
			    nextButton: $('#nt-next-'+i)
			});
        });

        var updateInfos = function(){

        }

        $('.newsticker-quotes').each(function(i, e){
        	
        	$(this).newsTicker({
        		autostart: 1,
			    row_height: 350,
			    max_rows: 1,
			    //hasMoved: updateInfos,
			    duration: 120000,
			    prevButton: $('#nt-prev-quotes'),
			    nextButton: $('#nt-next-quotes')
			});
        });

        

        $('.btn-modal').click(function(e){



        	var self = $(this);
        	var url = self.attr('href');
        	var title = self.attr('title');
        	$.ajax({
		    	type: "GET",
		    	url: url,
		    	beforeSend:function(){
		    		
		    	}
		    })
		    .done(function( data ) {		
		    	$('.modal-body').html(data);
		    	$('.modal-title').text(title)    	
        		$('#myModal').modal('show');

        		$('.hours').on('keyup', function() {
				    var sum = 0;
				    $(".hours").each(function(i,o){
				        
				        total = parseInt($(this).val());
				        if(!isNaN(total) /*&& total.length!=0**/) {
				            
				            sum += total;
				        }
				    });
				    $("#total").val(sum);
				});	

				$('#task-finish').on('keyup', function(e){
					if($(this).val() < $('#task-start').val()){
						alert('Finish time is not valid');
						$('#task-finish').val($('#task-start').val());
					}

					var hours = parseInt($("#task-finish").val().split(':')[0], 10) - parseInt($("#task-start").val().split(':')[0], 10);
				
					$('#task-hour').val(hours);

					e.preventDefault();

					return false;
				});

				$('#task-start').on('keyup', function(e){
					$('#task-finish').val($('#task-start').val());

					e.preventDefault();
					return false;
				});



				$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
				   	$('.hours').on('keyup', function() {
					    var sum = 0;
					    $(".hours").each(function(i,o){
					        
					        total = parseInt($(this).val());
					        if(!isNaN(total) /*&& total.length!=0**/) {		            
					            sum += total;
					        }
					    });
					    $("#total").val(sum);
					});	
				});	

				$('.btn-progress').click(function(){
		        	Pace.restart();
		        });

		        
				var jml = $('.item2').length;
		        $('.add-item2').on('click', function(e){
		        	var jml = $('.item2').length;
		        	
		        	var self = $(this);
		        	var container = $('#content-form').html();
		        	
		        	
		        	var content = $.parseHTML('<tr class="item2 removeAble">' + container + '</tr>');
		        	$('.container-items2').append(content);

		        	jml = jml + 1;

		        	       	     	

		        	$('.remove-item2').each(function(index, value){
		        		$(this).on('click', function(e){			        		
			        		$(this).parent().parent().remove();			        				        		
			        	});
		        	});

				    e.preventDefault();
		        });

		        
	        	$('.form-ajax-modal').on('beforeSubmit', function(event, jqXHR, settings) {
	        		
		            var form = $(this);
		            if(form.find('.has-error').length) {
		            	return false;
		            }else{
		        		$.msg({ autoUnblock : false, clickUnblock : false, z:5000 });
		            }

		            $.ajax({
		                url: form.attr('action'),
		                type: 'post',
		                data: form.serialize(),
		                success: function(data) {
		                        console.log(data);
		                        $('#myModal').modal('hide');
		                        alert(data.message);
		                        $.msg('unblock',0,1);
		                        $.pjax.defaults.timeout = false;
		                        $.pjax.reload({container:'#pjax-passage'});
		                }
		            });

		            return false;
			    });

			    $('.form-ajax-modal2').on('beforeSubmit', function(event, jqXHR, settings) {
	        		
		            var form = $(this);
		            if(form.find('.has-error').length) {
		            	return false;
		            }else{
		        		$.msg({ autoUnblock : false, clickUnblock : false, z:5000 });
		            }

		            $.ajax({
		                url: form.attr('action'),
		                type: 'post',
		                data: form.serialize(),
		                success: function(data) {
		                        console.log(data);
		                        $('#myModal').modal('hide');
		                        alert(data.message);
		                        $.msg('unblock',0,1);
		                        $.pjax.defaults.timeout = false;
		                        $.pjax.reload({container:'#pjax-source'});
		                }
		            });

		            return false;
			    });
		    })
		    .fail(function() {
		    	alert( "error occured" );
		    });



		    e.preventDefault();
        });

        $(".progress-bar").each(function(i, e){
        	//alert($(this).attr('data-value'));
    		$(this).animate({
	    		width: parseInt($(this).attr('data-value')) + "%"
			}, 2500);
		});

		$('.hours').on('keyup', function() {
		    var sum = 0;
		    $(".hours").each(function(i,o){
		        
		        total = parseInt($(this).val());
		        if(!isNaN(total) /*&& total.length!=0**/) {
		            
		            sum += total;
		        }
		    });
		    $("#total").val(sum);
		});	

		$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
		   	$('.hours').on('keyup', function() {
			    var sum = 0;
			    $(".hours").each(function(i,o){
			        
			        total = parseInt($(this).val());
			        if(!isNaN(total) /*&& total.length!=0**/) {		            
			            sum += total;
			        }
			    });
			    $("#total").val(sum);
			});	
		});	


		$('.budgets').on('keydown', function() {
		    var sum = 0;
		    $(".budgets").each(function(i,o){
		        
		        total = parseInt($(this).val());
		        if(!isNaN(total) /*&& total.length!=0**/) {
		        	var mode = $(this).attr('data-mode');
		        	if(mode == 'tambah'){
		            	sum += total;
		        	}else{
		        		sum -= total;
		        	}

		        }
		    });
		    $('#project-gross_profit-disp').maskMoney('mask', sum);
		    $("#project-gross_profit").maskMoney('mask', sum);
		});	

		var jml = $('.item2').length;
        $('.add-item2').on('click', function(e){
        	var jml = $('.item2').length;
        	
        	var self = $(this);
        	var container = $('#content-form').html();
        	
        	
        	var content = $.parseHTML('<tr class="item2 removeAble">' + container + '</tr>');
        	$('.container-items2').append(content);

        	/*$('.datepicker').datepicker({
        		format:'yyyy-mm-dd'
        	});*/

        	jml = jml + 1;

        	       	     	

        	$('.remove-item2').each(function(index, value){
        		$(this).on('click', function(e){			        		
	        		$(this).parent().parent().remove();			        				        		
	        	});
        	});

		    e.preventDefault();
        });


});

function removeTR(){
	console.log($(this));
}

function initialize() {
	var latlng = new google.maps.LatLng(-6.272198, 106.724870);
    var settings = {
        zoom: 15,
        center: latlng,
        mapTypeControl: true,
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
        navigationControl: true,
        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map-rialachas"), settings);

    var companyPos = new google.maps.LatLng(-6.272198,106.724870);
    var companyMarker = new google.maps.Marker({
        position: companyPos,
        map: map,
        title:"Bintaro Office: \n PT Rialachas \n Jalan Cut Mutia 1 FG-2 No. 42A Bintaro Sektor 7 \n Tangerang Selatan, Indonesia"
    });

    var contentString = '<div class="hexagon-logo" id=""><div class="hexagon-icon"><span class="fa-stack fa-lg font-map"><i class="fa fa-circle fa-stack-2x black"></i><i class="fa fa-home fa-stack-1x fa-inverse"></i></span></div></div><div class="center bold">PT Rialachas Office</div>';
     
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    google.maps.event.addListener(companyMarker, 'click', function() {
      infowindow.open(map,companyMarker);
    });
}

$(document).ready(function(){
	if($('#map-rialachas').length > 0){
		initialize();
	}
});

function getTimeRemaining(endtime){
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor( (t/1000) % 60 );
  var minutes = Math.floor( (t/1000/60) % 60 );
  var hours = Math.floor( (t/(1000*60*60)) % 24 );
  var days = Math.floor( t/(1000*60*60*24) );
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime){
	var clock = document.getElementById(id);
	var daysSpan = clock.querySelector('.days');
	var hoursSpan = clock.querySelector('.hours');
	var minutesSpan = clock.querySelector('.minutes');
	var secondsSpan = clock.querySelector('.seconds');

	function updateClock(){
		var t = getTimeRemaining(endtime);

		daysSpan.innerHTML = t.days;
		hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
		minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
		secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

		if(t.total<=0){
		  clearInterval(timeinterval);
		}
	}

	updateClock();
	var timeinterval = setInterval(updateClock,1000);
}

if($('#clockdiv').length > 0){
	var deadline = $('#clockdiv').attr('data-time');
	initializeClock('clockdiv', deadline);
}


