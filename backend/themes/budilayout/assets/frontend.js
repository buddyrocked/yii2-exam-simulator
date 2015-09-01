requirejs.config({
	"baseUrl" : baseUrl+"/assets",
	"paths" : {
		"jquery" 	: "vendor/jquery/dist/jquery",
		"bootstrap"	: "vendor/bootstrap/dist/js/bootstrap",
		"paralax"	: "vendor/jquery.parallax/jquery.parallax",
		"scrollto"	: "vendor/jquery.scrollTo/jquery.scrollTo",
		"nav"		: "js/jquery.nav",
		"classie"	: "js/classie",
		"mlens"		: "js/jquery.mlens-1.3.min",
		"holder"	: "vendor/holderjs/holder",
		"newsticker": "vendor/jquery.newsTicker/jquery.newsTicker.min",
		"nivoslider": "vendor/nivo-slider/js/jquery.nivo.slider",
		"masonry"	: "vendor/masonry/dist/masonry.pkgd.min",
		"google"	: "https://maps.googleapis.com/maps/api/js?key=AIzaSyBgA9x1eyjMKLAln_0LTAkMPcIJFC0M9os&sensor=false"
	},
	shim : {
		"jquery"        :   {
                    	        exports: '$'
                            },
		"newsticker"	: 	["jquery"],
		"paralax"		: 	["jquery"],
		"nav"			: 	["jquery"],
		"nivoslider"	: 	["jquery"],
		"mlens" 		: 	["jquery", "classie"]
	}


});

requirejs(["js/frontend"]);