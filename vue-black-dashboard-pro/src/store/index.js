import Vue from 'vue';
import Vuex from 'vuex';

import auth from "./modules/auth";
import alerts from "./modules/alerts-module";
import profile from "./modules/profile-module";
import users from "./modules/users-module";
import roles from "./modules/roles-module";
import categories from "./modules/categories-module";
import tags from "./modules/tags-module";
import items from "./modules/items-module";
import reset from "./modules/reset";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    auth,
    alerts,
    profile,
    users,
    roles,
    categories,
    tags,
    items,
    reset
  }
});
