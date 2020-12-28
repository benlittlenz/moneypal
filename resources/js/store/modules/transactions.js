import axios from 'axios'
import * as types from '../mutation-types'

export const state = {
    transactions: []
}

//getters
export const getters = {
    transactions: state => state.transactions,
}

// mutations
export const mutations = {
    [types.FETCH_TRANSACTIONS](state, { transactions }) {
        console.log(transactions)
        state.transactions = transactions
    }
}

// actions
export const actions = {
    async fetchTransactions ({ commit }) {
        try {
          const { data } = await axios.get('/api/transactions')

          commit(types.FETCH_TRANSACTIONS, { transactions: data })
        } catch (e) {
            console.log("ERROR", e)
          //commit(types.FETCH_USER_FAILURE)
        }
      },
}