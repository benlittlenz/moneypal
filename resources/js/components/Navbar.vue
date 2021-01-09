<template>
  <div v-if="user" class="h-full flex items-center justify-center py-6">
    <div class="flex w-full max-w-s p-4 bg-white">
      <ul class="flex flex-col w-full">
        <li class="my-px">
          <a
            href="#"
            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 bg-gray-100"
          >
            <span
              class="flex items-center justify-center text-lg text-gray-400"
            >
              <svg
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="h-6 w-6"
              >
                <path
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                ></path>
              </svg>
            </span>
            <span class="ml-3">Overview</span>
            <!-- <span
              class="flex items-center justify-center text-sm text-gray-500 font-semibold bg-gray-200 h-6 px-2 rounded-full ml-auto"
              >3</span -->
            >
          </a>
        </li>
        <li class="my-px">
          <span
            class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase"
            >Finances</span
          >
        </li>
        <li class="my-px">
          <a
            href="#"
            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100"
          >
            <span
              class="flex items-center justify-center text-lg text-gray-400"
            >
              <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                ></path>
              </svg>
            </span>
            <span class="ml-3">Budgets</span>
          </a>
        </li>
        <li class="my-px">
          <a
            href="#"
            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100"
          >
            <span
              class="flex items-center justify-center text-lg text-gray-400"
            >
              <svg
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="h-6 w-6"
              >
                <path
                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                ></path>
              </svg>
            </span>
            <span class="ml-3">Transactions</span>
          </a>
        </li>
        <li class="my-px">
          <a
            href="#"
            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100"
          >
            <span
              class="flex items-center justify-center text-lg text-gray-400"
            >
              <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                ></path>
              </svg>
            </span>
            <span class="ml-3">Recurring</span>
          </a>
        </li>

        <li class="my-px">
          <span
            class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase"
            >Setup</span
          >
        </li>
        <li class="my-px">
          <a
            href="#"
            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100"
          >
            <span
              class="flex items-center justify-center text-lg text-gray-400"
            >
              <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 10h16M4 14h16M4 18h16"
                ></path>
              </svg>
            </span>
            <span class="ml-3">Accounts</span>
          </a>
        </li>
        <li class="my-px">
          <a
            href="#"
            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100"
          >
            <span
              class="flex items-center justify-center text-lg text-gray-400"
            >
              <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                ></path>
              </svg>
            </span>
            <span class="ml-3">Categories</span>
          </a>
        </li>
        <li class="my-px">
          <a
            href="#"
            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100"
          >
            <span
              class="flex items-center justify-center text-lg text-gray-400"
            >
              <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
                ></path>
              </svg>
            </span>
            <span class="ml-3">Tags</span>
          </a>
        </li>

        <li class="my-px">
          <span
            class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase"
            >Account</span
          >
        </li>
        <li class="my-px">
          <a
            href="#"
            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100"
          >
            <span
              class="flex items-center justify-center text-lg text-gray-400"
            >
              <svg
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="h-6 w-6"
              >
                <path
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                ></path>
              </svg>
            </span>
            <span class="ml-3">Profile</span>
          </a>
        </li>
        <li class="my-px">
          <a
            href="#"
            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100"
          >
            <span
              class="flex items-center justify-center text-lg text-gray-400"
            >
              <svg
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="h-6 w-6"
              >
                <path
                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                ></path>
                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
              </svg>
            </span>
            <span class="ml-3">Settings</span>
          </a>
        </li>
        <li class="my-px">
          <a
            @click.prevent="logout"
            href="#"
            class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100"
          >
            <span class="flex items-center justify-center text-lg text-red-400">
              <svg
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="h-6 w-6"
              >
                <path
                  d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"
                ></path>
              </svg>
            </span>
            <span class="ml-3">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  components: {

  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>