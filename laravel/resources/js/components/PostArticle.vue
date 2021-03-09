<template>
  <div>
    <form @submit.prevent="onSubmit">
      <div class="md-form">
        <label>タイトル</label>
        <input v-model="title" class="form-control" type="text">
      </div>
      <label></label>
      <textarea v-model="body" class="form-control" rows="4" placeholder="本文"></textarea>
      <button type="submit" class="btn green btn-block text-white mt-3">投稿する</button>
    </form>
  </div>
</template>

<script>
export default{
  data(){
    return{
      title: '',
      body: '',
      article: {},
    }
  },
  methods:{
    onSubmit(){
      if (this.title === '' ) {
              alert('タイトルを入力してください')
              return
      }
      if (this.body === '' ) {
              alert('本文を入力してください')
              return
      }

      this.article = {
        title: this.title,
        body: this.body
      }
      this.$emit('post-submitted', this.article)

      this.saveToDatabase()

      this.title=''
      this.body=''
    },
    async saveToDatabase(){
      const response = await axios.post('articles', this.article)
    }
  }
}
</script>