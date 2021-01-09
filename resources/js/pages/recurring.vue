<template>
  <div class="mx-auto mt-20 w-11/12">
    <flash-message></flash-message>
    <div class="rounded-lg">
      <button
        v-on:click="createRecurring = true"
        class="flex mr-2 focus:cursor-pointer focus:outline-none bg-purple-400 text-white py-2 px-4 rounded-lg font-bold"
      >
        <svg
          class="w-6 h-6 bg-purple-600 text-white rounded-full"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
          ></path>
        </svg>
        <span class="ml-2">Add Recurring Item</span>
      </button>
    </div>

    <div class="flex items-center mt-4">
      <div class="flex flex-1 pr-4">
        <div class="relative md:w-1/3">
          <input
            type="search"
            class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
            placeholder="Search..."
          />
          <div class="absolute top-0 left-0 inline-flex items-center p-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="w-6 h-6 text-gray-400"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="currentColor"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
              <circle cx="10" cy="10" r="7" />
              <line x1="21" y1="21" x2="15" y2="15" />
            </svg>
          </div>
        </div>
      </div>
      <div>
        <button
          type="button"
          @click="open = !open"
          class="flex items-center text-gray-700 px-3 py-1 border font-medium rounded"
        >
          <svg
            viewBox="0 0 24 24"
            preserveAspectRatio="xMidYMid meet"
            class="w-5 h-5 mr-1"
          >
            <g class="">
              <path d="M0 0h24v24H0z" fill="none" class=""></path>
              <path
                d="M3 17v2h6v-2H3zM3 5v2h10V5H3zm10 16v-2h8v-2h-8v-2h-2v6h2zM7 9v2H3v2h4v2h2V9H7zm14 4v-2H11v2h10zm-6-4h2V7h4V5h-4V3h-2v6z"
                class=""
              ></path>
            </g>
          </svg>
          Filter
        </button>
      </div>
    </div>

    <div class="bg-white rounded-sm shadow overflow-y-auto relative mt-2">
      <div v-if="recurrings.length === 0">Loading...</div>
      <div v-else>
        <table
          class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative"
        >
          <thead>
            <tr class="text-left h-6">
              <th
                class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Payee
              </th>
              <th
                class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Category
              </th>
              <th
                class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Account
              </th>
              <th
                class="text-center bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Description
              </th>
              <th
                class="w-40 text-center bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Repeating Cycle
              </th>
              <th
                class="w-40 text-center bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Billing Date
              </th>
              <th
                class="w-40 text-center bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              >
                Amount
              </th>
              <th
                class="w-4 bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
              ></th>
            </tr>
          </thead>
          <tbody>
            <template>
              <tr
                v-for="recurring in recurrings.data"
                :key="recurring.id"
                class="max-h-2 hover:bg-gray-50 cursor-pointer"
                v-on:click="updateRecurring(recurring)"
              >
                <td class="border-solid border border-gray-200">
                  <span class="text-gray-700 px-6 py-1 flex items-center">{{
                    recurring.merchant
                  }}</span>
                </td>
                <td class="border-solid border border-gray-200">
                  <span class="text-gray-700 px-6 py-1 flex items-center">{{
                    recurring.category.display_name
                  }}</span>
                </td>
                <td class="border-solid border border-gray-200">
                  <span class="text-gray-700 px-6 py-1 flex items-center">{{
                    recurring.account.account_name
                  }}</span>
                </td>
                <td class="border-solid border border-gray-200">
                  <span class="text-gray-700 px-6 py-1 flex items-center">{{
                    recurring.description
                  }}</span>
                </td>
                <td class="border-solid border border-gray-200">
                  <span class="text-gray-700 px-6 py-1 flex items-center">{{
                    recurring.repeating_cadence
                  }}</span>
                </td>
                <td class="border-solid border border-gray-200">
                  <span class="text-gray-700 px-6 py-1 flex items-center">{{
                    moment(recurring.billing_date).format("DD/MM/YYYY")
                  }}</span>
                </td>
                <td class="border-solid border border-gray-200">
                  <span class="text-gray-700 px-6 py-1 flex items-center">$ {{
                    recurring.amount
                  }}</span>
                </td>
                <td class="border-solid border border-gray-200">
                  <div class="flex flex-col justify-center items-center">
                    <span class="">
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
                          d="M9 5l7 7-7 7"
                        ></path>
                      </svg>
                    </span>
                  </div>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
      </div>
    </div>

    <div v-if="createRecurring === true">
      <AddRecurringSideModal
        v-on:close-modal="closeModal"
        :categories="categories.data"
        :accounts="accounts.data"
      />
    </div>
    <div v-if="editRecurring === true">
      <EditRecurringSideModal
        v-on:close-modal="closeModal"
          :recurring="recurring"
          :accounts="accounts.data"
          :categories="categories.data"
        />
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Form from "vform";
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";

import AddRecurringSideModal from "../components/Recurring/AddRecurringSideModal";
import EditRecurringSideModal from "../components/Recurring/EditRecurringSideModal";

export default {
  data: () => ({
    loading: true,
    createRecurring: false,
    editRecurring: false,
    recurring: null,
  }),
  components: {
    vSelect,
    DatePicker,
    AddRecurringSideModal,
    EditRecurringSideModal,
  },

  mounted() {
    console.log("loaded");
    this.fetchRecurrings();
  },

  computed: mapGetters({
    recurrings: "recurrings/recurrings",
    categories: "categories/categories",
    accounts: "accounts/accounts",
  }),

  methods: {
    closeModal() {
      this.editRecurring = false;
      this.createRecurring = false;
    },

    async fetchRecurrings() {
      // Fetch Recurring items
      await this.$store.dispatch("recurrings/fetchRecurrings");
      //Fetch categories
      await this.$store.dispatch("categories/fetchCategories");
      //Fetch Accounts
      await this.$store.dispatch("accounts/fetchAccounts");
      this.loading = false;
    },

    updateRecurring(record) {
      console.log(record);
      this.editRecurring = true;
      this.recurring = record;
    },
  },
};
</script>
