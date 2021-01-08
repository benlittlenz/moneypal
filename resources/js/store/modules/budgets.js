import axios from 'axios'
import * as types from '../mutation-types'

export const state = {
    budgets: []
}

//getters
export const getters = {
    budgets: state => state.budgets,
}

// mutations
export const mutations = {
    [types.FETCH_BUDGETS](state, { budgets }) {
        state.budgets = budgets
    },
    // [types.UPDATE_CATEGORY] (state, data ) {
    //     console.log('state', state)
    //     console.log('data', data)
    //     // state.categories.data = data

    //     // console.log("cat id: ", state.category.data.id)
    //     // console.log("data id: ", data.id)
    //     state.categories.data = state.categories.data.map(category => {
    //         if (category.id === data.id) {
    //           return Object.assign({}, category, data)
    //         }
    //         return category
    //       })
    // }
}

// actions
export const actions = {
    async fetchBudgets({ commit }, {month, year}) {
        try {
            console.log("month: ", month)
            console.log("year: ", year)
            const { data } = await axios.get(`/api/budgets/${month}/${year}`)
            console.log(data)

            commit(types.FETCH_BUDGETS, { budgets: data })
        } catch (e) {
            console.log("ERROR", e)
            //commit(types.FETCH_USER_FAILURE)
        }
    },
    async updateBudget({ commit }, payload) {
        // const categoryID = payload.id
        console.log("payload: ", payload)
        const budgetID = payload.data.budget_id
        // console.log(payload)
        //commit(types.UPDATE_BUDGET, payload)
        return await axios.patch(`/api/budgets/${budgetID}`, {
            budget_amount: payload.data.budget_amount
        })
    },
}