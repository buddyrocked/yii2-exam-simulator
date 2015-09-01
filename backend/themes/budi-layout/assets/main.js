requirejs.config({
	"baseUrl" : baseUrl+"/assets",
	"paths" : {
		"jquery" 	: "vendor/jquery/dist/jquery",
		"bootstrap"	: "vendor/bootstrap/dist/js/bootstrap",
		"paralax"	: "vendor/jquery.parallax/jquery.parallax",
		"scrollTo"	: "vendor/jquery.scrollTo/jquery.scrollTo",
		"classie"	: "js/classie",
		"nav"		: "js/jquery.nav",
		"mlens"		: "js/jquery.mlens-1.3.min",
		"holder"	: "vendor/holderjs/holder",
		"newsTicker": "vendor/jquery.newsTicker/jquery.newsTicker.min",
		"nivoSlider": "vendor/nivo-slider/js/jquery.nivo.slider",
		"masonry"	: "vendor/masonry/dist/masonry.pkgd.min",
		"google"	: "https://maps.googleapis.com/maps/api/js?key=AIzaSyBgA9x1eyjMKLAln_0LTAkMPcIJFC0M9os&sensor=false"
	},
	shim : {
		"jquery"        :   {
                    	        exports: '$'
                            },
		"newsTicker"	: 	["jquery"],
		"paralax"		: 	["jquery"],
		"nav"			: 	["jquery"],
		"nivoSlider"	: 	["jquery"],
		"mlens" 		: 	["jquery", "classie"]
	}


});

requirejs(["js/frontend"]);