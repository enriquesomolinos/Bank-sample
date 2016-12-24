

var	ChargeListView = Backbone.View.extend({
		
		
		initialize: function() {		
			
			this.listenTo(this.collection, 'reset add delete change',  this.showCharges);
			
				
			this.pagination = new Pagination ();
			
			
			this.paginationView = new PaginationView({model:this.pagination});
			this.listenTo(this.paginationView, 'pageChanged',  this.fetchCharges);
				
			this.template = _.template($('#charge-list-template').html());		
			this.fetchCharges();
			
			
			
			
		},
		render: function() {
			this.$el.html(this.template());
			
			return this;
		},
		
		showCharges: function() {
			
			
			this.$el.find('#charge-list-container').empty();
			
			var v = null;
			
			this.collection.forEach(function(item, idx) {
				v = new SingleCharge({model:item});
				this.$el.find('#charge-list-container').append(v.render().el);
			}, this);
		
			this.$el.find('#pagination-container').append(this.paginationView.render().el);
			return this;
		},
		
		fetchCharges: function() {
			 
			var url = this.pagination.get("currentUrl");
			this.halCharges = new HalCharges().fetch(
				{
					type: "GET",
					headers: {'Authorization' :configuration.authorization},
					contentType: configuration.apiContentType,
					url: url,
					processData: true,
					success:  _.bind(function(receivedItem, response) {
						this.collection = response._embedded.charge;
						this.paginationView.setPage(response.page);
						this.paginationView.setTotalPages(response.page_count);
						this.paginationView.setNext(response._links.next);
						this.paginationView.setPrevious(response._links.prev);
						this.showCharges();
					}, this),
					
					error: function(model, response) {
							alert("Charges cannot this loaded at this moment.");
							 console.log(response.responseText);
						}
				});
		}
	
	});
	