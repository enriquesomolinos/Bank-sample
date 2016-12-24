
var HomeView = Backbone.View.extend({
		
		initialize: function() {
			this.template = _.template($('#home-template').html());
			
			
		},
		render: function() {
			this.$el.html(this.template());
			return this;
		},
		
		
	});