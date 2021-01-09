<template>
  <div class="w-full h-full flex items-center">
    <navbar />

    <div class="container mx-auto w-5/6">
      <child />
    </div>

    <div class="absolute bottom-0 right-0 mr-8 mb-8">
      <div class="flex items-center">
        <div
          class="bg-white uppercase rounded-lg shadow-md px-4 py-2 border-1 border-gray-400 mr-4 hover:bg-gray-100 cursor-pointer"
        >
          <svg
            class="inline w-6 h-6"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            ></path>
          </svg>
          Help
        </div>
        <div
          class="bg-white uppercase rounded-lg shadow-md px-4 py-2 border-1 border-gray-400 hover:bg-gray-100 cursor-pointer"
        >
          <svg
            class="inline w-6 h-6"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
            ></path>
          </svg>
          bugs & Feedback
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "~/components/Navbar";

export default {
  name: "MainLayout",

  components: {
    Navbar,
  },
};
</script>
