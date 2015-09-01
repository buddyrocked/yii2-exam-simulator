$(document).ready(function(){
        $('#btn-add').click(function(e){
            var self = $(this);
            var container = self.attr('data-container');
            var ipt = self.attr('data-html');
            $(container).append($(ipt).html());
            e.preventDefault();
        });	

        $('.parallax').parallax("20%", 0.1);

        $('#nav-section').onePageNav({
		    filter: ':not(.external)'
		});

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

        	$('.datepicker').datepicker({
        		format:'yyyy-mm-dd'
        	});

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
