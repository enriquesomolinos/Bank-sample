var Configuration = Backbone.Model.extend({
		apiEndPoint:'http://localhost:8080/charge',
		apiContentType:'application/vnd.bank-api.v1+json',
		authorization: 'Basic dGVzdDp0ZXN0'
	});
var configuration = new Configuration();
var Charge = Backbone.Model.extend({
		url: configuration.apiEndPoint,
		
		
		validate: function(attributes){
			/*if ( attributes.age <  ){
				return 'Age must be positive.';
			}

			if ( !attributes.name ){
				return 'Every person must have a name.';
			}*/
		},

	});