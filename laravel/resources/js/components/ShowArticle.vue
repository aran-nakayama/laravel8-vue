<template>
  <div>
    <post-article @post-submitted="addPost">
    </post-article>
    <div v-for="(post,index) in posts" :key="index" class="pt-4">
      <span class="h4 card-title">{{post.title}}</span>
      <br/>
      <span class="card-text">{{post.body}}</span>
    </div>
  </div>
</template>

<script>
import PostArticle from './PostArticle'
export default {
  components:{
    PostArticle,
  },
  data(){
    return{
      posts:[]
    }
  },
  methods:{
    addPost(post){
      this.posts.push(post)
    }
  }
}
</script>