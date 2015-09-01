define(["jquery", "paralax", "scrollto", "nav", "classie", "mlens", "holder", "newsticker", "nivoslider", "masonry", "google"], function( $, paralax, scrollTo, onePageNav, classie, mlens, holder, newsTicker, nivoSlider, masonry, google){
	var s, 
        APP = {
            settings: {
                homeElement:$('#home'),
                mapElement: $('#map'),
                sectionElement: $('.section'),
                containerSectionElement: $('#nav-section'),
                nivoElement:$('#slider'),
                gmap:{
                    element: $('#map'),
                    latitude: -6.897457,
                    longitude: 106.938772
                },
                toTopNav:$('.totop'),
                toBottomNav:$('.tobotom'),
            },

            init:function(){
                s = this.settings;                
                this.generateElement();
                this.bindUIActions();
            },

            generateElement:function(){
                s.sectionElement.each(function(i, e){
                    s.containerSectionElement.append('<li><a href="#' + $(this).attr('id') + '">&nbsp;</a></li>');
                });

                s.homeElement.parallax("20%", 0.1);

                if(s.homeElement.length == 0 ){
                    s.toBottomNav.hide();
                }else{
                    var scrollBody = $(window).scrollTop();
                    if (scrollBody > s.homeElement.offset().top + 200) {
                        $('#navbar-info').removeClass('active');
                        s.toBottomNav.hide();
                        s.toTopNav.show();
                    }else{
                        s.toTopNav.hide();
                        s.toBottomNav.show();
                    }
                }

                $('.animated').each(function(){
                    anim = $(this).attr('data-anim');
                    var scrollTop = $('#trigger').offset().top;                
                    if (scrollTop > $(this).offset().top) {                    
                        animatex='up';
                        $(this).removeClass('fadeOut');
                        $(this).addClass(anim);
                    }else{
                        animatex='down';
                        $(this).removeClass(anim);
                        $(this).addClass('fadeOut');
                    }
                });

                /*$(".zoom").each(function()
                {               
                    $(this).mlens(
                    {
                        "imgSrc": $(this).attr("data-big"),
                        "lensSize": 200,
                        "lensShape": "circle"
                    });
                });*/

                var nt_example1 = $('.newsticker').newsTicker({
                    row_height: 100,
                    max_rows: 4,
                    duration: 4000,
                    prevButton: $('#newsticker-prev'),
                    nextButton: $('#newsticker-next')
                });

                s.nivoElement.nivoSlider({controlNavThumbs: false});



                
            },

            generateMap:function(){
                /*var latlng = new google.maps.LatLng(s.gmap.latitude, s.gmap.longitude);
                var settings = {
                    zoom: 15,
                    center: latlng,
                    mapTypeControl: true,
                    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                    navigationControl: true,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var map = new google.maps.Map(document.getElementById("map-info"), settings);

                var companyMarker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title:"Budi Hariyana Studio \n Jalan Selabintana no.667 Sukabumi 43151"
                });

                var contentString = '<div class="hexagon-logo" id=""><div class="hexagon-icon"><span class="fa-stack fa-lg font-map"><i class="fa fa-circle fa-stack-2x black"></i><i class="fa fa-rocket fa-stack-1x fa-inverse"></i></span></div></div><div class="center bold">Jl. Selabintana NO.667 SUKABUMI</div>';
                 
                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                google.maps.event.addListener(companyMarker, 'click', function() {
                  infowindow.open(map,companyMarker);
                });*/
            },

            pasteImage:function(){
                document.onpaste = function (event) {
                    // use event.originalEvent.clipboard for newer chrome versions
                    var clipboardData = event.clipboardData  ||  event.originalEvent.clipboardData;
                    var items = clipboardData.items;
                    console.log(JSON.stringify(items)); // will give you the mime types
                    // find pasted image among pasted items
                    var blob;
                    for (var i = 0; i < items.length; i++) {
                        if (items[i].type.indexOf("image") === 0) {
                            blob = items[i].getAsFile();
                        }
                    }
                    // load image if there is a pasted image
                    if (blob !== null) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            console.log(event.target.result); // data url!
                        $(document.activeElement).html('<img src="'+event.target.result+'" />');
                    }
                    reader.readAsDataURL(blob);
                    }
                }
            },

            bindUIActions: function(){
                s.containerSectionElement.onePageNav();


                s.toTopNav.click(function(e){
                    $('html, body').animate({ scrollTop: 0 }, "slow");
                    e.preventDefault();
                });

                s.toBottomNav.click(function(e){
                    $('html, body').animate({ scrollTop: 600 }, "slow");
                    e.preventDefault();
                });

                $(window).bind('scroll', function (){ 

                    if($('#home').length > 0 ){
                        var scrollBody = $(window).scrollTop();
                        if (scrollBody > $('#home').offset().top + 200) {
                            //$('#navigations').addClass('color-full');
                            $('#navbar-info').removeClass('active');
                            $('.tobotom').hide();
                            $('.totop').show();
                        } else {
                            //$('#navigations').removeClass('color-full');
                            $('#navbar-info').addClass('active');
                            $('.totop').hide();
                            $('.tobotom').show();
                        }
                    }

                    $('.animated').each(function(){
                        anim = $(this).attr('data-anim');
                        var scrollTop = $('#trigger').offset().top;                
                        if (scrollTop > $(this).offset().top) {                    
                            animatex='up';
                            $(this).removeClass('fadeOut');
                            $(this).addClass(anim);
                        }else{
                            animatex='down';
                            $(this).removeClass(anim);
                            $(this).addClass('fadeOut');
                        }
                    });
                });
            },
        };

        $(document).ready(function() {

            APP.init();            
            
        });
});