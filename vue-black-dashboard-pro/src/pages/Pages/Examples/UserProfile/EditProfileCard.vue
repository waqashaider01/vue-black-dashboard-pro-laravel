<template>
  <card class="stacked-form" title="Stacked Form">
    <h4 slot="header" class="card-title">Edit Profile</h4>
    <form @submit.prevent>
      <div>
        <div class="col-md-4 col-sm-4">
          <h4 class="card-title">Profile Photo</h4>
          <image-upload
            type="avatar"
            select-text="Add photo"
            @change="onAvatarChange"
          />
        </div>
        <validation-error :errors="apiValidationErrors.attachment" />
        <base-input
          v-model="user.email"
          label="Email"
          type="email"
          placeholder="Enter email"
        />
        <validation-error :errors="apiValidationErrors.email" />
        <base-input v-model="user.name" label="Name" placeholder="Name" />
        <validation-error :errors="apiValidationErrors.name" />
        <base-button
          @click="updateProfile()"
          class="mt-3"
          native-type="submit"
          type="primary"
          >Submit</base-button
        >
      </div>
    </form>
  </card>
</template>

<script>
import { ImageUpload } from "src/components/index";
import ValidationError from "src/components/ValidationError.vue";
import formMixin from "@/mixins/form-mixin";
export default {
  mixins: [formMixin],
  components: {
    ImageUpload,
    ValidationError,
  },
  props: {
    user: Object,
  },
  data() {
    return {
      images: {
        avatar: null,
      },
    };
  },
  methods: {
    onAvatarChange(file) {
      this.images.avatar = file;
    },
    async updateProfile() {
      if (this.$isDemo == 1 && ["1", "2", "3"].includes(this.user.id)) {
        this.$notify({
          type: "danger",
          message: "You are not allowed to change data of default users.",
          icon: "tim-icons icon-bell-55",
        });
        return;
      }
      try {
        this.resetApiValidation();
        if (this.images.avatar) {
          await this.$store.dispatch("users/upload", {
            user: this.user,
            image: this.images.avatar,
          });
          this.user.profile_image = await this.$store.getters["users/url"];
        }

        await this.$store.dispatch("profile/update", this.user);
        this.$notify({
          type: "success",
          message: "Profile updated successfully.",
          icon: "tim-icons icon-bell-55",
        });
        await this.$store.getters["profile/me"];
      } catch (e) {
        this.$notify({
          type: "danger",
          message: "Oops, something went wrong!",
          icon: "tim-icons icon-bell-55",
        });
        this.setApiValidation(e.response.data.errors);
      }
    },
  },
};
</script>