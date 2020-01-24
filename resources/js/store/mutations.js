const mutations = {
	SET_COMMENTS: (state, payload) => {
		state.comments = payload
	},
	SET_LOADING: (state, payload) => {
		state.loading = payload
	},
	DELETE_COMMENT: (state, id) => {
		let index = state.comments.findIndex(comment => comment.id == id)
		state.comments.splice(index, 1)
	}
}

export default mutations
