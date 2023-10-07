import store from "../store";

export default async function admin_creator({ next, router }) {
  await store.dispatch("profile/me");
  let me = await store.getters["profile/me"];

  if (store.getters.isAuthenticated && me.roles[0].name!=='admin' && me.roles[0].name!=='creator') {
    return router.push({ path: "/dashboard" });
  }

  return next();
}
