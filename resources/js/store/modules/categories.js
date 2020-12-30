import axios from 'axios'
import * as types from '../mutation-types'

export const state = {
    categories: []
}

//getters
export const getters = {
    categories: state => state.categories,
}

// mutations
export const mutations = {
    [types.FETCH_CATEGORIES](state, { categories }) {
        state.categories = categories
    }
}

// actions
export const actions = {
    async fetchCategories ({ commit }) {
        try {
          const { data } = await axios.get('/api/categories')
          console.log(data)

          commit(types.FETCH_CATEGORIES, { categories: data })
        } catch (e) {
            console.log("ERROR", e)
          //commit(types.FETCH_USER_FAILURE)
        }
      },
}