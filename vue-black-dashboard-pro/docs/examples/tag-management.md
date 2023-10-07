# Tag management

Out of the box you will have an example of tag management (for the cases in which you are developing a blog or a shop). To access this example, click the "**Examples/Tag Management**" link in the left sidebar or add **/examples/tag-management/list-tags** to the URL.
You can add and edit tags here, but you can only delete them if they are not attached to any items.

The store used for role functionality is found in `src\store\modules\tags-module.vue`

You can find the compoments for role functionality in `src\pages\Pages\Examples\TagManagement` folder.

```
<el-table :data="table" @sort-change="sortChange">
  <div slot="empty" v-if="loading">
    <img src="/img/loading.gif" style="height: 100px; width: 100px" />
  </div>
  <el-table-column label="Name" prop="name" sortable="custom" />
  <el-table-column label="Color" prop="color" sortable="custom">
  <template slot-scope="{ row }">
    <span
      class="badge badge-default"
      :style="{ backgroundColor: row.color }"
      >{{ row.name }}</span
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
