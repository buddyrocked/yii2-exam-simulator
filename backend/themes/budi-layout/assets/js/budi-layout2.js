define(["jquery", "jqueryui", "swall", "imagesloaded", "selectpicker", "bootstrapSwitch", "nprogress",  "moment", "serial", "pie", "mCustomScrollbar", "knob", "summernote"], function($, jqueryui, swall, imagesLoaded, selectpicker, bootstrapSwitch, NProgress, moment, AmChartsSerial, AmChartsPie, mCustomScrollbar, knob, summernote) {
	
	//$('.alert').addClass('active');
	//setTimeout(function(){$('.alert').fadeOut('slow'); }, 5000);
	
	$('a.menu-item.active').parent().parent().closest('.list-group-item').addClass('active').addClass('active-menu');
	$('a.menu-item.active').parent().closest('.sub-group').show();


	//SHOW HIDE SIDEBAR
	NProgress.configure({ easing: 'ease', speed: 5000 });
	NProgress.start();
	

	$(document).ajaxStart(function(){
		NProgress.start();
	});

	$(document).ajaxStop(function(){
		NProgress.done();
	});

	$('[data-toggle=offcanvas]').click(function() {		
		$('#sidebar').toggleClass('wide');
		$('.content').toggleClass('wide');
		if($('#sidebar').hasClass('wide')){
			localStorage.setItem('wide', 1);
		} else{
			localStorage.setItem('wide', 0);
		}

	});
	
	if(localStorage.getItem('wide') == 1){
		$('#sidebar').toggleClass('wide');
		$('.content').toggleClass('wide');
	}else{
		$('#sidebar').removeClass('wide');
		$('.content').removeClass('wide');
	}

	

	

	//OPEN PANEL SHORTCUT
	$('.open-notif').click(function(e){
		var elm = $('.notif-container');
		elm.toggleClass('active');
		$(this).toggleClass('active');
		$('.open-notif').not(this).each(function(e){
			$(this).removeClass('active');
		});
		$('.content').toggleClass('active2');
		e.preventDefault();
	});

	//MULTIPLE IMAGE
	$('#btn-add-image').on('click', function(e){
		var html = $('#input-image').html();
		$('#images').append(html);

		$('.btn-file :file').change(function(e){
			var self = $(this);
			self.parent().parent().next().val(self.val().replace(/\\/g, '/').replace(/.*\//, ''));
		});

		$('.btn-remove-image:not(:first)').on('click', function(e){
			$(this).parent().parent().parent().remove();
		});

		e.preventDefault();
	});

	$('.btn-file :file').change(function(e){
		var self = $(this);
		self.parent().parent().next().val(self.val().replace(/\\/g, '/').replace(/.*\//, ''));
	}); 

	//SWEET ALERT
	$('.btn-confirm').click(function(e){
		var self = $(this);
		swal({
			title:'Are You Sure',
			text:'You will not be able to recover this data!',
			type:'warning',
			showCancelButton:true,
			confirmButtonCollor:'#0AA699',
			confirmButtonText:'Yes, delete it!',
			cancelButtonText:'No, cancel please!',
			closeOnConfirm:false,
			closeOnCancel:false
		},
		function(isConfirm){
			if(isConfirm){
				swal('Deleted!', 'Data has been deleted', 'success');
				window.location = self.find('a').attr('href');
			}else{
				swal('Canceled', 'Data has safe', 'error');				
			}
		});
		e.preventDefault();
	});

	//SWEET ALERT
	$('.btn-delete').click(function(e){
		var self = $(this);
		swal({
			title:'Are You Sure',
			text:'You will not be able to recover this data!',
			type:'warning',
			showCancelButton:true,
			confirmButtonCollor:'#0AA699',
			confirmButtonText:'Yes, delete it!',
			cancelButtonText:'No, cancel please!',
			closeOnConfirm:false,
			closeOnCancel:false
		},
		function(isConfirm){
			if(isConfirm){
				swal('Deleted!', 'Data has been deleted', 'success');
				self.closest('.form-delete').submit();
			}else{
				swal('Canceled', 'Data has safe', 'error');				
			}
		});
		e.preventDefault();
	});

	$('.btn-delete-ajax').click(function(e){
		var self = $(this);
		swal({
			title:'Are You Sure',
			text:'You will not be able to recover this data!',
			type:'warning',
			showCancelButton:true,
			confirmButtonCollor:'#0AA699',
			confirmButtonText:'Yes, delete it!',
			cancelButtonText:'No, cancel please!',
			closeOnConfirm:false,
			closeOnCancel:false
		},
		function(isConfirm){
			if(isConfirm){
				swal('Deleted!', 'Data has been deleted', 'success');
				self.parentsUntil('.thumb-container').parent().remove();
			}else{
				swal('Canceled', 'Data has safe', 'error');				
			}
		});
		e.preventDefault();
	});

	

	//TAGS INPUT
	/*$('#tags').tagsInput({
		autocomplete_url:url_tag
	});*/

	
	loadJSON = function(url) {
		if (window.XMLHttpRequest) {
			var request = new XMLHttpRequest();
		} else {
			var request = new ActiveXObject('Microsoft.XMLHTTP');
		}
		request.open('GET', url, false);
		request.send();
		return eval(request.responseText);
	};

	function buildChart(data, element, text, labelCategory, font_color){
		if($('#'+element).length > 0){
			var chartPI = AmChartsSerial.makeChart(element, {
			    "type": "serial",
			    "theme": "none",
			    "pathToImages":baseUrl + "/assets/vendor/amcharts/images/",

			    "dataProvider": data,
			    "valueAxes": [{
			        "axisAlpha": 0,
			        "position": "left",
			        "title": text
			    }],
			    "startDuration": 1,
			    "graphs": [
						    {
						        "balloonText": "<b>[[category]]: [[value]]</b>",
						        "colorField": "color",
						        "fillAlphas": 0.9,
						        "lineAlpha": 0.2,
						        "type": "column",
						        "valueField": "value"
						    },
						    {
					            "id":"graph2",
					            "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
					            "bullet": "round",
					            "lineThickness": 3,
								"bulletSize": 7,
								"bulletBorderAlpha": 1,
								"bulletColor": "#FFFFFF",
								"useLineColorForBulletBorder": true,
								"bulletBorderThickness": 3,
								"fillAlphas": 0,
								"lineAlpha": 1,
					            "title": labelCategory,
					            "valueField": "value",
					            "useNegativeColorIfDown":true,
					            "negativeLineColor": "#1ABC9C",
					        }
			    ],
			    "chartCursor": {
			        "categoryBalloonEnabled": false,
			        "cursorAlpha": 0,
			        "zoomable": false
			    },
			    "categoryField": "key",
			    "categoryAxis": {
			        "gridPosition": "start",
			        "labelRotation": 45,
			        "axisAlpha": 0,
		    		"gridAlpha": 0,
			    },
			    "amExport":{},
			    "color":font_color,
			    "fontSize":9
			});
		}
	}

	function buildChartDonut(data, element){
		if($('#'+element).length > 0){
			var chart = AmChartsPie.makeChart(element, {
			    "type": "pie",
			    "theme": "none",
			    /*"legend": {
			        "markerType": "square",
			        "position": "right",
					//"marginRight": 80,		
					"autoMargins": false
			    },*/
			    "dataProvider": data,
			    "titleField": "key",
			    "valueField": "value",
			    "labelRadius": 5,
			    "colors": ['#1abc9c', '#2ecc71', '#3498db', '#9b59b6', '#34495e', '#16a085', '#27ae60', '#2980b9', '#2980b9', '#8e44ad', '#2c3e50', '#f1c40f', '#e67e22', '#e74c3c', '#ecf0f1', '#95a5a6', '#f39c12', '#d35400', '#c0392b', '#bdc3c7', '#7f8c8d'],
			    "radius": "42%",
			    "innerRadius": "60%",
			    "labelText": "[[title]]",
			    "colorField": "colors"
			});
		}
	}

	function renderData(data, element, textClass, compare){
		if($('#'+element).length > 0){
			textClass = typeof textClass !== 'undefined' ? textClass : 'text-big';
			compare = typeof compare !== 'undefined' ? true : false;
			var html = '';
			$.each(data, function(){
				var divC = '';
				var icon = '';
				if(compare == true){				
					if(this.compare > this.value){
						icon = '<td class="col-md-1"><span><div><i class="fa fa-chevron-up"></i></div><div><i class="fa fa-chevron-down"></i></div></span></td>';
					}else{
						icon = '<td class="col-md-1"><span><div><i class="fa fa-chevron-up text-primary"></i></div><div><i class="fa fa-chevron-down"></i></div></span></td>';
					}
					var divC = '<div>before : ' + this.compare + '</div>';
				}
				html += '<tr>' + icon + '<td><span class="bold">' + this.key + '</span>' + divC + '</td><td class="col-md-4 bold text-primary ' + textClass + ' right">' + this.value  + ' </td></tr>'; 
			});
			$('#'+element).html(html);
		}
	}

	loadData = function(url, params) {
		if (window.XMLHttpRequest) {
			var request = new XMLHttpRequest();
		} else {
			var request = new ActiveXObject('Microsoft.XMLHTTP');
		}
		request.open('POST', url, false);
		request.setRequestHeader("Content-type", "application/json");
		//request.setRequestHeader("Content-length", params.length);
		//request.setRequestHeader("Connection", "close");
		request.send(params);
		return JSON.parse(request.responseText);
	};

	function chartGoogle(data, element, text, labelCategory, font_color, type){
		type = typeof type !== 'undefined' ? type : 'bar';

		if(type == 'bar'){
			var graph = [{
					        "balloonText": "<b>[[category]]: [[value]]</b>",
					        "colorField": "color",
					        "fillAlphas": 0.9,
					        "lineAlpha": 0.2,
					        "type": "column",
					        "valueField": "value"
					    }];
		}else if(type == 'line'){
			var graph = [{
				            "id":"graph2",
				            "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
				            "bullet": "round",
				            "lineThickness": 3,
							"bulletSize": 7,
							"bulletBorderAlpha": 1,
							"bulletColor": "#FFFFFF",
							"useLineColorForBulletBorder": true,
							"bulletBorderThickness": 3,
							"fillAlphas": 0,
							"lineAlpha": 1,
				            "title": labelCategory,
				            "valueField": "value",
				            //"useNegativeColorIfDown":true,
				            //"negativeLineColor": "#1ABC9C",
				        }]
		}else{
			var graph = [{
					        "balloonText": "<b>[[category]]: [[value]]</b>",
					        "colorField": "color",
					        "fillAlphas": 0.9,
					        "lineAlpha": 0.2,
					        "type": "column",
					        "valueField": "value"
					    },
					    {
				            "id":"graph2",
				            "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
				            "bullet": "round",
				            "lineThickness": 3,
							"bulletSize": 7,
							"bulletBorderAlpha": 1,
							"bulletColor": "#FFFFFF",
							"useLineColorForBulletBorder": true,
							"bulletBorderThickness": 3,
							"fillAlphas": 0,
							"lineAlpha": 1,
				            "title": labelCategory,
				            "valueField": "value",
				            //"useNegativeColorIfDown":true,
				            //"negativeLineColor": "#1ABC9C",
				        }];
		}

		var chartPI = AmChartsSerial.makeChart(element, {
		    "type": "serial",
		    "theme": "none",
		    "pathToImages":baseUrl + "/assets/vendor/amcharts/images/",

		    "dataProvider": data,
		    "valueAxes": [{
		        "axisAlpha": 0,
		        "position": "left",
		        "title": text,
		        "baseValue":0
		    }],
		    "startDuration": 1,
		    "graphs": graph,
		    "chartCursor": {
		        "categoryBalloonEnabled": false,
		        "cursorAlpha": 0,
		        "zoomable": false
		    },
		    "categoryField": "key",
		    "categoryAxis": {
		        "gridPosition": "start",
		        "labelRotation": 45,
		        "axisAlpha": 0,
	    		"gridAlpha": 0,
		    },
		    "amExport":{},
		    "color":font_color,
		    "fontSize":9
		});
	}

	function buildChartGoogle(url, params, element, text, labelCategory, font_color, displayList, textClass, compare){
		if($('#'+element).length > 0 || $('#'+displayList).length > 0){
			$.ajax({
		    	type: "POST",
		    	url: url,
		    	dataType:'json',
		    	data:params,
		    	beforeSend:function(){
		    		if(element != "" && $('#'+element).length > 0){
		    			$('#'+element).html('<div class="center">load data ... </div>');	
		    		}
			    	
			    	if(displayList !== false && $('#'+displayList).length > 0){
			    		$('#'+displayList).html('<div class="center">load data ...</div>');
			    	}
		    	}

		    })
		    .done(function( data ) {
		    	if(data.status == 0){
		    		$('#'+element).html('<div class="center">' + data.message + '</div>');
		    	
		    		$('#'+element).append('<div class="center"><a href="/google" class="btn btn-default-full">login google account</a></div>');	
		    		
		    		
		    	}else{
		    		if(element != "" && $('#'+element).length > 0){
		    			chartGoogle(data, element, text, labelCategory, font_color);	
		    		}
			    	
			    	if(displayList !== false && $('#'+displayList).length > 0){
			    		renderData(data, displayList, textClass, compare);	
			    	}
		    	}
		    })
		    .fail(function() {
		    	//alert( "error occured" );
		    });
		}
	}

	

	function buildKnob(elm, color, data, elmNum){
  		var perc = data.value;
		elm.knob({                 
		    'dynamicDraw': true
		});

		if($('#'+elmNum+'-icon').length > 0){
			if(data.value > data.compare){						
				$('#'+elmNum+'-icon').html('<i class="fa fa-arrow-circle-o-up text-primary"></i>');
			}else{
				$('#'+elmNum+'-icon').html('<i class="fa fa-arrow-circle-o-down"></i>');
			}
		}

		$({value: 0}).animate({ value: perc }, {
			duration: 3000,
			easing: 'swing',
			progress: function () {                  
				elm.val(Math.ceil(this.value)).trigger('change');
				if($('#'+elmNum).length > 0){
					$('#'+elmNum).text(Math.ceil(this.value));
				}
			}
		});
  	}


	$('.knob').each(function () { 
		var elm = $(this);
		var color = elm.attr("data-fgColor");  
		var perc = elm.attr("value");  
		var elmNum = elm.attr("data-number");
		var url = elm.attr("data-url");
		var params = $.parseJSON(elm.attr("data-params"));

		

		$.ajax({
	    	type: "POST",
	    	url: url,
	    	dataType:'json',
	    	data:params,
	    	beforeSend:function(){
	    		
	    	}
	    })
	    .done(function( data ) {
	    	console.log(data);
	    	if(data.status == 0){
		    	alert(data.message);
		    }else{
		    	elm.val(data.value);
		    	elm.attr('data-max', data.total);
		    	buildKnob(elm, color, data, elmNum);
		    }
	    })
	    .fail(function() {
	    	//alert( "error occured" );
	    });
		

	});

	

	
	

	

	

	$(".scrolling-y").mCustomScrollbar({
		axis:"y", 
		theme:"blue", 
		advanced:{
			autoExpandHorizontalScroll:true
		},
		scrollButtons:{ 
			scrollAmount: 100
		},
		keyboard:{ scrollAmount: 50 }
	});

	$(".scrolling-x").mCustomScrollbar({
		axis:"x", 
		theme:"blue", 
		advanced:{
			autoExpandHorizontalScroll:true
		},
		scrollButtons:{ 
			scrollAmount: 100
		},
		keyboard:{ scrollAmount: 50 }
	});
	

	function requestData(chart){
		if($(myfirstchart).length > 0){			
		    $.ajax({
		    	type: "GET",
		    	url: countPostByCategory
		    })
		    .done(function( data ) {
		      chart.setData(data);
		    })
		    .fail(function() {
		      //alert( "error occured" );
		    });	
		}
  	}

	
	

	$('#content-container').addClass('animated bounceInDown');

	NProgress.done();

	$('.link-logout').click(function(e){
		
		var self = $(this);
		var url = self.attr('href');
		
			swal({
				title:'Are You Sure want to Logout',
				text:'You will be able to login again next time!',
				type:'warning',
				showCancelButton:true,
				confirmButtonCollor:'#0AA699',
				confirmButtonText:'Yes, Logout Please!',
				cancelButtonText:'No, cancel!',
				closeOnConfirm:false,
				closeOnCancel:true
			},
			function(isConfirm){
				if(isConfirm){
					$.ajax({
				    	type: "POST",
				    	url: url
				    })
				    .done(function( data ) {
				    	swal('Success!', 'You success logout', 'success');
						window.location = '/';
				    })
				    .fail(function() {
				    	swal('Success!', 'You success logout', 'success');
						window.location = '/';
				    });
								
				}
			});

			e.preventDefault();
		
	});

	$('.summernote').summernote({
	  height: 300,
	  minHeight: null,
	  maxHeight: null,
	  focus: true,
	});
	
});