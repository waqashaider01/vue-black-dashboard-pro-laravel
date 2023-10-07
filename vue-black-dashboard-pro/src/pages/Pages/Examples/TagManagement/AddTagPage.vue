<template>
<card class="stacked-form" title="Add Tag">
  <div class="col-12 text-right">
    <base-button @click="goBack" type="button" class="btn btn-sm btn-primary">Back to list</base-button>
  </div>
  <form @submit.prevent>
    <div>
      <base-input v-model="tag.name" label="Name" placeholder="Name"/>
      <validation-error :errors="apiValidationErrors.name" />
      <base-input label="Color">
        <color-picker v-model="color" style="width: 100%" />
      </base-input>
      <validation-error :errors="apiValidationErrors.color" />
      <base-button @click="add()" class="mt-3" native-type="submit" type="primary">Submit</base-button>
    </div>
  </form>
</card>
</template>

<script>
  import ValidationError from "src/components/ValidationError.vue";
  import formMixin from "@/mixins/form-mixin";
  import { Slider } from "vue-color";

  export default {

    components: {
      ValidationError,
      "color-picker": Slider,
      },

    mixins: [formMixin],

    data: () => ({
      tag: {
        type: 'tags',
        name: null,
        color: null,
      },
      color: {
        hex: "#A1FF00",
      }
    }),

    watch: {
      color: {
        handler: "updateTagColor",
        immediate: true,
        deep: true,
      },
    },

    methods: {
      updateTagColor() {
        this.tag.color = this.color.hex;
      },
      
      async add() {
        try {
          await this.$store.dispatch("tags/add", this.tag)
          this.$notify({
            type: 'success',
            message: 'Tag added successfully.',
            icon: 'tim-icons icon-bell-55',
          })
          this.role = await this.$store.getters["tags/tag"]
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
        this.$router.push({name: 'List Tags'})
      }
    }
  }
</script>