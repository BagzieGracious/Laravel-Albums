<template>
  <div>
    <div id="outer-section" v-if="getLoading">
      <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <ul class="list-group">
      <SingleComment 
        v-for="comment in getComments"
        :user="comment.user.name" 
        :comment="comment.comment" 
        :time="comment.created_at"
        :id="comment.id"
        :key="comment.id"
        :user_id="comment.user_id"
        :token="csrf"
        :auth="auth"
        :album="comment.album_id"
      />

    </ul>

    <div class="form-group mt-4" v-if="auth !== '0'">
      <textarea 
          name="comment" 
          rows="3" 
          class="form-control" 
          v-model="commentValue" 
          placeholder="Enter your comment">
      </textarea>

      <button type="submit" @click="submitComment" class="btn btn-primary mt-3">Comment</button>
    </div>
  </div>
</template>
  
<script>
  import SingleComment from './SingleComment'
  import { mapActions, mapGetters } from 'vuex'

  export default {
    name: 'Comments',
    props: ['asset', 'auth'],
    components: { SingleComment },
    computed: {
      ...mapGetters(['getComments', 'getLoading'])
    },
    data: () => {
      return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        commentValue: ""
      }
    },
    methods: {
      ...mapActions(['ADD_COMMENT', 'GET_COMMENTS']),
      submitComment(){
        let user = this.assetData()
        this.ADD_COMMENT({id: user.id, comment: this.commentValue})
        this.commentValue = ""
      },
      assetData(){
        return JSON.parse(this.asset)
      }
    },
    mounted(){
      let user = this.assetData()
      this.GET_COMMENTS(user.id)
    }
  }
</script>

<style>
  #outer-section{
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
    background: rgba(256, 256, 256, 0.6);
  }
  .spinner-grow{
    left: 47%;
    top: 47%;
    position: absolute;
  }
</style>