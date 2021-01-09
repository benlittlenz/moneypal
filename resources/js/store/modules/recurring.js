import axios from 'axios'
import * as types from '../mutation-types'

export const state = {
    recurrings: []
}

//getters
export const getters = {
    recurrings: state => state.recurrings,
}

// mutations
export const mutations = {
    [types.CREATE_RECURRING](state, { data }) {
        console.log('hello', data)
        //state.recurrings.data.push({ data })
    },

}

// actions
export const actions = {
    async createRecurring({ commit }, { data }) {
        console.log("DATA", data)
        commit(types.CREATE_RECURRING, { data })

        return await axios.post('/api/recurrings', data)
    },
}