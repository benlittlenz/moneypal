<template>
  <section
    v-click-outside="doStuff"
    class="absolute inset-y-0 pl-16 max-w-full right-0 flex"
  >
    {{ $data }}
    <!--
        Slide-over panel, show/hide based on slide-over state.

        Entering: "transform transition ease-in-out duration-500 sm:duration-700"
          From: "translate-x-full"
          To: "translate-x-0"
        Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
          From: "translate-x-0"
          To: "translate-x-full"
      -->
    <div class="w-screen max-w-md">
      <div
        class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl"
      >
        <div class="flex-1 h-0 overflow-y-auto">
          <header class="space-y-1 py-6 px-4 bg-indigo-700 sm:px-6">
            <div class="flex items-center justify-between space-x-3">
              <h2 class="text-lg leading-7 font-medium text-white">
                Add a Transaction
              </h2>
              <div class="h-7 flex items-center">
                <button
                  v-on:click="closeModal"
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
                    Date
                  </label>
                  <div class="mt-1">
                    <date-picker
                      v-model="form.date"
                      type="date"
                      format="DD/MM/YYYY"
                    ></date-picker>
                  </div>
                </div>
                <div class="mt-6">
                  <label
                    for="password"
                    class="block text-sm font-medium leading-5 text-gray-700"
                  >
                    Category
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <v-select
                      label="display_name"
                      :options="categories"
                      v-model="form.category"
                      :reduce="(category) => category.id"
                    ></v-select>
                    <has-error :form="form" field="accountName" />
                  </div>
                </div>
                <div class="mt-6">
                  <label
                    for="password"
                    class="block text-sm font-medium leading-5 text-gray-700"
                  >
                    Payee
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <input
                      placeholder="e.g. Netflix"
                      v-model="form.payee"
                      id="payee"
                      type="text"
                      required
                      class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    />
                    <has-error :form="form" field="bankName" />
                  </div>
                </div>
                <div class="mt-6">
                  <label
                    for="password"
                    class="block text-sm font-medium leading-5 text-gray-700"
                  >
                    Amount
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <input
                      placeholder="$0.00"
                      v-model="form.amount"
                      id="amount"
                      type="decimal"
                      required
                      class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    />
                    <has-error :form="form" field="bankName" />
                  </div>
                </div>
                <div class="mt-6">
                  <label
                    for="password"
                    class="block text-sm font-medium leading-5 text-gray-700"
                  >
                    Notes
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <input
                      placeholder="Optional Notes"
                      v-model="form.notes"
                      id="notes"
                      type="text"
                      required
                      class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    />
                    <has-error :form="form" field="bankName" />
                  </div>
                </div>

                <div class="mt-6">
                  <label
                    for="password"
                    class="block text-sm font-medium leading-5 text-gray-700"
                  >
                    Account
                  </label>
                  <div class="mt-1 rounded-md shadow-sm">
                    <v-select
                      label="account_type"
                      :options="accounts"
                      v-model="form.account"
                      :reduce="(account) => account.id"
                    ></v-select>
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
              v-on:click="closeModal"
              type="button"
              class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out"
            >
              Cancel
            </button>
          </span>
          <span class="inline-flex rounded-md shadow-sm">
            <button
              v-on:click="create"
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
// import AddAccountType from "../components/AddAccountType";

import { mapActions, mapGetters } from "vuex";
import Form from "vform";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";

export default {
  components: {
    //AddAccountType,
    vSelect,
    DatePicker,
  },
  data: () => ({
    form: new Form({
      date: new Date(),
      category: null,
      payee: "",
      amount: "",
      notes: "",
      account: null,
    }),
  }),

  props: ["categories", "accounts"],

  methods: {
    ...mapActions({
      createTransaction: "transactions/createTransaction",
    }),
    closeModal: function () {
      this.$emit("close-modal");
    },

    async create() {
      console.log(this.form);
      try {
        const response = await this.createTransaction({
          data: {
            date: new Date(this.form.date).toISOString().substring(0, 10),
            category_id: this.form.category,
            payee: this.form.payee,
            amount: this.form.amount,
            notes: this.form.notes,
            account_id: this.form.account,
          },
        });

        console.log("RES: ", response)

        if(response.data) {
          console.log('successfully created transaction')
        }
      } catch (err) {
        console.log("ERROR: ", err);
      }
    },

    doStuff: function () {
      console.log("HEY");
    },
  },

  //   directives: {
  //     ClickOutside
  //   }
};
</script>
