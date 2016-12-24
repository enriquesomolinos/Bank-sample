
	
var AppRouter = Backbone.Router.extend({
    routes: {
		'': 'homeRoute',
        'add-charge': 'addCharge',
        'charge-list': 'listCharges' 
        
    }
});


 $( document ).ready(function() {
	
	var app_router = new AppRouter;
	app_router.on('route:addCharge', function () {
			var v = new AddChargeView();
			$('#tab-container').html(v.render().el);
			$('#add-charge-tab').attr("class","active");
			$('#charge-list-tab').attr("class","");
		
	});
	app_router.on('route:listCharges', function () {
			var v = new ChargeListView();
			$('#tab-container').html(v.render().el);
			$('#add-charge-tab').attr("class","");
			$('#charge-list-tab').attr("class","active");
				
	});
	app_router.on('route:homeRoute', function () {
			var v = new HomeView();
			$('#tab-container').html(v.render().el);
			$('#add-charge-tab').attr("class","");
			$('#charge-list-tab').attr("class","");
				
	});

	Backbone.history.start();
});
