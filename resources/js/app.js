window.Haystack = function() {
	return {
		q: '',
		items: null,
		results: [],
		error: false,
		init() {
			fetch('/haystack/search')
				.then((response) => response.json())
				.then((items) => {
					this.items = items;
				})
				.catch(console.error);
		},
		search() {
			if (this.items === null) {
				this.results = [];
				return false;
			}

			this.results = this.items.filter( ( item ) => {
				return item.id === this.q;
			} );
		},
	};
}
