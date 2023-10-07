# Role management

The Pro theme allows you to add user roles. By default, the theme comes with **Admin**, **Creator** and **Member** roles. To access the role management example click the "**Examples/Role Management**" link in the left sidebar or add **/examples/role-management/list-roles** to the URL. Here you can add/edit new roles.
To add a new role, click the "**Add role**" button. To edit an existing role, click the dotted menu (available on every table row) and then click "**Edit**". In both cases, you will be directed to a form which allows you to modify the name and description of a role.

The store used for role functionality is found in `src\store\modules\roles-module.vue`

You can find the compoments for role functionality in `src\pages\Pages\Examples\RoleManagement` folder.

### List page

```
<el-table :data="table" @sort-change="sortChange">
  <div slot="empty" v-if="loading">
    <img src="/img/loading.gif" style="height: 100px; width: 100px" />
  </div>
  <el-table-column label="Name" prop="name" sortable="custom" />
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

### Add/edit role

```
<form @submit.prevent>
  <div>
    <base-input v-model="role.name" label="Name" placeholder="Name"/>
    <validation-error :errors="apiValidationErrors.name" />
    <base-button class="mt-3" native-type="submit" type="primary">Submit</base-button>
  </div>
</form>
```