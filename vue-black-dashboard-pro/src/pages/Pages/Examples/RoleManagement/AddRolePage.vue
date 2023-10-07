<template>
<card class="stacked-form" title="Add Role">
  <div class="col-12 text-right">
    <base-button @click="goBack" type="button" class="btn btn-sm btn-primary">Back to list</base-button>
  </div>
  <form @submit.prevent>
    <div>
      <base-input v-model="role.name" label="Name" placeholder="Name"/>
      <validation-error :errors="apiValidationErrors.name" />
      <base-button @click="add()" class="mt-3" native-type="submit" type="primary">Submit</base-button>
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
        type: 'roles',
        name: null,
      }
    }),

    methods: {

      async add() {
        try {
          await this.$store.dispatch("roles/add", this.role)
          this.$notify({
            type: 'success',
            message: 'Role added successfully.',
            icon: 'tim-icons icon-bell-55',
          })
          this.role = await this.$store.getters["roles/role"]
          this.goBack();
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