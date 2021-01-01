<template>
  <section class="absolute inset-y-0 pl-16 max-w-full right-0 flex">
    <div class="w-screen max-w-md">
      <div
        class="h-full divide-y divide-gray-200 flex flex-col bg-gray-50 shadow-xl"
      >
        <div class="flex-1 h-0 overflow-y-auto">
          <header class="space-y-1 py-6 px-4 sm:px-6">
            <div class="flex items-center justify-between space-x-3">
              <h2 class="text-xl leading-7 font-semibold text-gray-900">
                Update Account
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
          </header>
          <div class="mt-6 flex-1 flex flex-col justify-between bg-white">
            <label
              class="border-solid border-b border-gray-200 py-4 text-center block text-lg font-semi-bold leading-5 text-gray-400"
            >
              Account Information
            </label>

            <form action="">
              <div class="px-4 divide-y divide-gray-200 sm:px-6">
                <div class="space-y-6 pt-6 pb-5">
                  <div class="flex items-center">
                    <div class="w-64">
                      <label
                        id="listbox-label"
                        class="block text-sm leading-5 font-medium text-gray-700"
                      >
                        Account Type
                      </label>
                      <v-select
                        :options="accountTypes"
                        v-model="form.account_type"
                      >
                        <!-- <template #search="{ attributes, events }">
                          <input
                            class="vs__search"
                            :required="!editing.form.category"
                            v-bind="attributes"
                            v-on="events"
                          />
                        </template> -->
                      </v-select>
                    </div>
                    <div class="pl-2 w-64">
                      <label
                        id="listbox-label"
                        class="block text-sm leading-5 font-medium text-gray-700"
                      >
                        Account Sub Type
                      </label>
                      <v-select
                        :options="accountSubTypes"
                        v-model="form.sub_type"
                      >
                        <!-- <template #search="{ attributes, events }">
                          <input
                            class="vs__search"
                            :required="!editing.form.category"
                            v-bind="attributes"
                            v-on="events"
                          />
                        </template> -->
                      </v-select>
                    </div>

                    <!-- <AddAccountType
                    v-on:update-type="selectAccountType"
                    :selected="form.account_type"
                  /> -->
                    <!-- <AccountSubTypes :selected="form.sub_type" /> -->
                  </div>

                  <div class="mt-6">
                    <label
                      for="password"
                      class="block text-sm font-medium leading-5 text-gray-700"
                    >
                      Bank
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                      <input
                        :value="data.account_name"
                        id="account_name"
                        type="text"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      />
                      <has-error :form="form" field="account_name" />
                    </div>
                  </div>

                  <div class="mt-6">
                    <label
                      for="password"
                      class="block text-sm font-medium leading-5 text-gray-700"
                    >
                      Account Name
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                      <input
                        v-model="form.bank_name"
                        id="bank_name"
                        type="text"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      />
                      <has-error :form="form" field="bank_name" />
                    </div>
                  </div>
                  <div class="mt-6">
                    <label
                      for="password"
                      class="block text-sm font-medium leading-5 text-gray-700"
                    >
                      Current Balance
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                      <input
                        v-model="form.balance"
                        id="balance"
                        type="decimal"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      />
                      <has-error :form="form" field="balance" />
                    </div>
                    <label
                      class="pt-2 block text-xs font-semi-bold leading-5 text-gray-400"
                    >
                      BALANCE LAST UPDATED <b>{{ updated_at }}</b>
                    </label>
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
                    type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out"
                  >
                    Save
                  </button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import AddAccountType from "./AddAccountType";
import AccountSubTypes from "./AccountSubTypes";
import Form from "vform";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";

import moment from "moment";

export default {
  props: ["account"],
  components: {
    AddAccountType,
    AccountSubTypes,
    vSelect,
  },
  data: () => ({
    data: null,
    updated_at: null,
    form: new Form({
      account_name: "",
      account_type: "",
      bank_name: "",
      sub_type: "",
      balance: null,
      status: "",
    }),
    accountTypes: [
      "Cash",
      "Credit",
      "Investment",
      "Loan",
      "Property",
      "Cryptocurrency",
      "Other",
    ],
    accountSubTypes: [
      "Checkings",
      "Savings",
      "Cash",
      "Credit Card",
      "Retirement",
      "Brokerage",
      "Mortage",
      "Student Loan",
      "Car Loan",
      "Line of Credit",
      "Residence",
      "Investment Property",
      "Vacation Property",
      "Commerical",
      "Land",
      "Car",
      "Motorbike",
      "Boat",
      "Scooter",
    ],
  }),

  created() {
    this.data = this.account;
    this.form.account_name = this.account.account_name;
    this.form.account_type = this.account.account_type;
    this.form.bank_name = this.account.bank_name;
    this.form.sub_type = this.account.sub_type;
    this.form.balance = this.account.balance;
    this.form.status = this.account.status;

    this.updated_at = moment(this.account.updated_at).fromNow();
  },

  methods: {
    closeModal: function () {
      console.log("clicked close");
      this.$emit("close-modal");
    },

    selectAccountType: function (value) {
      console.log("trigger: ", value);
      console.log(this.form);
      this.form.account_type = value;
    },

    doStuff: function () {
      console.log("HEY");
    },
  },

  // directives: {
  //   //ClickOutside
  // }
};
</script>
