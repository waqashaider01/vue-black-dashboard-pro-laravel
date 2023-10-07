# User management

The theme comes with an out of the box user management option. To access this option ,click the "**Examples/User Management**" link in the left sidebar or add **/examples/user-management/list-users** to the URL.
The first thing you will see is a list of existing users. You can add new ones by clicking the "**Add user**" button (above the table on the right). On the Add user page, you will find a form which allows you to fill out the user`s name, email, role and password.

The store used for role functionality is found in `src\store\modules\users-module.vue`

You can find the compoments for role functionality in `src\pages\Pages\Examples\UserManagement` folder.

Once you add more users, the list will grow and for every user you will have edit and delete options (access these options by clicking the three dotted menu that appears at the end of every row).

```
<el-table :data="table" @sort-change="sortChange">
  <div slot="empty" v-if="loading">
    <img src="/img/loading.gif" style="height: 100px; width: 100px" />
  </div>
  <el-table-column label="Author">
    <template v-slot="{ row }">
        <img v-if="row.profile_image" :src="row.profile_image" class="avatar rounded-circle mr-3"/>
    </template>
</el-table-column>
  <el-table-column label="Name" prop="name" sortable="custom" />
  <el-table-column label="Email" prop="email" sortable="custom" />
  <el-table-column
  label="Role"
  prop="roles.name"
  sortable="custom"
>
  <template v-slot="{ row }">
    <span>{{ row.roles[0].name }}</span>
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
