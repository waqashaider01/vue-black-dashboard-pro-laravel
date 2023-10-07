# Contents

Discover what’s included in Bootstrap, including our precompiled and source code flavors.

<hr>

#### Vue Black Dashboard Structure

Once downloaded, unzip the compressed folder and you’ll see something like this:

```markdown
├───vue-black-dashboard
│   App.vue
│   main.js
│   polyfills.js
│
├── assets
│   ├── css
│   │   ├── custom.css
│   │   ├── demo.css
│   │   └── nucleo-icons.css
│   ├── fonts
│   │   ├── nucleo.eot
│   │   ├── nucleo.ttf
│   │   ├── nucleo.woff
│   │   └── nucleo.woff2
│   └── sass
│       ├── black-dashboard-pro.scss
│       ├── dashboard
│       └── vendor
│           └── bootstrap-rtl.scss
├── components
│   ├── AnimatedNumber.vue
│   ├── Badge.vue
│   ├── BaseAlert.vue
│   ├── BaseButton.vue
│   ├── BaseDropdown.vue
│   ├── BasePagination.vue
│   ├── BaseProgress.vue
│   ├── BaseSwitch.vue
│   ├── BaseTable.vue
│   ├── Breadcrumb
│   │   ├── BreadcrumbItem.vue
│   │   ├── Breadcrumb.vue
│   │   └── RouteBreadcrumb.vue
│   ├── Cards
│   │   ├── Card.vue
│   │   └── StatsCard.vue
│   ├── Charts
│   │   ├── BarChart.js
│   │   ├── config.js
│   │   ├── LineChart.js
│   │   ├── PieChart.js
│   │   └── utils.js
│   ├── CloseButton.vue
│   ├── Collapse
│   │   ├── CollapseItem.vue
│   │   └── Collapse.vue
│   ├── ImageUpload.vue
│   ├── index.js
│   ├── Inputs
│   │   ├── BaseCheckbox.vue
│   │   ├── BaseInput.vue
│   │   ├── BaseRadio.vue
│   │   ├── IconCheckbox.vue
│   │   └── TagsInput.vue
│   ├── LoadingPanel.vue
│   ├── Modal.vue
│   ├── Navbar
│   │   ├── BaseNav.vue
│   │   └── NavbarToggleButton.vue
│   ├── NavbarToggleButton.vue
│   ├── NotificationPlugin
│   │   ├── index.js
│   │   ├── Notifications.vue
│   │   └── Notification.vue
│   ├── SidebarPlugin
│   │   ├── index.js
│   │   ├── SidebarItem.vue
│   │   └── SideBar.vue
│   ├── Slider.vue
│   ├── Tabs
│   │   ├── Tabs.vue
│   │   └── Tab.vue
│   ├── Timeline
│   │   ├── TimeLineItem.vue
│   │   └── TimeLine.vue
│   ├── ValidationError.vue
│   ├── Wizard
│   │   ├── throttle.js
│   │   ├── WizardTab.vue
│   │   └── Wizard.vue
│   └── WorldMap
│       ├── AsyncWorldMap.vue
│       └── WorldMap.vue
├── middleware
│   ├── auth.js
│   └── guest.js
├── mixins
│   └── form-mixin.js
├── pages
│   ├── Calendar
│   │   ├── CalendarHeader.vue
│   │   ├── CalendarRoute.vue
│   │   └── Calendar.vue
│   ├── Charts.vue
│   ├── Components
│   │   ├── Buttons.vue
│   │   ├── GridSystem.vue
│   │   ├── Headers
│   │   │   └── SweetAlertHeader.vue
│   │   ├── Icons.vue
│   │   ├── Notifications.vue
│   │   ├── Panels.vue
│   │   ├── SweetAlert.vue
│   │   └── Typography.vue
│   ├── Dashboard
│   │   ├── CountryMapCard.vue
│   │   ├── Dashboard.vue
│   │   ├── TaskList.vue
│   │   └── UserTable.vue
│   ├── Forms
│   │   ├── ExtendedForms.vue
│   │   ├── RegularForms.vue
│   │   ├── ValidationForms
│   │   │   ├── LoginForm.vue
│   │   │   ├── RangeValidationForm.vue
│   │   │   ├── RegisterForm.vue
│   │   │   └── TypeValidationForm.vue
│   │   ├── ValidationForms.vue
│   │   ├── Wizard
│   │   │   ├── FirstStep.vue
│   │   │   ├── SecondStep.vue
│   │   │   └── ThirdStep.vue
│   │   └── Wizard.vue
│   ├── GeneralViews
│   │   └── NotFoundPage.vue
│   ├── Layout
│   │   ├── ContentFooter.vue
│   │   ├── Content.vue
│   │   ├── DashboardLayout.vue
│   │   ├── DashboardNavbar.vue
│   │   ├── LoadingMainPanel.vue
│   │   ├── SidebarFixedToggleButton.vue
│   │   ├── SidebarSharePlugin.vue
│   │   └── SidebarToggleButton.vue
│   ├── Maps
│   │   ├── API_KEY.js
│   │   ├── FullScreenMap.vue
│   │   ├── GoogleMaps.vue
│   │   └── VectorMaps.vue
│   ├── Pages
│   │   ├── AuthLayout.vue
│   │   ├── Examples
│   │   │   ├── CategoryManagement
│   │   │   │   ├── AddCategoryPage.vue
│   │   │   │   ├── EditCategoryPage.vue
│   │   │   │   └── ListCategoryPage.vue
│   │   │   ├── ItemManagement
│   │   │   │   ├── AddItemPage.vue
│   │   │   │   ├── EditItemPage.vue
│   │   │   │   └── ListItemPage.vue
│   │   │   ├── RoleManagement
│   │   │   │   ├── AddRolePage.vue
│   │   │   │   ├── EditRolePage.vue
│   │   │   │   └── ListRolePage.vue
│   │   │   ├── TagManagement
│   │   │   │   ├── AddTagPage.vue
│   │   │   │   ├── EditTagPage.vue
│   │   │   │   └── ListTagPage.vue
│   │   │   ├── UserManagement
│   │   │   │   ├── AddUserPage.vue
│   │   │   │   ├── EditUserPage.vue
│   │   │   │   └── ListUserPage.vue
│   │   │   ├── UserProfile
│   │   │   │   ├── EditPasswordCard.vue
│   │   │   │   └── EditProfileCard.vue
│   │   │   └── UserProfile.vue
│   │   ├── Lock.vue
│   │   ├── Login.vue
│   │   ├── Password
│   │   │   ├── Email.vue
│   │   │   └── Reset.vue
│   │   ├── Pricing.vue
│   │   ├── Register.vue
│   │   ├── RTLPage.vue
│   │   ├── TimeLinePage.vue
│   │   ├── UserProfile
│   │   │   ├── EditProfileForm.vue
│   │   │   └── UserCard.vue
│   │   └── UserProfile.vue
│   ├── Starter
│   │   ├── SampleFooter.vue
│   │   ├── SampleLayout.vue
│   │   ├── SampleNavbar.vue
│   │   └── SamplePage.vue
│   ├── Tables
│   │   ├── ExtendedTables
│   │   │   └── ShoppingTable.vue
│   │   ├── ExtendedTables.vue
│   │   ├── PaginatedTables.vue
│   │   ├── RegularTables.vue
│   │   └── users.js
│   └── Widgets.vue
├── plugins
│   ├── dashboard-plugin.js
│   ├── globalComponents.js
│   ├── globalDirectives.js
│   └── RTLPlugin.js
├── router
│   ├── index.js
│   ├── routes.js
│   └── starterRouter.js
├── store
│   ├── index.js
│   ├── modules
│   │   ├── alerts-module.js
│   │   ├── auth.js
│   │   ├── categories-module.js
│   │   ├── items-module.js
│   │   ├── profile-module.js
│   │   ├── reset.js
│   │   ├── roles-module.js
│   │   ├── tags-module.js
│   │   └── users-module.js
│   └── services
│       ├── categories-service.js
│       ├── items-service.js
│       ├── profile-service.js
│       ├── roles-service.js
│       ├── tags-service.js
│       └── users-service.js
└── util
    └──throttle.js
```

