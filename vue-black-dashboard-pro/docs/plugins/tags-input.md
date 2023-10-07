# Tags input

The tags closely resemble the labels and follow the same line of color. 
With the help of `Tag` component from Element-ui we created and styled tags along with an input resembling a tag input.

<hr>

```js
import {Tag} from 'element-ui'
```
Global usage
```js
Vue.use(Tag)
```

For local usage
```js
export default {
  components: {
    [Tag.name]: Tag
  }
}
```

## Tags with input

:::demo
```html
<template>
 <tags-input v-model="tags"></tags-input>
</template>

<script>
  export default {
    data() {
      return {
         tags: ['Tag 1', 'Tag 2', 'Tag 3'],
      }
    }
  }
</script>
```
:::

## Tag type

:::demo
```html
<template>
 <tags-input v-model="tags2" tag-type="info"></tags-input>
</template>

<script>
  export default {
    data() {
      return {
         tags2: ['Tag 1', 'Tag 2', 'Tag 3'],
      }
    }
  }
</script>
```
:::

<script>
  export default {
    props: ['slot-key'],
    data() {
        return {
           tags: ['Tag 1', 'Tag 2', 'Tag 3'],
           tags2: ['Tag 1', 'Tag 2', 'Tag 3'],
        }
    }
  }
</script>

## Tags Input Props
<props-table component-name="tags-input"/>

## Tag events
<events-table :events="[
  {name: 'input', description: 'triggers when current input value changes', params: 'the updated value'},
  {name: 'change', description: 'triggers when a tag is added/removed', params: 'the updated list of tags'}
]"/>
