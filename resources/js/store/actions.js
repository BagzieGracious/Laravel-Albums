import axios from 'axios'

const actions = {
	ADD_COMMENT({ commit }, payload){

		commit('SET_LOADING', true)
		axios.post(`http://127.0.0.1:8000/albums/${payload.id}/comments`, 
			{comment: payload.comment})
		.then(resp => {
			// get back the feedback
			commit('SET_COMMENTS', resp.data)
			commit('SET_LOADING', false)
		}).catch(err => {
			// get back error message
			console.log(err)

		})
	},
	GET_COMMENTS({ commit }, id){
		
		commit('SET_LOADING', true)
		axios.get(`http://127.0.0.1:8000/albums/${id}/comments`).then(resp => {
			// get back the feedback
			commit('SET_COMMENTS', resp.data)
			
			commit('SET_LOADING', false)

		}).catch(err => {
			// get back error message
			console.log(err)

		})
	},
	REMOVE_COMMENT({commit}, data){

		commit('SET_LOADING', true)
		axios.delete(`http://127.0.0.1:8000/albums/${data.album}/comments/${data.id}`)
		.then(resp => {
			// get back the feedback
			commit('DELETE_COMMENT', data.id)
			commit('SET_LOADING', false)
		}).catch(err => {
			console.log(err)
		})
	}
}

export default actions
