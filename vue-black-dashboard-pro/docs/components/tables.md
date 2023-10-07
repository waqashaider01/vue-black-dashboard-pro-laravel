# Tables

All Boostrap classes for tables are supported and improved.
Besides the simple and striped tables, we added tables that have actions and tables with switches.
We also combine [Element-UI tables](http://element.eleme.io/#/en-US/component/table) to achieve highly customizable tables that can suit any needs.
You can see some code samples below:

<hr>
To use the table component, import it

```js
import {Table, TableColumn} from 'element-ui'
```

Global usage

```js
Vue.use(Table)
Vue.use(TableColumn)
```

For local usage
```js
export default {
  components: {
    [Table.name]: Table,
    [TableColumn.name]: TableColumn
  }
}
```

### Table with actions

:::demo
```html
<template>
<el-table :data="tableData">
  <el-table-column min-width="50" type="index"></el-table-column>
  <el-table-column min-width="150" prop="name"
                   label="Name">
  </el-table-column>
  <el-table-column min-width="200" prop="job"
                   label="Job Position">
  </el-table-column>
  <el-table-column min-width="150" prop="salary"
                   label="Salary">
  </el-table-column>
  <el-table-column min-width="150"
                   header-align="right"
                   label="Actions">
    <div slot-scope="{row}" class="text-right">
      <el-tooltip content="Info"
                  :open-delay="300"
                  placement="top">
        <base-button type="info" size="sm" icon>
          <i class="tim-icons icon-single-02"></i>
        </base-button>
      </el-tooltip>


      <el-tooltip content="Settings"
                  :open-delay="300"
                  placement="top">
        <base-button type="success" size="sm" icon>
          <i class="tim-icons icon-settings"></i>
        </base-button>
      </el-tooltip>

      <el-tooltip content="Delete"
                  :open-delay="300"
                  placement="top">
        <base-button type="danger" size="sm" icon>
          <i class="tim-icons icon-simple-remove"></i>
        </base-button>
      </el-tooltip>

    </div>
  </el-table-column>
</el-table>
</template>

<script>
  export default {
    data() {
      return {
        tableData: [{
            id: 1,
            name: 'Dakota Rice',
            salary: '$36.738',
            country: 'Niger',
            city: 'Oud-Turnhout'
          },
          {
            id: 2,
            name: 'Minerva Hooper',
            salary: '$23,789',
            country: 'Curaçao',
            city: 'Sinaai-Waas'
          },
          {
            id: 3,
            name: 'Sage Rodriguez',
            salary: '$56,142',
            country: 'Netherlands',
            city: 'Baileux'
          },
          {
            id: 4,
            name: 'Philip Chaney',
            salary: '$38,735',
            country: 'Korea, South',
            city: 'Overland Park'
          },
          {
            id: 5,
            name: 'Doris Greene',
            salary: '$63,542',
            country: 'Malawi',
            city: 'Feldkirchen in Kärnten'
          }]
      }
    }
  }
</script>
```
:::

### Table with switches

:::demo
```html
<template>
<el-table class="table-striped"
          :data="tableData">
  <el-table-column type="index">

  </el-table-column>
  <el-table-column prop="name"
                   label="Name">
  </el-table-column>
  <el-table-column prop="job"
                   label="Job Position">
  </el-table-column>
  <el-table-column prop="salary"
                   label="Salary">
  </el-table-column>
  <el-table-column
    label="Active">
    <template slot-scope="props">
      <base-switch v-model="props.row.active" color="black"></bae-switch>
    </template>
  </el-table-column>
</el-table>
</template>

<script>
  export default {
    data() {
      return {
        tableData: [{
          name: 'Andrew Mike',
          job: 'Develop',
          salary: '€ 99,225',
          active: false
        }, {
          name: 'John Doe',
          job: 'Design',
          salary: '€ 89,241',
          active: false
        }, {
          name: 'Alex Mike',
          job: 'Design',
          salary: '€ 92,144',
          active: false
        }, {
          name: 'Mike Monday',
          job: 'Marketing',
          salary: '€ 49,990',
          active: true
        },
        {
          name: 'Paul dickens',
          job: 'Communication',
          salary: '€ 69,201',
          active: true
        }]
      }
    }
  }
</script>
```
:::

### Shopping table

:::demo
```html
<template>
<div class="table-shopping">
    <el-table style="width: 100%" :data="productsTable">
      <el-table-column min-width="140">
        <div slot-scope="{ row }" class="img-container">
          <img :src="row.image" alt="product image" />
        </div>
      </el-table-column>
      <el-table-column min-width="270" label="Product">
        <div class="td-name" slot-scope="{ row }">
          <a href="#jacket">{{ row.title }}</a> <br />
          <small>{{ row.description }}</small>
        </div>
      </el-table-column>
      <el-table-column
        min-width="120"
        label="Color"
        prop="color"
      ></el-table-column>
      <el-table-column
        min-width="100"
        label="Size"
        prop="size"
      ></el-table-column>
      <el-table-column min-width="100" label="Price" align="center">
        <template slot-scope="{ row }">
          <small>€</small> {{ row.price }}
        </template>
      </el-table-column>
      <el-table-column min-width="160" label="QTY" align="center">
        <template slot-scope="{ row }">
          <div class="btn-group">
            <base-button
              type="info"
              class="btn-simple"
              size="sm"
              @click="decreaseQuantity(row);"
            >
              <i class="tim-icons icon-simple-delete"></i>
            </base-button>
            <base-button type="info" size="sm" @click="increaseQuantity(row);">
              <i class="tim-icons icon-simple-add"></i>
            </base-button>
          </div>
          {{ row.quantity }}
        </template>
      </el-table-column>
      <el-table-column min-width="100" label="Amount" align="right">
        <template slot-scope="{ row }">
          <small>€</small> {{ row.amount }}
        </template>
      </el-table-column>
      <el-table-column min-width="60" label="" align="left">
        <template slot-scope="{ row }">
          <base-button type="primary" class="btn-link">
            <i class="tim-icons icon-simple-remove"></i>
          </base-button>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
  export default {
    data() {
      return {
       productsTable: [
         {
           image: '/img/jacket.png',
           title: 'Suede Biker Jacket ',
           description: 'by Saint Laurent',
           color: 'Black',
           size: 'M',
           price: 3390,
           quantity: 1,
           amount: 3390
         },
         {
           image: '/img/t-shirt.png',
           title: 'Jersey T-Shirt',
           description: 'by Balmain',
           color: 'Black',
           size: 'M',
           price: 499,
           quantity: 2,
           amount: 998
         },
         {
           image: '/img/gucci.png',
           title: '\tSlim-Fit Swim Short ',
           description: 'by Prada',
           color: 'Red',
           size: 'M',
           price: 200,
           quantity: 1,
           amount: 200
         }
       ]

      }
    },
    methods: {
      increaseQuantity(row) {
        row.quantity++;
        this.computeAmount(row);
      },
      decreaseQuantity(row) {
        if (row.quantity > 1) {
          row.quantity--;
          this.computeAmount(row);
        }
      },
      computeAmount(row) {
        row.amount = row.quantity * row.price;
      },
    }
  }
</script>
```
:::

<script>
  export default {
    props: ['slot-key'],
     data () {
      return {
        productsTable: [
             {
               image: 'https://demos.creative-tim.com/vue-black-dashboard-pro/img/jacket.png',
               title: 'Suede Biker Jacket ',
               description: 'by Saint Laurent',
               color: 'Black',
               size: 'M',
               price: 3390,
               quantity: 1,
               amount: 3390
             },
             {
               image: 'https://demos.creative-tim.com/vue-black-dashboard-pro/img/t-shirt.png',
               title: 'Jersey T-Shirt',
               description: 'by Balmain',
               color: 'Black',
               size: 'M',
               price: 499,
               quantity: 2,
               amount: 998
             },
             {
               image: 'https://demos.creative-tim.com/vue-black-dashboard-pro/img/gucci.png',
               title: '\tSlim-Fit Swim Short ',
               description: 'by Prada',
               color: 'Red',
               size: 'M',
               price: 200,
               quantity: 1,
               amount: 200
             }
          ],
          tableData: [{
             name: 'Andrew Mike',
             job: 'Develop',
             salary: '€ 99,225',
             active: false
           }, {
             name: 'John Doe',
             job: 'Design',
             salary: '€ 89,241',
             active: false
           }, {
             name: 'Alex Mike',
             job: 'Design',
             salary: '€ 92,144',
             active: false
           }, {
             name: 'Mike Monday',
             job: 'Marketing',
             salary: '€ 49,990',
             active: true
           },
           {
             name: 'Paul dickens',
             job: 'Communication',
             salary: '€ 69,201',
             active: true
           }]
      }
    },
    methods: {
          increaseQuantity(row) {
            row.quantity++;
            this.computeAmount(row);
          },
          decreaseQuantity(row) {
            if (row.quantity > 1) {
              row.quantity--;
              this.computeAmount(row);
            }
          },
          computeAmount(row) {
            row.amount = row.quantity * row.price;
          },
        }
  }
</script>

<style>
.btn.btn-icon + .btn.btn-icon {
  margin-left: 5px;
}
</style>
