<template>
<card class="stacked-form" title="Edit Role">
  <div class="col-12 text-right">
    <base-button @click="goBack" type="button" class="btn btn-sm btn-primary">Back to list</base-button>
  </div>
  <form @submit.prevent>
    <div>
      <base-input v-model="role.name" label="Name" placeholder="Name"/>
      <validation-error :errors="apiValidationErrors.name" />
      <base-button @click="update()" class="mt-3" native-type="submit" type="primary">Submit</base-button>
    </div>
  </form>
</card>
</template>

<script>
  import ValidationError from "src/components/ValidationError.vue";
  import formMixin from "@/mixins/form-mixin";

  export default {

    components: {ValidationError},

    mixins: [formMixin],

    data: () => ({
      role: {
        name: null,
        type: 'role'
      }
    }),

    created() {
      this.get()
    },

    methods: {

      async get() {
        try {
          const id = this.$route.params.id
          await this.$store.dispatch("roles/get", id)
          this.role = this.$store.getters["roles/role"]
        } catch (e) {
          this.$notify({
            type: 'success',
            message: 'Oops, something went wrong!',
            icon: 'tim-icons icon-bell-55',
          })
        }
      },

      async update() {
        if (this.$isDemo == 1 && ["1","2","3"].includes(this.$route.params.id)) {
          this.$notify({
            type: "danger",
            message: "You are not allowed to change data of default roles.",
            icon: 'tim-icons icon-bell-55',
          });
          return;
        }
        try {
          await this.$store.dispatch("roles/update", this.role)
          this.$notify({
            type: 'success',
            message: 'Role updated successfully.',
            icon: 'tim-icons icon-bell-55',
          })
          this.goBack()
        } catch (e) {
          this.$notify({
            type: 'danger',
            message: 'Oops, something went wrong!',
            icon: 'tim-icons icon-bell-55',
          })
          this.setApiValidation(e.response.data.errors)
        }
      },

      goBack() {
        this.$router.push({name: 'List Roles'})
      }
    }
  }
</script>