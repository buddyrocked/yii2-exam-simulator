// Place third party dependencies in the lib folder
//
// Configure loading modules from the lib directory,
// except 'app' ones, 
requirejs.config({
    "baseUrl": baseUrl,
    enforceDefine: false,
    urlArgs: "bust=" + (new Date()).getTime(),
    waitSeconds: 200,
    "paths": {
        "jquery"            : "vendor/jquery/dist/jquery",
        "jqueryui"          : "vendor/jqueryui/jquery-ui.min",
        "swall"             : "vendor/sweetalert/lib/sweet-alert.min",
        "imagesloaded"      : "vendor/imagesloaded/imagesloaded.pkgd.min",
        "easypiechart"      : "vendor/jquery.easy-pie-chart/dist/jquery.easypiechart",
        "selectpicker"      : "vendor/bootstrap-select/dist/js/bootstrap-select.min",
        "bootstrapSwitch"   : "vendor/bootstrap-switch/dist/js/bootstrap-switch.min",
        "nprogress"         : "vendor/nprogress/nprogress",
        "moment"            : "vendor/moment/min/moment.min",
        "amcharts"          : "vendor/amcharts/amcharts",
        "serial"            : "vendor/amcharts/serial",
        "pie"               : "vendor/amcharts/pie",
        "mCustomScrollbar"  : "vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar",
        "knob"              : "vendor/jquery-knob/js/jquery.knob",
        "summernote"        : "vendor/summernote/dist/summernote.min"

    },
    shim: {
            'jquery'        :   {
                    	           exports: 'jQuery'
                                },
            'serial'        :   {
                                    deps: ['amcharts'],
                                    exports: 'AmCharts',
                                    init: function() {
                                        AmCharts.isReady = true;
                                    }
                                },
            'pie'           :   {
                                    deps: ['amcharts'],
                                    exports: 'AmCharts',
                                    init: function() {
                                        AmCharts.isReady = true;
                                    }
                                },
	},
});

// Load the main app module to start the app
requirejs(["js/budi-layout2"]);