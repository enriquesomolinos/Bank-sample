

var AddChargeView = Backbone.View.extend({
		events: {
			'click #add-charge-submit': 'performAddCharge',
		},
		initialize: function() {
			this.template = _.template($('#add-charge-template').html());
			
			
		},
		render: function() {
			this.$el.html(this.template());
			return this;
		},
		
		performAddCharge: function() {
			
			var description = this.$el.find('#charge-description').val();
			var amount = this.$el.find('#charge-amount').val();
			var charge = new Charge({"description":description,"amount":amount});
			charge.save({ accept: "application/json"} , { 
				headers: {'Authorization': configuration.authorization } ,
				success:function(){
					$('#message-container').empty();
					console.log("Charge saved sucessfully");
					$("#message-container").append('<p class="bg-success">Charge saved sucessfully</p>');
					$('#description-form-group').attr("class","form-group");
					$('#amount-form-group').attr("class","form-group");
				},
				error: function(model, xhr, options) {
					console.log("The charge cannot be saved");
					
					var jsonResponse = JSON.parse(xhr.responseText);
					$('#message-container').empty();
					$('#description-form-group').attr("class","form-group");
					$('#amount-form-group').attr("class","form-group");
					if(jsonResponse.validation_messages.amount!=null){
						if(jsonResponse.validation_messages.amount.isEmpty!=null){
							$("#message-container").append('<p class="bg-danger">Amount:'+ jsonResponse.validation_messages.amount.isEmpty+'</p>');
							$('#amount-form-group').attr("class","form-group has-error");
						}
						if(jsonResponse.validation_messages.amount.notFloat!=null){
							$("#message-container").append('<p class="bg-danger">Amount:'+ jsonResponse.validation_messages.amount.notFloat+'</p>');
							$('#amount-form-group').attr("class","form-group has-error");
						}
						
					}
					if(jsonResponse.validation_messages.description!=null){
						if(jsonResponse.validation_messages.description.isEmpty!=null){
							$("#message-container").append('<p class="bg-danger">Description:'+ jsonResponse.validation_messages.description.isEmpty+'</p>');
							$('#description-form-group').attr("class","form-group has-error");
						}
					}
					
				}
			});
		},
	});