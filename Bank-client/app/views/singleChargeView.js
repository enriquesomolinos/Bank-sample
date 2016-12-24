var	SingleCharge = Backbone.View.extend({
		className: 'charge',
		initialize: function() {
			this.template = _.template($('#single-charge-template').html());
		},
		render: function() {			
			var html = this.template({charge:this.model});
			var newElement = $(html)
			
			this.$el.replaceWith(newElement);
			this.setElement(newElement);		
			return this;
			
			
		},
	});