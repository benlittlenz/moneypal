import axios from 'axios'
import * as types from '../mutation-types'

export const state = {
    accounts: []
}

//getters
export const getters = {
    accounts: state => state.accounts,
}

// mutations
export const mutations = {
    [types.FETCH_ACCOUNTS](state, { accounts }) {
        state.accounts = accounts
    }
}

// actions
export const actions = {
    async fetchAccounts ({ commit }) {
        try {
          const { data } = await axios.get('/api/accounts')
          console.log(data)

          commit(types.FETCH_ACCOUNTS, { accounts: data })
        } catch (e) {
            console.log("ERROR", e)
          //commit(types.FETCH_USER_FAILURE)
        }
      },
}