	
var	PaginationView= Backbone.View.extend({
		events: {
			'click #previous-pagination': 'previousPage',
			'click #next-pagination': 'nextPage',
		},
		initialize: function() {
			this.listenTo(this.model, 'change', this.render);
			this.template = _.template($('#pagination-template').html());
			this.model.set({currentPage:1});
			this.model.set({totalPages:1});
			this.model.set({next:null});
			this.model.set({previous:null});
			this.model.set({currentUrl:configuration.apiEndPoint});
			
			this.render();
		},
		render: function() {
			
			$(this.el).html(this.template({pagination:this.model.toJSON()}));
			return this;
		},
		setPage:function(page){
			this.model.set({currentPage:page});
		},		
		setTotalPages:function(total){
			this.model.set({totalPages:total});
		},
		setNext: function(next){
			if(next!=null && next.href!=""){
				
				this.model.set({next:next.href});
			}
		},
		setPrevious: function(previous){
			if(previous!=null && previous.href!=""){
				
				this.model.set({previous:previous.href});
			}
		},
		previousPage: function(){ 
			
			if(this.model.get("previous")!=null && this.model.get("currentPage")>1){
				this.model.set({currentPage:this.model.get("currentPage")-1});
				this.model.set({currentUrl: this.model.get("previous")});
				this.trigger('pageChanged');				
				
			}
		},
		nextPage: function(){
			if(this.model.get("next")!=null && this.model.get("currentPage")< this.model.get("totalPages")){			
				this.model.set({currentUrl: this.model.get("next")});	
				this.model.set({currentPage:this.model.get("currentPage")+1});
				
						
				this.trigger('pageChanged');
								
			}			
		}
	});
	