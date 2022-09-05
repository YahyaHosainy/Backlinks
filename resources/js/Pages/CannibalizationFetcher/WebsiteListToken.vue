<template>
  <div>
    <div id="loaderParent">
      <div class="mt-0 mb-3">
        <h1 class="text-center" v-if="!expired">
          To continue with Conniblization Fetcher you need to first link your google account for getting statues from your google seach console.
        </h1>
        <h1 class="text-center" v-else>
          Your google search console token is expired you need to fresh your google login.
        </h1>
      </div>
      <a :href="googleLogin" class="btn btn-google collect-button btn-block">
        <img
          src="/assets/img/Google__G__Logo-min.png"
          alt="google image"
          style="width:25px;float:left"
          class="mr-2"
        >
        {{ expired ? 'Fresh Google Login' : 'Link Google Account'}}
      </a>
    </div>
  </div>
</template>

<script>
export default {
  props:['expired'],
  data(){
    return {
      googleLogin: '',
    }
  },
  created() {
    this.googleLogin = document.getElementById('google-login').value
    window.onbeforeunload = null;
    window.localStorage.removeItem('CannibalizationFetcherWebsites')
  },
  methods: {
    allowNext() {
      this.next = true
      setTimeout(()=>{
        this.$refs.input_code.focus()
      },100);
    },
  },
}
</script>

<style scoped>
.loaderParent {
  overflow: auto;
}
.loader {
  position: fixed;
  left:0;
  right:0;
  top:0;
  bottom:0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 5;
}
.justify-space-between {
  justify-content: space-between;
}
</style>