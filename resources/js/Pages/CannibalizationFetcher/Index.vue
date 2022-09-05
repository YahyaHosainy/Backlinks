<template>
  <div class="container mt-5">
    <div class="font-sans text-gray-900 antialiased">
      <div
        class="
          min-h-screen
          flex flex-col
          items-center
          pt-6
          sm:pt-0
        "
      >

        <div
          class="
            w-full
            sm:max-w-md
            px-6
            py-4
            bg-white
            shadow-md
            overflow-hidden
            sm:rounded-lg
          "
        >
          <WebsiteListToken :expired="expired" @pass="activeTab = $event" v-if="activeTab == 0"></WebsiteListToken>
          <Email @pass="activeTab = $event" v-if="activeTab == 1"></Email>
          <Token @pass="activeTab = $event" v-if="activeTab == 2"></Token>
          <Result @pass="activeTab = $event" v-if="activeTab == 3"></Result>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Email from "./Email.vue";
import Result from "./Result.vue";
import Token from "./Token.vue";
import WebsiteListToken from "./WebsiteListToken.vue";

export default {
  data() {
    return {
      activeTab: -1, // active tab is 1
      expired: false,
    }
  },
  created(){
    let has_google_token = document.getElementById('has_google_token').value
    this.expired = document.getElementById('google-login-expired').value === 'Y'
    if (has_google_token === 'Y' && !this.expired) {
      this.activeTab = 1;
    } else {
      this.activeTab = 0;
    }
  },
  components: {
    WebsiteListToken, // tab number 0
    Email, // .. 1
    Token, // .. 2
    Result // .. 3
  }
}
</script>
