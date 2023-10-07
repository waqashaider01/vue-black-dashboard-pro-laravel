# Item management

Item management is the most advanced example included in the Pro theme, because every item has a picture, belongs to a category and has multiple tags. To access this example click the "**Examples/Item Management**" link in the left sidebar or add **/examples/item-management/list-items** to the URL.
Here you can manage the items. A list of items will appear once you start adding them (to access the add page click "**Add item**").
On the add page, besides the Name and Description fields (which are present in most of the CRUD examples) you can see a category dropdown, which contains the categories you added, a file input and a tag multi select. If you did not add any categories or tags, please go to the corresponding sections (category management, tag management) and add some.

The store used for roles functionality is found in `src\store\modules\items-module.vue`

You can find the compoments for items functionality in `src\pages\Pages\Examples\ItemManagement` folder.

### List Items

```
<el-table :data="table" @sort-change="sortChange">
  <div slot="empty" v-if="loading">
    <img src="/img/loading.gif" style="height: 100px; width: 100px" />
  </div>
  <el-table-column label="Name" prop="name" sortable="custom" />
  <el-table-column label="Category" prop="category.name" sortable="custom" />
  <el-table-column label="Picture">
    <template v-slot="{ row }">
      <img
        v-if="row.image"
        :src="row.image"
        style="width: 100px; height: auto"
        alt="avatar"
      />
    </template>
  </el-table-column>
  <el-table-column label="Tags" sortable="custom" prop="tags.name">
    <template slot-scope="{ row }">
      <span
        v-for="(tag, index) in row.tags"
        :key="'tag' + index"
        class="badge badge-default"
        :style="{ backgroundColor: tag.color, margin: '.1rem' }"
        >{{ tag.name }}</span
      >
    </template>
  </el-table-column>
  <el-table-column
    label="Created At"
    prop="created_at"
    sortable="custom"
  />
    <el-table-column :min-width="135" align="right" label="Actions">
      <div slot-scope="{row}">
        <base-button
          @click="goToEdit(row.id)"
          class="edit btn-link"
          type="warning"
          size="sm"
          icon
        >
          <i class="tim-icons icon-pencil"></i>
        </base-button>
        <base-button
          @click="destroy(row.id)"
          class="remove btn-link"
          type="danger"
          size="sm"
          icon
        >
          <i class="tim-icons icon-simple-remove"></i>
        </base-button>
      </div>
    </el-table-column>
  </el-table>
```

### Add/Edit Item

```
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
    <base-input v-model="item.name" label="Name" placeholder="Name"/>
    <validation-error :errors="apiValidationErrors.name" />
    <base-input label="Description">
    <ckeditor :editor="editor" v-model="item.description" :config="editorConfig"></ckeditor>
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
      <base-radio v-model="item.status" name="draft">
        Draft
      </base-radio>
      <base-radio v-model="item.status" name="archive">
        Archive
      </base-radio>
    </base-input>

    <base-input label="Tag">
    <el-select  multiple class="select-primary" collapse-tags v-model="tags">
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
      <el-date-picker type="date" placeholder="Select date" v-model="item.date_at"/>
    </base-input>
      <validation-error :errors="apiValidationErrors.date_at" />
  
    <base-button @click="update()" class="mt-3" native-type="submit" type="primary">Submit</base-button>
  </div>
</form>
```