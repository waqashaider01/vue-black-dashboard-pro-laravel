<template>
<card class="stacked-form" title="Add Category">
  <div class="col-12 text-right">
    <base-button @click="goBack" type="button" class="btn btn-sm btn-primary">Back to list</base-button>
  </div>
  <form @submit.prevent>
    <div>
      <base-input v-model="category.name" label="Name" placeholder="Name"/>
      <validation-error :errors="apiValidationErrors.name" />
      <base-input v-model="category.description" label="Description" placeholder="Description"/>
      <validation-error :errors="apiValidationErrors.description" />
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
      category: {
        type: 'categories',
        name: null,
        description: null,
      }
    }),

    methods: {
      async add() {
        try {
          await this.$store.dispatch("categories/add", this.category)
          this.$notify({
            type: 'success',
            message: 'Category added successfully.',
            icon: 'tim-icons icon-bell-55',
          })
          this.category = await this.$store.getters["categories/category"]
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
        this.$router.push({name: 'List Categories'})
      }
    }
  }
</script>