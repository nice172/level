require.config({
    urlArgs: 'v=201900101', 
    baseUrl: '/web/js',
    paths: {
        'jquery': '../js/jquery-1.11.1.min',
        'jquery.ui': '../js/jquery-ui-1.10.3.min',
        'bootstrap': '../js/bootstrap.min',
        'tpl':'../js/tmodjs',
        'jquery.touchslider':'../js/jquery.touchslider.min',
        'swipe':'../js/swipe',
        'sweetalert':'../js/sweetalert.min'
        
    },
    shim: {
        'jquery.ui': {
            exports: "$",
            deps: ['jquery']
        },
        'bootstrap': {
            exports: "$",
            deps: ['jquery']
        },  
        'jquery.touchslider': {
            exports: "$",
            deps: ['jquery']
        },
        'sweetalert':{
            exports: "$",
            deps: ['css!../css/sweetalert.css']
        }
        
    }
});
