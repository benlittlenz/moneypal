import axios from 'axios'
import * as types from '../mutation-types'

export const state = {
    transactions: []
}

//getters
export const getters = {
    transactions: state => state.transactions,
}

export const getTransactions = async ({ commit }) => {
    let res = await axios.get('/api/projects');
    commit('FETCH_TRANSACTIONS', res.data.data)

    return res;
}

export const FETCH_TRANSACTIONS = (state, projects) => {
    state.projects = projects;
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
    fetchTransactions({ commit }, payload) {
        console.log('PAYLOAD', payload)
        commit(types.FETCH_TRANSACTIONS, payload)
    },

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