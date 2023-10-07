# Popover

<hr>
We used, [Popover from Element UI](http://element.eleme.io/#/en-US/component/popover) and customized the look of it.
It's a really handy component and can be integrated very easily.
The Tooltip and Popover components are initialised globally in `src/globalComponents.js`


```js
import {Popover} from 'element-ui'
```

Global usage

```js
Vue.use(Popover)
```

Local usage

```js
export default {
  components: {
    [Popover.name]: Popover
  }
}
```

## Simple Popover

:::demo
```html
<el-popover trigger="hover"
            placement="top">
    <div>
      <h3 class="popover-header">Popover on Top</h3>
      <div class="popover-body">Here will be some very useful information about his popover.</div>
    </div>
   <base-button slot="reference">
     Top
   </base-button>
</el-popover>
```
:::
