<template>
<card class="stacked-form" title="Edit Category">
  <div class="col-12 text-right">
    <base-button @click="goBack" type="button" class="btn btn-sm btn-primary">Back to list</base-button>
  </div>
  <form @submit.prevent>
    <div>
      <base-input v-model="category.name" label="Name" placeholder="Name"/>
      <validation-error :errors="apiValidationErrors.name" />
      <base-input v-model="category.description" label="Description" placeholder="Description"/>
      <validation-error :errors="apiValidationErrors.description" />
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
      category: {
        name: null,
        description: null,
        type: 'categories'
      }
    }),

    created() {
      this.get()
    },

    methods: {

      async get() {
        try {
          const id = this.$route.params.id
          await this.$store.dispatch("categories/get", id)
          this.category = this.$store.getters["categories/category"]
        } catch (e) {
          this.$notify({
            type: 'success',
            message: 'Oops, something went wrong!',
            icon: 'tim-icons icon-bell-55',
          })
        }
      },

      async update() {
        if (this.$isDemo == 1 && ["1","2"].includes(this.$route.params.id)) {
          this.$notify({
            type: "danger",
            message: "You are not allowed to change data of default categories.",
            icon: 'tim-icons icon-bell-55',
          });
          return;
        }
        try {
          await this.$store.dispatch("categories/update", this.category)
          this.$notify({
            type: 'success',
            message: 'Category updated successfully.',
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
        this.$router.push({name: 'List Categories'})
      }
    }
  }
</script>