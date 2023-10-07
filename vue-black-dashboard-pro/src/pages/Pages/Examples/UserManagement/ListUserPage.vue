<template>
<div class="content">
    <div class="row mt-5">
      <div class="col-12">
        <card card-body-classes="table-full-width">
          <h4 slot="header" class="card-title">Users List</h4>
          <div>
            <div class="text-right mb-3">
              <base-button @click="goToAdd()" class="mt-3" type="primary">Add User</base-button>
            </div>
            <div
              class="col-12 d-flex justify-content-center justify-content-sm-between flex-wrap"
            >
              <el-select
                class="select-primary mb-3 pagination-select"
                v-model="pagination.perPage"
                placeholder="Per page"
              >
                <el-option
                  class="select-primary"
                  v-for="item in pagination.perPageOptions"
                  :key="item"
                  :label="item"
                  :value="item"
                >
                </el-option>
              </el-select>

              <base-input>
                <el-input
                  type="search"
                  class="mb-3 search-input"
                  clearable
                  prefix-icon="el-icon-search"
                  placeholder="Search records"
                  v-model="query"
                  aria-controls="datatables"
                >
                </el-input>
              </base-input>
            </div>
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
          </div>
          <div
            slot="footer"
            class="col-12 d-flex justify-content-center justify-content-sm-between flex-wrap"
          >
            <div class="">
              <p class="card-category">
                Showing {{ from + 1 }} to {{ to }} of {{ total }} entries
              </p>
            </div>
            <base-pagination
              class="pagination-no-border"
              v-model="pagination.currentPage"
              :per-page="pagination.perPage"
              :total="total"
            >
            </base-pagination>
          </div>
        </card>
      </div>
    </div>
</div>
</template>

<script>
  import _ from 'lodash';
  import { Table, TableColumn, Select, Option } from 'element-ui';
  import { BasePagination } from 'src/components';
  import swal from "sweetalert2";

  export default {
    components: {
      BasePagination,
      [Select.name]: Select,
      [Option.name]: Option,
      [Table.name]: Table,
      [TableColumn.name]: TableColumn
    },

    data: () => ({
      table: [],
      footerTable: ["Name", "Created At", "Actions"],
      loading: true,

      query: null,

      sort: "created_at",

      pagination: {
        perPage: 5,
        currentPage: 1,
        perPageOptions: [5, 10, 25, 50],
      },

      total: 0

    }),

    computed: {
      from() {
        return this.pagination.perPage * (this.pagination.currentPage - 1);
      },

      to() {
        let highBound = this.from + this.pagination.perPage;
        if (this.total < highBound) {
          highBound = this.total;
        }
        return highBound;
      },
    },

    watch: {
      query: {
        handler: 'getListDebounced',
        immediate: true
      },
      pagination: {
        handler: 'getList',
        immediate: false,
        deep: true
      },
    },

    methods: {
      getListDebounced: _.debounce(function () {
        this.getList()
      }, 300),

      async getList() {
        let params = {
          include: "roles",
          ...(this.sort ? {sort: this.sort} : {}),
          filter: {
            ...(this.query ? {name: this.query} : {}),
            ...(this.query ? {email: this.query} : {}),
            ...(this.query ? {roles: this.query} : {}),
          },
          page: {
            number: this.pagination.currentPage,
            size: this.pagination.perPage
          }
        }

        try {
          await this.$store.dispatch("users/list", params)
          this.table = this.$store.getters["users/list"]
          this.total = this.$store.getters["users/listTotal"]
          this.loading = false
        } catch (e) {
          this.$notify({
            type: 'danger',
            message: 'Oops, something went wrong!',
            icon: 'tim-icons icon-bell-55',
          })
        }
      },

      async destroy(id) {
        if (this.$isDemo == 1 && ["1", "2", "3"].includes(id)) {
          this.$notify({
            type: "danger",
            message: "You are not allowed to change data of default users.",
            icon: 'tim-icons icon-bell-55',
          });
          return;
        }
        try {
          const confirmation = await swal.fire({
          title: 'Are you sure?',
          text: `You won't be able to revert this!`,
          icon: 'warning',
          showCancelButton: true,
          customClass: {
            confirmButton: 'btn btn-success btn-fill',
            cancelButton: 'btn btn-danger btn-fill'
          },
          confirmButtonText: 'Yes, delete it!',
          buttonsStyling: false
        })

          if (confirmation.value === true) {
            await this.$store.dispatch("users/destroy", id)
            this.$notify({
              type: 'success',
              message: 'User deleted successfully.',
              icon: 'tim-icons icon-bell-55',
            })
            await this.getList()
          }
        } catch (error) {
          if(error.response.data.errors[0]) {
            this.$notify({
              type: "danger",
              message: error.response.data.errors[0].title,
              icon: 'tim-icons icon-bell-55',
            });
          } else {
            this.$notify({
              type: "danger",
              message: "Oops, something went wrong!",
              icon: 'tim-icons icon-bell-55',
            });
          }
        }
      },

      goToAdd() {
        this.$router.push({name: 'Add User'})
      },

      goToEdit(id) {
        this.$router.push({name: 'Edit User', params: {id}})
      },

      sortChange({ prop, order }) {
        if (order === "descending") {
          this.sort = `-${prop}`;
        } else {
          this.sort = `${prop}`;
        }
        this.getList();
      },
    }
  }
</script>