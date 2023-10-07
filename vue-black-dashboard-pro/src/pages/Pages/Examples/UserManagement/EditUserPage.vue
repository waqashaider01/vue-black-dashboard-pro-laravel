<template>
  <card class="stacked-form" title="Edit User">
    <div class="col-12 text-right">
      <base-button @click="goBack" type="button" class="btn btn-sm btn-primary"
        >Back to list</base-button
      >
    </div>
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
        <base-input v-model="user.name" label="Name" placeholder="Name" />
        <validation-error :errors="apiValidationErrors.name" />
        <base-input
          v-model="user.email"
          label="Email"
          type="email"
          placeholder="Enter email"
        />
        <validation-error :errors="apiValidationErrors.email" />
        <base-input label="Role">
          <el-select
            class="select-primary"
            name="role"
            v-model="user.roles[0].id"
          >
            <el-option
              v-for="role in available_roles"
              :key="role.id"
              :value="role.id"
              :label="role.name"
            >
            </el-option>
          </el-select>
        </base-input>
        <validation-error :errors="apiValidationErrors.roles" />
        <base-input
          v-model="user.password"
          label="Password"
          type="password"
          placeholder="Password"
        />
        <validation-error :errors="apiValidationErrors.password" />
        <base-input
          v-model="user.password_confirmation"
          label="Password Confirmation"
          type="password"
          placeholder="Password Confirmation"
        />
        <validation-error :errors="apiValidationErrors.password_confirmation" />
        <base-button
          @click="update()"
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
import { Select, Option } from "element-ui";
import ValidationError from "src/components/ValidationError.vue";
import formMixin from "@/mixins/form-mixin";

export default {
  components: {
    ValidationError,
    ImageUpload,
    [Option.name]: Option,
    [Select.name]: Select,
  },

  mixins: [formMixin],

  data: () => ({
    user: {
      type: "users",
      name: null,
      email: null,
      password: null,
      password_confirmation: null,
      roles: [
        {
          id: null,
          type: "roles",
        },
      ],
      relationshipNames: ["roles"],
    },
    images: {
      avatar: null,
    },
    available_roles: [],
  }),

  created() {
    this.get();
    this.getRoles();
  },

  methods: {
    onAvatarChange(file) {
      this.images.avatar = file;
    },

    async get() {
      try {
        const id = this.$route.params.id;
        await this.$store.dispatch("users/get", id);
        this.user = this.$store.getters["users/user"];
        // this.user.password = ''
      } catch (e) {
        this.$notify({
          type: "danger",
          message: "Oops, something went wrong!",
          icon: "tim-icons icon-bell-55",
        });
      }
    },

    async update() {
      if (
        this.$isDemo == 1 &&
        ["1", "2", "3"].includes(this.$route.params.id)
      ) {
        this.$notify({
          type: "danger",
          message: "You are not allowed to change data of default users.",
          icon: "tim-icons icon-bell-55",
        });
        return;
      }
      try {
        if (this.images.avatar) {
          // upload image and get image url
          await this.$store.dispatch("users/upload", {
            user: this.user,
            image: this.images.avatar,
          });
          this.user.profile_image = await this.$store.getters["users/url"];
        }
        await this.$store.dispatch("users/update", this.user);
        this.$notify({
          type: "success",
          message: "User updated successfully.",
          icon: "tim-icons icon-bell-55",
        });
        this.goBack();
      } catch (e) {
        this.$notify({
          type: "danger",
          message: "Oops, something went wrong!",
          icon: "tim-icons icon-bell-55",
        });
        this.setApiValidation(e.response.data.errors);
      }
    },

    getRoles() {
      this.$store.dispatch("roles/list").then(() => {
        this.available_roles = this.$store.getters["roles/dropdown"];
      });
    },

    goBack() {
      this.$router.push({ name: "List Users" });
    },
  },
};
</script>