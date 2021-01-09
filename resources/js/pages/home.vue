<template>
  <card>
    <div class="flex flex-wrap -mx-4">
      <div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
        <div
          class="flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden"
        >
          <div class="flex items-center border-b">
            <div class="flex-none justify-between px-6 -mb-px">
              <h3 class="text-blue-dark py-4 font-normal text-lg">
                Accounts Overview
              </h3>
            </div>

            <div class="flex flex-grow justify-end items-center mr-2">
              <div
                class="hover:bg-gray-200 rounded-lg cursor-pointer py-2 px-4"
              >
                <button
                  v-on:click="addAcountModal = true"
                  class="flex mr-2 focus:outline-none"
                >
                  <svg
                    class="w-6 h-6 bg-green-500 text-white rounded-full"
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
                  <span class="ml-2">Add Account</span>
                </button>
              </div>
            </div>
          </div>

          <div v-if="loading">Loading...</div>
          <div v-else>
            <template>
              <div v-for="account in accounts.data" :key="account.id">
                <div
                  class="flex items-center py-2 px-2 text-grey-darker border-b -mx-4"
                >
                  <div class="w-2/5 xl:w-1/4 px-4 flex items-center">
                    <div class="rounded-full bg-grey inline-flex mr-3"></div>
                    <span class="text-lg">{{account.account_name}}</span>
                  </div>

                  <div class="flex flex-grow justify-end">
                    <div class="w-1/2 px-4">
                      <div class="text-right text-grey mr-6">${{account.balance}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </template>
          </div>

          <div class="flex justify-end px-4 py-4 bg-gray-100">
            <div class="text-center text-grey">
              Total Balance &asymp; $14,000.00
            </div>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-1/2 px-4">
        <div class="bg-white border-t border-b sm:rounded sm:border shadow">
          <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
              <h3 class="text-blue-dark py-4 font-normal text-lg">
                Recent Activity
              </h3>
            </div>
          </div>
          <div>
            <div class="text-center px-6 py-4">
              <div class="py-8">
                <div class="mb-4">
                  <svg
                    class="inline-block fill-current text-grey h-16 w-16"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M11.933 13.069s7.059-5.094 6.276-10.924a.465.465 0 0 0-.112-.268.436.436 0 0 0-.263-.115C12.137.961 7.16 8.184 7.16 8.184c-4.318-.517-4.004.344-5.974 5.076-.377.902.234 1.213.904.959l2.148-.811 2.59 2.648-.793 2.199c-.248.686.055 1.311.938.926 4.624-2.016 5.466-1.694 4.96-6.112zm1.009-5.916a1.594 1.594 0 0 1 0-2.217 1.509 1.509 0 0 1 2.166 0 1.594 1.594 0 0 1 0 2.217 1.509 1.509 0 0 1-2.166 0z"
                    />
                  </svg>
                </div>
                <p class="text-2xl text-grey-darker font-medium mb-4">
                  No buys or sells yet
                </p>
                <p class="text-grey max-w-xs mx-auto mb-6">
                  You've successfully linked a payment method and can start
                  buying digital currency.
                </p>
                <div>
                  <button
                    type="button"
                    class="bg-blue hover:bg-blue-dark text-white border border-blue-dark rounded px-6 py-4"
                  >
                    Buy now
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div v-if="addAcountModal === true">
        <AddAccountSideModal v-on:close-dialog="closeDialog" />
    </div> -->
    </div>
  </card>
</template>

<script>
import { mapGetters } from "vuex";
import AddAccountSideModal from "../components/AddAccountSideModal";

export default {
  components: {
    AddAccountSideModal,
  },

  data: () => ({
    addAcountModal: false,
    loading: true,
  }),

  mounted() {
    console.log("loaded");
    this.fetchAccounts();
  },

  computed: mapGetters({
    accounts: "accounts/accounts",
  }),

  middleware: "auth",

  metaInfo() {
    return { title: this.$t("home") };
  },

  methods: {
    closeDialog: function () {
      this.addAcountModal = false;
    },

    async fetchAccounts() {
      //Fetch Accounts
      await this.$store.dispatch("accounts/fetchAccounts");
      this.loading = false;
    },

    doStuff: function () {
      console.log("HEY");
    },
  },
};
</script>
