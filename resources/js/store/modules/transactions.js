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
        state.transactions = transactions
    },

    [types.CREATE_TRANSACTION](state, { data }) {
        state.transactions.data.push({ data })
    }
}

// actions
export const actions = {
    async fetchTransactions ({ commit }) {
        try {
          const { data } = await axios.get('/api/transactions')
          console.log(data)

          commit(types.FETCH_TRANSACTIONS, { transactions: data })
        } catch (e) {
            console.log("ERROR", e)
          //commit(types.FETCH_USER_FAILURE)
        }
      },

    async createTransaction ({ commit }, { data }) {
        console.log("DATA", data)
        commit(types.CREATE_TRANSACTION, { data })

        return await axios.post('/api/transactions', data)
    }
}