#### Bootstrap components

Here is the list of Bootstrap 4 components that were restyled in Vue Black Dashboard:

<div class="row row-grid mt-5">
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Alerts</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Badge</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Buttons</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Carousel</h6>
      </div>
    </div>
  </div>
</div>

<div class="row row-grid">
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Dropdowns</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Forms</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Modal</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Navs</h6>
      </div>
    </div>
  </div>
</div>

#### Vue Black Dashboard Pro components

Besides giving the existing Bootstrap elements a new look, we added new ones, so that the interface and consistent and homogenous. Going through them, we added:

<div class="row row-grid mt-5">
    <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Sidebar</h6>
      </div>
    </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm">
          <div class="p-4 text-center">
            <h6 class="mb-0 text-white">Custom Inputs</h6>
          </div>
        </div>
      </div>
    <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Checkboxes</h6>
      </div>
    </div>
    </div>
    <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Notifications</h6>
      </div>
    </div>
    </div>
 </div>
 
<div class="row row-grid mt-5">
   <div class="col-md-3">
   <div class="card shadow-sm">
     <div class="p-4 text-center">
       <h6 class="mb-0 text-white">Pagination</h6>
     </div>
   </div>
   </div>
   <div class="col-md-3">
       <div class="card shadow-sm">
         <div class="p-4 text-center">
           <h6 class="mb-0 text-white">Wizard</h6>
         </div>
       </div>
     </div>
   <div class="col-md-3">
   <div class="card shadow-sm">
     <div class="p-4 text-center">
       <h6 class="mb-0 text-white">Progress</h6>
     </div>
   </div>
   </div>
   <div class="col-md-3">
   <div class="card shadow-sm">
     <div class="p-4 text-center">
       <h6 class="mb-0 text-white">Radio</h6>
     </div>
   </div>
   </div>
