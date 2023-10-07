<template>
<card class="stacked-form" title="Edit Tag">
  <div class="col-12 text-right">
    <base-button @click="goBack" type="button" class="btn btn-sm btn-primary">Back to list</base-button>
  </div>
  <form @submit.prevent="update">
    <div>
      <base-input v-model="tag.name" label="Name" placeholder="Name"/>
      <validation-error :errors="apiValidationErrors.name" />
      <base-input label="Color">
        <color-picker v-model="color" style="width: 100%" />
      </base-input>
      <validation-error :errors="apiValidationErrors.color" />
      <base-button class="mt-3" native-type="submit" type="primary">Submit</base-button>
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
        name: null,
        color: null,
        type: 'tags'
      },
      color: {
        hex: '#FF0000'
      }
    }),

    created() {
      this.get()
    },

    watch: {
      color: {
        handler: 'updateTagColor',
        immediate: true,
        deep: true
      },
    },

    methods: {
      updateTagColor() {
        this.tag.color = this.color.hex;
      },
      
      async get() {
        try {
          const id = this.$route.params.id
          await this.$store.dispatch("tags/get", id)
          this.tag = this.$store.getters["tags/tag"]
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
            message: "You are not allowed to change data of default tags.",
            icon: 'tim-icons icon-bell-55',
          });
          return;
        }
        try {
          await this.$store.dispatch("tags/update", this.tag)
          this.$notify({
            type: 'success',
            message: 'Tag updated successfully.',
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
        this.$router.push({name: 'List Tags'})
      }
    }
  }
</script>