import service from '@/store/services/roles-service';

const state = {
  list: {},
  role: {},
  meta: {}
};

const mutations = {
  SET_LIST: (state, list) => {
    state.list = list;
  },
  SET_RESOURCE: (state, role) => {
    state.role = role;
  },
  SET_META: (state, meta) => {
    state.meta = meta;
  }
};

const actions = {
  list({commit, dispatch}, params = {}) {
    return service.list(params)
      .then(({list, meta}) => {
        commit('SET_LIST', list);
        commit('SET_META', meta);
      });
  },

  get({commit, dispatch}, params) {
    return service.get(params)
      .then((role) => { commit('SET_RESOURCE', role); });
  },

  add({commit, dispatch}, params) {
    return service.add(params)
      .then((role) => { commit('SET_RESOURCE', role); });
  },

  update({commit, dispatch}, params) {
    return service.update(params)
      .then((role) => { commit('SET_RESOURCE', role); });
  },

  destroy({commit, dispatch}, params) {
    return service.destroy(params);
  },
};

const getters = {
  list: state => state.list,
  listTotal: state => state.meta.page.total,
  role: state => state.role,
  dropdown: (state) => {
    return state.list.map(role => ({
      id: role.id,
      name: role.name
    }));
  }
};

const roles = {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
};

export default roles;
