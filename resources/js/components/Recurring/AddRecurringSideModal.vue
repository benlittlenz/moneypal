<template>
  <section class="absolute inset-y-0 pl-16 max-w-full right-0 flex">
    <div class="w-screen max-w-md">
      <div
        class="h-full divide-y divide-gray-200 flex flex-col bg-gray-50 shadow-xl px-4"
      >
        <div class="flex-1 h-0 overflow-y-auto">
          <header class="space-y-1 py-6 px-4 sm:px-6">
            <div class="flex items-center justify-between space-x-3">
              <h2 class="text-xl leading-7 font-semibold text-gray-900">
                Create Recurring Item
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
              Recurring Details
            </label>
          </div>
          <form @submit.prevent="create">
            <div>
              <div>
                <div class="px-4 divide-y divide-gray-200 sm:px-6 bg-white">
                  <div class="space-y-6 pt-6 pb-5">
                    <div class="mt-6">
                      <label
                        for="merchant"
                        class="block text-sm font-medium leading-5 text-gray-700"
                      >
                        Payee
                      </label>
                      <div class="mt-1 rounded-md shadow-sm">
                        <input
                          v-model="form.merchant"
                          id="merchant"
                          type="text"
                          placeholder="Netflix"
                          required
                          class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                        />
                        <has-error :form="form" field="merchant" />
                      </div>
                    </div>

                    <div class="mt-6">
                      <label
                        for="billing_date"
                        class="block text-sm font-medium leading-5 text-gray-700"
                      >
                        Billing Date
                      </label>
                      <div class="mt-1">
                        <date-picker
                          v-model="form.billing_date"
                          type="date"
                          format="DD/MM/YYYY"
                        ></date-picker>
                      </div>
                    </div>
                    <div class="mt-6">
                      <label
                        for="repeating_cadence"
                        class="block text-sm font-medium leading-5 text-gray-700"
                      >
                        Repeating Cycle
                      </label>
                      <div class="mt-1 rounded-md shadow-sm">
                        <v-select
                          label="repeating_cadence"
                          :options="cadence"
                          v-model="form.repeating_cadence"
                        >
                          <template #search="{ attributes, events }">
                            <input
                              class="vs__search"
                              :required="!form.repeating_cadence"
                              v-bind="attributes"
                              v-on="events"
                            />
                          </template>
                        </v-select>
                        <has-error :form="form" field="repeating_cadence" />
                      </div>
                    </div>
                    <div class="mt-6">
                      <label
                        for="category_id"
                        class="block text-sm font-medium leading-5 text-gray-700"
                      >
                        Category
                      </label>
                      <div class="mt-1 rounded-md shadow-sm">
                        <v-select
                          label="display_name"
                          :options="categories"
                          v-model="form.category_id"
                          :reduce="(category) => category.id"
                        >
                          <template #search="{ attributes, events }">
                            <input
                              class="vs__search"
                              :required="!form.category_id"
                              v-bind="attributes"
                              v-on="events"
                            />
                          </template>
                        </v-select>
                        <has-error :form="form" field="category_id" />
                      </div>
                    </div>
                    <div class="mt-6">
                      <label
                        for="account_id"
                        class="block text-sm font-medium leading-5 text-gray-700"
                      >
                        Account
                      </label>
                      <div class="mt-1 rounded-md shadow-sm">
                        <v-select
                          label="account_name"
                          :options="accounts"
                          v-model="form.account_id"
                          :reduce="(account) => account.id"
                        >
                          <template #search="{ attributes, events }">
                            <input
                              class="vs__search"
                              :required="!form.account_id"
                              v-bind="attributes"
                              v-on="events"
                            /> </template
                        ></v-select>
                        <has-error :form="form" field="bankName" />
                      </div>
                    </div>

                    <div class="mt-6">
                      <label
                        for="description"
                        class="block text-sm font-medium leading-5 text-gray-700"
                      >
                        Description
                      </label>
                      <div class="mt-1 rounded-md shadow-sm">
                        <input
                          v-model="form.description"
                          id="description"
                          type="text"
                          placeholder="Movie Streaming"
                          required
                          class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                        />
                        <has-error :form="form" field="description" />
                      </div>
                    </div>

                    <div class="mt-6">
                      <label
                        for="amount"
                        class="block text-sm font-medium leading-5 text-gray-700"
                      >
                        Amount
                      </label>
                      <div class="mt-1 rounded-md shadow-sm">
                        <input
                          v-model="form.amount"
                          id="amount"
                          type="decimal"
                          placeholder="$0.00"
                          required
                          class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                        />
                        <has-error :form="form" field="amount" />
                      </div>
                    </div>
                  </div>
                </div>

                <div
                  class="absolute bottom-0 right-0 mr-6 mb-6 flex-shrink-0 px-4 py-4 space-x-4 flex justify-end"
                >
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
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import Form from "vform";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";

export default {
  props: ["accounts", "categories"],
  components: {
    vSelect,
    DatePicker,
  },
  data: () => ({
    cadence: [
      "Monthly",
      "Weekly",
      "Fortnightly",
      "Every 2 Months",
      "Twice a Year",
      "Every Year",
    ],
    form: new Form({
      merchant: "",
      repeating_cadence: "",
      billing_date: new Date(),
      category_id: null,
      description: null,
      account_id: null,
      amount: null,
    }),
  }),

  methods: {
    ...mapActions({
      createRecurring: "recurrings/createRecurring",
    }),
    closeModal: function () {
      console.log("clicked close");
      this.$emit("close-modal");
    },

    doStuff: function () {
      console.log("HEY");
    },

    async create() {
      console.log(this.form);
      try {
        const response = await this.createRecurring({
          data: {
            merchant: this.form.merchant,
            repeating_cadence: this.form.repeating_cadence,
            billing_date: this.form.billing_date
              ? new Date(this.form.billing_date).toISOString().substring(0, 10)
              : new Date().toISOString().substring(0, 10),
            category_id: this.form.category_id,
            description: this.form.description,
            account_id: this.form.account_id,
            amount: this.form.amount,
          },
        });

        console.log("RES: ", response);
        this.$emit("close-modal");
        if (response.data) {
          console.log("successfully created category!");
          Bus.$emit("flash-message", {
            type: "success",
            text: "Recurring item successfully created!",
          });
        }
      } catch (err) {
        console.log("ERROR: ", err);
      }
    },
  },

  // directives: {
  //   //ClickOutside
  // }
};
</script>