</div>
 
<div class="row row-grid mt-5">
   <div class="col-md-3">
   <div class="card shadow-sm">
     <div class="p-4 text-center">
       <h6 class="mb-0 text-white">Switch</h6>
     </div>
   </div>
   </div>
   <div class="col-md-3">
       <div class="card shadow-sm">
         <div class="p-4 text-center">
           <h6 class="mb-0 text-white">Slider</h6>
         </div>
       </div>
     </div>
   <div class="col-md-3">
   <div class="card shadow-sm">
     <div class="p-4 text-center">
       <h6 class="mb-0 text-white">Timeline</h6>
     </div>
   </div>
   </div>
   <div class="col-md-3">
   <div class="card shadow-sm">
     <div class="p-4 text-center">
       <h6 class="mb-0 text-white">Tabs</h6>
     </div>
   </div>
   </div>
</div>


<div class="row row-grid">
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Charts</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Font Awesome</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Nucleo icons</h6>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm">
      <div class="p-4 text-center">
        <h6 class="mb-0 text-white">Cards</h6>
      </div>
    </div>
  </div>
</div>

<div class="row row-grid mt-5">
   <div class="col-md-3">
   <div class="card shadow-sm">
     <div class="p-4 text-center">
       <h6 class="mb-0 text-white">Breadcrumb</h6>
     </div>
   </div>
   </div>
   <div class="col-md-3">
       <div class="card shadow-sm">
         <div class="p-4 text-center">
           <h6 class="mb-0 text-white">Collapse</h6>
         </div>
       </div>
     </div>
</div>
