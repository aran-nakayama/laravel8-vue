<template>
  <div v-show="authorized">
    <post-article
      @post-submitted="addPost">
    </post-article>
    <div v-for="(article,index) in articles" :key="index" class="pt-4">
      <span class="h4 card-title">{{article.title}}</span>
      <br/>
      <span class="card-text">{{article.body}}</span>
    </div>
  </div>
</template>

<script>
import PostArticle from './PostArticle'
export default {
  components:{
    PostArticle,
  },
  props: {
    authorized: {
      type: Boolean,
      default: false,
    }
  },
  data(){
    return{
      articles:[]
    }
  },
  methods:{
    addPost(article){
      this.articles.push(article)
    }
  }
}
</script>