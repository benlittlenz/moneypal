<template>
  <div class="bg-white rounded-sm shadow overflow-y-auto relative">
    <table
      class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative"
    >
      <thead>
        <tr class="text-left">
          <th
            class="w-12 py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"
          >
            <label
              class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer"
            >
              <input
                type="checkbox"
                class="form-checkbox focus:outline-none focus:shadow-outline"
              />
            </label>
          </th>

          <th
            class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
          >
            Date
          </th>
          <th
            class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
          >
            Category
          </th>
          <th
            class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
          >
            Payee
          </th>
          <th
            class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
          >
            Type
          </th>
          <th
            class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
          >
            Amount
          </th>
          <th
            class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
          >
            Notes
          </th>
          <th
            class="bg-gray-100 sticky top-0 border-solid border border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs"
          >
            Account
          </th>
        </tr>
      </thead>
      <tbody>
        <template>
          <tr>
            <td class="border-dashed border-t border-gray-200 px-3">
              <label
                class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer"
              >
                <input
                  type="checkbox"
                  class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline"
                />
              </label>
            </td>
            <td class="border-solid border border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >Wed, 23 Dec</span
              >
            </td>
            <td class="border-solid border border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >Coffee</span
              >
            </td>
            <td class="border-solid border border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >Payee</span
              >
            </td>
            <td class="border-solid border border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center">+</span>
            </td>
            <td class="border-solid border border-gray-200 gender">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >$500.00</span
              >
            </td>
            <td class="border-solid border border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >Notes</span
              >
            </td>
            <td class="border-solid border-b border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >Cash Transaction</span
              >
            </td>
          </tr>
          <tr>
            <td class="border-dashed border-t border-gray-200 px-3">
              <label
                class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer"
              >
                <input
                  type="checkbox"
                  class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline"
                />
              </label>
            </td>
            <td class="border-solid border border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >Wed, 23 Dec</span
              >
            </td>
            <td class="border-solid border border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >Coffee</span
              >
            </td>
            <td class="border-solid border border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >Payee</span
              >
            </td>
            <td class="border-solid border border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center">+</span>
            </td>
            <td class="border-solid border border-gray-200 gender">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >$500.00</span
              >
            </td>
            <td class="border-solid border border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >Notes</span
              >
            </td>
            <td class="border-solid border-b border-gray-200">
              <span class="text-gray-700 px-6 py-1 flex items-center"
                >Cash Transaction</span
              >
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {};
</script>