# Tooltips

<hr>
We used, [Tooltip from Element UI](http://element.eleme.io/#/en-US/component/tooltip) and customized the look of it.
It's a really handy component and can be integrated very easily.
The Tooltip and Popover components are initialised globally in `src/globalComponents.js`


```js
import {Tooltip} from 'element-ui'
```

Global usage

```js
Vue.use(Tooltip)
```

Local usage

```js
export default {
  components: {
    [Tooltip.name]: Tooltip
  }
}
```

## Simple tooltip

:::demo
```html
<template>
 <el-tooltip content="Info"
             effect="light"
             :open-delay="300"
             placement="top">
     <base-button>
       Top
     </base-button>
</el-tooltip>
```
:::
