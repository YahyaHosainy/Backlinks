<template>
  <div>
    <div v-if="ready">
      <div class="mt-0 mb-3">
        <h1 class="text-center">
          <span v-if="websites.length > 0">
            Enter your email and pick a one of websites to continue.
          </span>
          <span v-else>
            Enter your email and website address to continue.
          </span>
        </h1>
      </div>
      <form @submit.prevent="submit" action="http://127.0.0.1:8000/login">
        <div>
          <label class="block font-medium text-sm text-gray-700">
            Email
          </label>
          <input
            v-model="email"
            placeholder="youremail@domain.com"
            class="form-input rounded-md shadow-sm block mt-1 w-full"
            type="email"
            name="email"
            required="required"
            autofocus="autofocus"
          />
        </div>

        <div class="mt-4">
          <label class="block font-medium text-sm text-gray-700">
            Website
          </label>
          <select
            v-if="websites.length > 0"
            v-model="website"
            required="required"
            autocomplete="website"
            name="website"
            class="form-control rounded-md shadow-sm block mt-1 w-full"
          >
            <option value="" disabled selected>Select a website</option>
            <option
              v-for="(website, index) in websites"
              :key="index"
              :value="website"
            >
              {{ website }}
            </option>
          </select>
          <input
            v-else
            autocomplete="website"
            name="website"
            v-model="website"
            type="text"
            class="form-input rounded-md shadow-sm block mt-1 w-full"
            required="required"
            placeholder="https://yourwebsite.com"
          >
        </div>

        <div class="flex items-center justify-space-between mt-4">
          <button
            type="submit"
            class="
              btn
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
            Next
            <i class="fas fa-chevron-right ml-2"></i>
          </button>
        </div>
      </form>
    </div>
    <div v-else>
      <p>Getting your websites list ...</p>
      <Loader/>
    </div>
  </div>
</template>

<script>
import Loader from "./Loader.vue";

export default {
  data() {
    return {
      ready: false,
      website: '',
      websites: [],
      email: ''
    }
  },
  created(){
    window.onbeforeunload = null;
    let email = document.getElementById('user_email_holder').value;
    if (email) {
      this.email = email
    }
    this.getWebsiteList()
  },
  methods: {
    submit() {
      window.localStorage.setItem('CannibalizationFetcherWebsite',this.website)
      window.localStorage.setItem('CannibalizationFetcherEmail',this.email)
      this.$emit('pass',2)
    },
    getWebsiteList(){
      fetch('/cannibalization-fetcher-websites', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: "same-origin",
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          _token: document.getElementById('_csrf_token').value
        })
      })
      .then(res => res.json())
      .then(data => {
        if (data.available_websites) {
          this.websites = data.available_websites
          console.log(data)
          this.$emit('pass',1)
        } else {
          alert('Can\'t fetch your websites list, your enterd token is incorrect or previously used!')
          console.error(data)
          // this.$emit('pass', 1)
        }
        this.ready = true
      })
      .catch(e => {
        this.ready = true
        alert('Can\'t fetch your websites list, your enterd token is incorrect or previously used!')
        console.error(e)
        // this.$emit('pass', 1)
      })
    }
  },
  components: {
    Loader
  }
}
</script>

<style scoped>
.justify-space-between {
  justify-content: space-between;
}
</style>