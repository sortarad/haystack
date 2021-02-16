window.Haystack = function() {
	return {
		needle: '',
		items: null,
		results: [],
		error: false,
		init() {
			console.log( 'Initializing...' );

			fetch('/haystack/search')
				.then((response) => {
					if (! response.ok) {
						this.error = true;
						return null;
					}

					return response.json()
				})
				.then((items) => {
					console.log( 'Set items', items );

					this.items = items;
				})
				.catch(console.error);
		},
		search() {
			console.log( 'Searching...' );

			if (this.items === null) {
				console.log( 'No items to search' );

				this.results = [];
				return false;
			}

			console.log( 'Needle', this.needle );

			this.results = this.items.filter( ( item ) => {
				return item.id === this.needle;
			} );
		},
	};
}
