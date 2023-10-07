<template>
  <card class="stacked-form" title="Add Item">
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
        <base-input v-model="item.name" label="Name" placeholder="Name" />
        <validation-error :errors="apiValidationErrors.name" />

        <base-input label="Description">
          <ckeditor
            :editor="editor"
            v-model="item.description"
            :config="editorConfig"
          ></ckeditor>
        </base-input>
        <validation-error :errors="apiValidationErrors.excerpt" />

        <base-input label="Category">
          <el-select class="select-primary" v-model="item.category.id">
            <el-option
              v-for="category in available_categories"
              :key="category.id"
              :value="category.id"
              :label="category.name"
            >
            </el-option>
          </el-select>
        </base-input>
        <base-input label="Status">
          <base-radio v-model="item.status" name="published">
            Published
          </base-radio>
          <base-radio v-model="item.status" name="draft"> Draft </base-radio>
          <base-radio v-model="item.status" name="archive">
            Archive
          </base-radio>
        </base-input>

        <base-input label="Tag">
          <el-select multiple class="select-primary" v-model="tags">
            <el-option
              v-for="tag in available_tags"
              :key="tag.id"
              :value="tag.id"
              :label="tag.name"
            >
            </el-option>
          </el-select>
        </base-input>
        <base-input label="Show on homepage?">
          <base-switch v-model="item.is_on_homepage"></base-switch>
        </base-input>
        <base-input label="Date">
          <el-date-picker
            type="date"
            placeholder="Select date"
            v-model="item.date_at"
          />
        </base-input>
        <validation-error :errors="apiValidationErrors.date_at" />

        <base-button
          @click="add()"
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
import ValidationError from "src/components/ValidationError.vue";
import formMixin from "@/mixins/form-mixin";
import {
  ImageUpload,
  BaseCheckbox,
  BaseRadio,
  BaseSwitch,
} from "src/components/index";
import { Select, Option, DatePicker } from "element-ui";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import moment from "moment";

export default {
  components: {
    ValidationError,
    ImageUpload,
    [Option.name]: Option,
    [Select.name]: Select,
    BaseRadio,
    BaseSwitch,
    [DatePicker.name]: DatePicker,
    ckeditor: CKEditor.component,
  },

  mixins: [formMixin],

  data: () => ({
    editor: ClassicEditor,
    editorConfig: {
      toolbar: [
        "heading",
        "|",
        "bold",
        "italic",
        "link",
        "bulletedList",
        "numberedList",
        "blockQuote",
        "Outdent",
        "Indent",
        "TextColor",
      ],
    },
    item: {
      type: "items",
      name: null,
      description: null,
      excerpt: null,
      status: "published",
      category: {
        id: null,
        type: "categories",
      },
      tags: [],
      is_on_homepage: false,
      date_at: null,
      relationshipNames: ["category", "tags"],
    },
    available_categories: [],
    available_tags: [],
    tags: [],
    images: {
      avatar: null,
    },
  }),

  computed: {
    roles() {
      let roles = this.$store.getters["profile/me"].roles;

      return roles.map((r) => r.name);
    },
  },

  watch: {
    "item.date_at": function (oldValue, newValue) {
      if (oldValue === "Invalid date") {
        this.item.date_at = null;
      }
    },
  },

  created() {
    this.getCategories();
    this.getTags();
    this.$store.dispatch("profile/me");
  },

  methods: {
    onAvatarChange(file) {
      this.images.avatar = file;
    },
    async add() {
      delete this.item.id;
      this.resetApiValidation();

      this.item.excerpt = this.item.description;
      this.item.date_at = moment(this.item.date_at).format("YYYY-MM-DD");
      this.updateTags();
      if (this.roles.includes("member")) {
        this.$notify({
          type: "danger",
          message: "Oops, you are not authorized to do this action!",
        });
        return;
      }
      try {
        await this.$store.dispatch("items/add", this.item);
        this.item = await this.$store.getters["items/item"];

        if (this.images.avatar) {
          // upload image and get image url
          await this.$store.dispatch("items/upload", {
            item: this.item,
            image: this.images.avatar,
          });
          this.item.image = await this.$store.getters["items/url"];
          // update item with image url
          await this.$store.dispatch("items/update", this.item);
          this.user = await this.$store.getters["items/item"];
        }

        this.$notify({
          type: "success",
          message: "Item added successfully.",
          icon: "tim-icons icon-bell-55",
        });
        this.goBack();
      } catch (e) {
        this.setApiValidation(e.response.data.errors);

        this.$notify({
          type: "danger",
          message: "Oops, something went wrong",
          icon: "tim-icons icon-bell-55",
        });
        if (this.item.id) {
          await this.$store.dispatch("items/destroy", this.item.id);
        }
      }
    },

    updateTags() {
      this.item.tags = [];
      this.tags.forEach((tag) => {
        this.item.tags.push({
          id: tag,
          type: "tags",
        });
      });
    },

    getCategories() {
      // this.$store.dispatch("categories/list").then(() => {
      //     this.available_categories = this.$store.getters["categories/dropdown"]
      //   })
      this.$store.dispatch("categories/list").then(() => {
        this.available_categories = this.$store.getters["categories/dropdown"];
        if (this.available_categories && this.available_categories.length) {
          this.item.category.id = this.available_categories[0].id;
        }
      });
    },

    getTags() {
      this.$store.dispatch("tags/list").then(() => {
        this.available_tags = this.$store.getters["tags/dropdown"];
        if (this.available_tags && this.available_tags.length) {
          this.tags.push(this.available_tags[0].id);
          this.updateTags();
        }
      });
    },

    goBack() {
      this.$router.push({ name: "List Items" });
    },
  },
};
</script>