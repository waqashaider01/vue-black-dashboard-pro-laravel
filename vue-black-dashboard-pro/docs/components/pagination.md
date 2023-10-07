# Pagination

We took the Bootstrap pagination elements and customised them to fit the overall theme.
Besides the classic look, we also added the colour classes to offer more customisation.

<hr>
To use the custom radio buttons you need to import the custom made component:

```js
import {BasePagination} from 'src/components'
```

Global usage

```js
Vue.component(BasePagination.name, BasePagination)
```

For local usage

```js
export default {
  components: {
    BasePagination
  }
}
```

## Simple pagination with v-model

:::demo
```html
<template>
   <base-pagination :page-count="10" v-model="defaultPagination"></base-pagination>
</template>

<script>
  export default {
    data () {
        return {
          defaultPagination: 1
        }
      }
  }
</script>
```
:::

## Colors

:::demo
```html
<template>
<div>
  <base-pagination type="danger" :page-count="10" v-model="defaultPagination"></base-pagination>
  <base-pagination type="success" :page-count="10" v-model="defaultPagination"></base-pagination>
  <base-pagination type="info" :page-count="10" v-model="defaultPagination"></base-pagination>
  <base-pagination type="warning" :page-count="10" v-model="defaultPagination"></base-pagination>
</div>
</template>

<script>
  export default {
    data () {
        return {
          defaultPagination: 1
        }
      }
  }
</script>
```
:::

## Pagination Props
<props-table component-name="base-pagination"/>

## Events

<events-table :events="[
{name: 'input', description: 'triggers when the binding value changes (default for v-model)', params: 'the updated value'}
]"/>

<script>
  export default {
   props: ['slot-key'],
     data () {
      return {
        defaultPagination: 1
      }
    }
  }
</script>
