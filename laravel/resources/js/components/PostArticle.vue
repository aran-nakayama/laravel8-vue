<template>
  <div>
    <form @submit.prevent="onSubmit">
      @csrf
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
    }
  },
  methods:{
    onSubmit(){
      let post = {
        title: this.title,
        body: this.body
      }
      this.$emit('post-submitted', post)

      this.title=''
      this.body=''
    }
  }
}
</script>