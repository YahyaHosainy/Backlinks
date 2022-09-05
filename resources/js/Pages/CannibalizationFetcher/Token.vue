<template>
  <div>
    <div id="loaderParent" v-if="whileMessage.length === 0">
      <div class="mt-0 mb-3">
        <h1 class="text-center">
          Everything is ready just click to start your fetching process.
        </h1>
      </div>
      <form @submit.prevent="submit" action="http://127.0.0.1:8000/login">
        <button
          type="submit"
          class="
            mt-2
            btn-block
            items-center
            px-4
            py-2
            bg-gray-800
            border border-transparent
            rounded-md
            font-semibold
            text-xs text-white
            uppercase
            tracking-widest
            hover:bg-gray-700
            active:bg-gray-900
            focus:outline-none
            focus:border-gray-900
            focus:shadow-outline-gray
            disabled:opacity-25
            transition
            ease-in-out
            duration-150
          "
        >
          Start
          <i class="fas fa-chevron-right ml-2"></i>
        </button>
      </form>
    </div>
    <div v-else>
      <h1
        class="mb-3"
        :class="{'text-danger': !loader}"
      >{{ whileMessage }}</h1>
      <Loader v-if="loader"/>
      <div v-else>
        <button
          @click="$emit('pass', 0)"
          class="
            mt-2
            btn-block
            items-center
            px-4
            py-2
            bg-gray-800
            border border-transparent
            rounded-md
            font-semibold
            text-xs text-white
            uppercase
            tracking-widest
            hover:bg-gray-700
            active:bg-gray-900
            focus:outline-none
            focus:border-gray-900
            focus:shadow-outline-gray
            disabled:opacity-25
            transition
            ease-in-out
            duration-150
          "
        >
          <i class="fas fa-times mr-2"></i>
          Cancel
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Loader from "./Loader.vue";

export default {
  data(){
    return {
      whileMessage: "",
      loader:false,
    }
  },
  created() {
    window.onbeforeunload = function (e) {
      e = e || window.event;
      // For IE and Firefox prior to version 4
      if (e) {
        e.returnValue = 'Your fetching proccess will lost, do you want to leave?';
      }
      // For Safari
      return 'Your fetching proccess will lost, do you want to leave?';
    };
  },
  methods: {
    submit() {
      this.whileMessage = 'Starting fetch ...'
      this.loader = true
      fetch('/cannibalization-fetcher-cannibalize', {
        method: 'POST',
        mode: 'cors',
        credentials: "same-origin",
        cache: 'no-cache',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          site: window.localStorage.getItem('CannibalizationFetcherWebsite'),
          email: window.localStorage.getItem('CannibalizationFetcherEmail'),
          _token: document.getElementById('_csrf_token').value
        })
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          console.log(data)
          this.$emit('pass',3)
        } else {
          this.whileMessage = `The code you entered is already used!`
          this.loader = false
          console.error(data)
        }
      })
      .catch(e => {
        console.error(e)
        this.whileMessage = `The code you entered is already used!`
        this.loader = false
      })
    }
  },
  components: {
    Loader
  }
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
