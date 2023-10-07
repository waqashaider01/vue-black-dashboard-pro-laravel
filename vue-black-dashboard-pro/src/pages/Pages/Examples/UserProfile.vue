<template>
  <div v-if="user" class="row">
    <div class="col-md-8">
        <user-edit-card :user="user"/>
        <user-password-card :user="user"/>
    </div>
    <div class="col-md-4">
      <user-card />
    </div>
  </div>
</template>

<script>
  import UserEditCard from "@/pages/Pages/Examples/UserProfile/EditProfileCard.vue";
  import UserPasswordCard from "@/pages/Pages/Examples/UserProfile/EditPasswordCard.vue";
  import UserCard from "@/pages/Pages/UserProfile/UserCard.vue"

  export default {
    // name: "user-profile-example",

    components: {
      UserPasswordCard,
      UserEditCard,
      UserCard
    },

    data: () => ({
      user: null
    }),

    created() {
      this.getProfile();
    },

    methods: {
      async getProfile() {
        await this.$store.dispatch("profile/me")
        this.user = await this.$store.getters["profile/me"]
      }
    }
  }
</script>