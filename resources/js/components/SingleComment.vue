<template>
  <li class="list-group-item mt-3">
    <p class="my-0"><strong>{{ user }}</strong></p>
    <p class="my-0 pl-3">{{ comment }}</p>
    <small>{{ time }}</small>
    <button 
      class="btn btn-sm btn-outline-secondary mt-2 d-block" 
      @click="deleteComment"
      v-if="auth !== '0' && parseInt(auth) == user_id"
    >
      Delete
    </button>
  </li>
</template>

<script>
  import { mapActions } from 'vuex'
  import moment from 'moment'

	export default {
		name: 'SingleComment',
		props: ['user', 'comment', 'time', 'id', 'token', 'auth', 'user_id', 'album'],
    methods: {
      ...mapActions(['REMOVE_COMMENT']),

      deleteComment(){
        this.REMOVE_COMMENT({ id: this.id, album: this.album })
      }
    }
	}
</script>
