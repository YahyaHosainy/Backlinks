<template>
  <div>
    <div class="mt-0 mb-3">
      <h1 class="text-center">
        Your fetching is already started.
        <br>
        The excel file will be sent to your given email address. You can check your email inbox about <b>15-20 minutes</b> later.
      </h1>
    </div>
    <div class="mt-4">
      <button
        @click="reload"
        class="
          mt-3 btn-block
          btn
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
        ">Fetch New One</button>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    window.onbeforeunload = null;
  },
  methods: {
    reload(){
      window.location.reload()
    }
  }
}
</script>