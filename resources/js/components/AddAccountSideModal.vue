<template>
  <section
    v-click-outside="doStuff"
    class="absolute inset-y-0 pl-16 max-w-full right-0 flex"
  >
    <div class="w-screen max-w-md">
      <div
        class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl"
      >
        <div class="flex-1 h-0 overflow-y-auto">
          <header class="space-y-1 py-6 px-4 bg-indigo-700 sm:px-6">
            <div class="flex items-center justify-between space-x-3">
              <h2 class="text-lg leading-7 font-medium text-white">
                Create New Account
              </h2>
              <div class="h-7 flex items-center">
                <button
                  v-on:click="closeDialog"
                  aria-label="Close panel"
                  class="text-indigo-200 hover:text-white transition ease-in-out duration-150"
                >
                  <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"
                    />
                  </svg>
                </button>
              </div>
            </div>
            <div>
              <p class="text-sm leading-5 text-indigo-300">
                Get started by filling in the information below to create your
                new account.
              </p>
            </div>
          </header>
          <div class="flex-1 flex flex-col justify-between">
            <div class="px-4 divide-y divide-gray-200 sm:px-6">
              <div class="space-y-6 pt-6 pb-5">
                <div class="mt-6">
                  <label
                    for="password"
                    class="block text-sm font-medium leading-5 text-gray-700"
                  >
                    Account Name
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <input
                      v-model="form.accountName"
                      id="accountName"
                      type="text"
                      required
                      class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    />
                    <has-error :form="form" field="accountName" />
                  </div>
                </div>

                <!-- <AddAccountType
                  v-on:update-type="selectAccountType"
                  :accountTypes="[
                    'Cash',
                    'Credit',
                    'Investment',
                    'Loan',
                    'Property',
                    'Cryptocurrency',
                    'Other',
                  ]"
                /> -->

                <div class="mt-6">
                  <label
                    for="password"
                    class="block text-sm font-medium leading-5 text-gray-700"
                  >
                    Bank Name
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <input
                      v-model="form.bankName"
                      id="bankName"
                      type="text"
                      required
                      class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    />
                    <has-error :form="form" field="bankName" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex-shrink-0 px-4 py-4 space-x-4 flex justify-end">
          <span class="inline-flex rounded-md shadow-sm">
            <button
              v-on:click="closeDialog"
              type="button"
              class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out"
            >
              Cancel
            </button>
          </span>
          <span class="inline-flex rounded-md shadow-sm">
            <button
              type="submit"
              class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out"
            >
              Save
            </button>
          </span>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
//import AddAccountType from "../components/AddAccountType";
import Form from "vform";

export default {
  components: {
    //AddAccountType,
  },
  data: () => ({
    form: new Form({
      accountName: "",
      accountType: "Cash",
      bankName: "",
    }),
  }),

  methods: {
    // closeDialog: function () {
    //   this.$emit("close-dialog");
    // },

    // selectAccountType: function (value) {
    //   console.log("trigger: ", value);
    //   console.log(this.form);
    //   this.form.accountType = value;
    // },

    // doStuff: function () {
    //   console.log("HEY");
    // },
  },

  // directives: {
  //   //ClickOutside
  // }
};
</script>
