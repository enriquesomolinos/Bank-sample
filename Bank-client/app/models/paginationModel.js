var Pagination = Backbone.Model.extend({
		currentPage: 1,
		totalPages: null,
		next: null,
		previous: null,
		currentUrl:null
	});